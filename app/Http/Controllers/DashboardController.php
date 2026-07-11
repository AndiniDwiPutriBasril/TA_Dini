<?php

namespace App\Http\Controllers;

use App\Models\RealtimeData;
use App\Models\Monitoring;

class DashboardController extends Controller
{
    public function index()
    {
        $data = RealtimeData::find(1);

        $jumlahSquat =
            Monitoring::whereDate(
                'created_at',
                today()
            )->count();

        if (!$data)
        {
            return view('dashboard', [

                'data' => (object)[
                    'sudut_lutut' => 0,
                    'sudut_paha' => 0,
                    'sudut_betis' => 0,
                    'status' => 'Menunggu Data'
                ],

                'jumlah_squat' => 0
            ]);
        }

        return view('dashboard', [

            'data' => $data,

            'jumlah_squat' => $jumlahSquat
        ]);
    }

    public function realtime()
    {
        $data = RealtimeData::find(1);

        if (!$data)
        {
            return response()->json([

                'realtime' => null,

                'jumlah_squat' => 0,

                'status_koneksi' => 'Terputus',

                'last_update' => '-'
            ]);
        }

        $selisih =
            now()->diffInSeconds(
                $data->updated_at
            );

        $statusKoneksi =
            ($selisih <= 5)
            ? 'Terhubung'
            : 'Terputus';

        return response()->json([

            'realtime' => $data,

            'jumlah_squat' =>
                Monitoring::whereDate(
                    'created_at',
                    today()
                )->count(),

            'status_koneksi' =>
                $statusKoneksi,

            'last_update' =>
                $data->updated_at
                     ->format('H:i:s')
        ]);
    }
}