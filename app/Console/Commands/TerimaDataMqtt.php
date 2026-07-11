<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;

use App\Models\RealtimeData;
use App\Models\Monitoring;

class TerimaDataMqtt extends Command
{
    protected $signature = 'mqtt:jalan';

    protected $description = 'Menerima Data MQTT';

    private $sudutPaha = 0;
    private $sudutBetis = 0;

    private $holdMulai = null;
    private $squatTersimpan = false;

    private $squatValid = false;


    // ==========================
    // FREEZE DATA
    // ==========================

    private $pahaBaru = false;
    private $betisBaru = false; 
    private $freezeRealtime = false;

    private $freezePaha = 0;
    private $freezeBetis = 0;
    private $freezeLutut = 0;

    public function handle()
    {
        $mqtt = new MqttClient(
            'broker.hivemq.com',
            1883,
            'laravel-flexknee'
        );

        $mqtt->connect();

        echo "MQTT Connected\n";

        // SENSOR PAHA
        $mqtt->subscribe('sensor/paha', function ($topic, $message) {

            $data = json_decode($message, true);

            if (isset($data['sudut_paha'])) {

                $this->sudutPaha = $data['sudut_paha'];

                $this->pahaBaru = true;

                if($this->betisBaru){

                    $this->prosesData();

                    $this->pahaBaru = false;
                    $this->betisBaru = false;

                }
            }

        }, 0);

        // SENSOR BETIS
        $mqtt->subscribe('sensor/betis', function ($topic, $message) {

            $data = json_decode($message, true);

            if (isset($data['sudut_betis'])) {

                 $this->sudutBetis = $data['sudut_betis'];

                $this->betisBaru = true;

                if($this->pahaBaru){

                    $this->prosesData();

                    $this->pahaBaru = false;
                    $this->betisBaru = false;

                }
            }

        }, 0);

        $mqtt->loop(true);
    }

    private function prosesData()
    {
        // ==========================
        // HITUNG SUDUT LUTUT
        // ==========================

        $sudutLutut = abs(
            $this->sudutPaha -
            $this->sudutBetis
        );

        if ($sudutLutut < 10) {
            $sudutLutut = 0;
        }

        // ==========================
        // STATUS
        // ==========================

        if ($sudutLutut <= 10) {

            $status = "Berdiri";

        } elseif (
            $sudutLutut >= 90 &&
            $sudutLutut <= 110
        ) {

            $status = "Posisi Tepat";

        } elseif ($sudutLutut < 90) {

            $status = "Sedang Turun";

        } else {

            $status = "Terlalu Dalam";
        }

        // ==========================
        // HOLD 3 DETIK
        // ==========================

        if (
            $sudutLutut >= 90 &&
            $sudutLutut <= 110
        ) {

            if ($this->holdMulai == null) {

                $this->holdMulai = time();

                // FREEZE DASHBOARD

                $this->freezeRealtime = true;

                $this->freezePaha = $this->sudutPaha;
                $this->freezeBetis = $this->sudutBetis;
                $this->freezeLutut = $sudutLutut;

                echo "Mulai Hold\n";
            }

            $lamaHold =
                time() -
                $this->holdMulai;

            if($lamaHold > 3)
            {
                $lamaHold = 3;
            }

            $status =
                "Bertahan "
                . $lamaHold .
                "/3 Detik";

           if ($lamaHold >= 3)
            {
                $this->squatValid = true;

                $status = "Squat Berhasil";
            }
        }
        else {

            $this->holdMulai = null;

            // Reset hanya saat berdiri

           if ($sudutLutut <= 10)
             {
                if(
                    $this->squatValid &&
                    !$this->squatTersimpan
                )
                {

                    Monitoring::create([

                        'sudut_paha' =>
                            $this->freezePaha,

                        'sudut_betis' =>
                            $this->freezeBetis,

                        'sudut_lutut' =>
                            $this->freezeLutut,

                        'status_gerakan' =>
                            'Baik'
                    ]);

                    $this->squatTersimpan = true;

                    echo "SQUAT DISIMPAN\n";
                }

                $this->freezeRealtime = false;

                $this->squatValid = false;

                $this->squatTersimpan = false;
            }
        }

        // ==========================
        // UPDATE REALTIME
        // ==========================

        RealtimeData::updateOrCreate(

            ['id' => 1],

            [
                'sudut_paha' =>

                    $this->freezeRealtime
                        ? $this->freezePaha
                        : $this->sudutPaha,

                'sudut_betis' =>

                    $this->freezeRealtime
                        ? $this->freezeBetis
                        : $this->sudutBetis,

                'sudut_lutut' =>

                    $this->freezeRealtime
                        ? $this->freezeLutut
                        : $sudutLutut,

                'status' => $status
            ]
        );

      static $lastPrint = 0;

    if(time() != $lastPrint){

        $lastPrint = time();

        echo "Lutut : ".$sudutLutut.
            " | Status : ".$status."\n";

    }
    }
}