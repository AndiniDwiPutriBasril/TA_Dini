@extends('layouts.app')

@section('content')

<!-- HEADER -->
    <div class="flex items-start justify-between mb-8">

        <div>
           <h1 class="text-3xl md:text-5xl font-black bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Dashboard
            </h1>

            <p class="text-purple-500 text-base md:text-2xl mt-3">
                Monitoring realtime sudut sendi lutut
            </p>

        </div>

        <!-- STATUS -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl px-4 py-2 shadow-xl border border-white">

            <div class="flex items-center gap-5">

                <h2 id="statusKoneksi"
                    class="text-2xl font-semibold text-gray-600">
                    Menunggu Koneksi
                </h2>

                <div>

                    <p id="lastUpdate"
                        class="text-gray-400 mt-1 text-lg">
                        Menunggu data...
                    </p>
                </div>

                <div id="indikatorKoneksi"
                    class="w-4 h-4 rounded-full bg-yellow-400">
                </div>

            </div>

        </div>

    </div>

    <!-- TOP -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
         
        <!-- PAHA -->
        <div class="xl:col-span-2 space-y-6">

            <div class="bg-white rounded-[2rem] p-6 shadow-lg border border-orange-400 flex flex-col items-center justify-center text-center">

                <p class="text-black-500 text-lg font-bold">
                    Sudut Paha
                </p>

                <h1
                    id="sudutPaha"
                    class="text-4xl font-black text-orange-500 mt-5">

                    {{ $data->sudut_paha }}°

                </h1>

                <p class="text-gray-400 mt-4">

                    Sensor MPU6050

                </p>

            </div>


            <div class="bg-white rounded-[2rem] p-6 shadow-lg border border-blue-400 flex flex-col items-center justify-center text-center">

                <p class="text-black-500 text-lg font-bold">
                    Sudut Betis
                </p>

                <h1
                    id="sudutBetis"
                    class="text-4xl font-black text-blue-500 mt-5">

                    {{ $data->sudut_betis }}°

                </h1>

                <p class="text-gray-400 mt-4">

                    Sensor MPU6050

                </p>

            </div>

        </div>

        <!-- LUTUT -->
        <div class="xl:col-span-7 ">

            <div
                class="relative overflow-hidden bg-gradient-to-br from-white via-indigo-50 to-purple-100 rounded-[2rem] p-10 shadow-xl border border-indigo-400 h-full">

                <div
                    class="absolute top-0 right-0 w-80 h-80 rounded-full bg-indigo-300/20 blur-3xl ">
                </div>

                <div class="flex flex-col items-center justify-center text-center">

                    <p
                        class="uppercase tracking-[6px] text-indigo-600 font-bold">

                        Sudut Lutut

                    </p>

                    <h1
                        id="sudutLutut"
                        class="text-7xl md:text-[170px] font-black leading-none bg-gradient-to-r from-indigo-700 via-purple-600 to-pink-500 bg-clip-text text-transparent">

                        {{ $data->sudut_lutut }}°

                    </h1>

                    <div class="mt-5 px-8 py-3 rounded-full bg-green-200">

                        <span
                            id="statusGerakan"
                            class="text-2xl font-bold text-green-700">

                            {{ $data->status }}

                        </span>

                    </div>

                    <p
                        class="mt-6 text-xl text-gray-500">

                        Target Sudut Ideal

                        <span
                            class="font-bold text-indigo-600">

                            90° - 110°

                        </span>

                    </p>

                </div>

            </div>

        </div>


        <!-- JUMLAH SQUAT -->

        <div class="xl:col-span-3">

            <div
                class="bg-gradient-to-br from-purple-50 to-pink-100 rounded-[2rem] p-8 shadow-xl border border-purple-400 h-full">

                <div class="flex flex-col items-center justify-center text-center">

                    <p
                        class="text-black-600 text-2xl font-bold">

                        Jumlah Squat

                    </p>

                    <h1
                        id="jumlahSquat"
                        class="text-6xl md:text-[90px] font-black text-center mt-10 bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">

                        {{ $jumlah_squat }}

                    </h1>

                    <p
                        class="text-2xl font-bold text-purple-700">

                        Kali

                    </p>

                    <p
                        class="text-center text-gray-400 text-xl mt-6">

                        Total Squat Berhasil

                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- GRAFIK -->
    <div class="bg-white/90 backdrop-blur-md rounded-[2rem] p-6 border border-blue-400 shadow-xl mt-6">

        <h2 class="text-xl md:text-3xl font-semibold text-purple-500 mb-6">
            Grafik Pergerakan Sudut Lutut
        </h2>

        @include('grafik')

    </div>

</div>
</div>

      <script>
        let loading = false;

        function loadRealtime()
        {
            if (loading) return;

            loading = true;

            fetch('/api/realtime')
            .then(response => response.json())
            .then(data => {

                if (!data.realtime) return;

                const r = data.realtime;

                document.getElementById('sudutLutut').innerHTML = r.sudut_lutut + "°";
                updateRealtimeChart(r.sudut_lutut);

                document.getElementById('sudutPaha').innerHTML = r.sudut_paha + "°";
                document.getElementById('sudutBetis').innerHTML = r.sudut_betis + "°";

                document.getElementById('statusGerakan').innerHTML = r.status;

                document.getElementById('jumlahSquat').innerHTML = data.jumlah_squat;

                document.getElementById('statusKoneksi').innerHTML = data.status_koneksi;

                document.getElementById('lastUpdate').innerHTML =
                    "Terakhir update: " + data.last_update;

                const indikator = document.getElementById('indikatorKoneksi');

                if (data.status_koneksi === "Terhubung") {
                    indikator.classList.remove('bg-red-500', 'bg-yellow-400');
                    indikator.classList.add('bg-green-500');
                } else {
                    indikator.classList.remove('bg-green-500');
                    indikator.classList.add('bg-red-500');
                }
            })
            .catch(err => {
                console.log(err);
            })
            .finally(() => {

                loading = false;

            });
        }

        loadRealtime();

        setInterval(loadRealtime,100);
        </script>

@endsection