@extends('layouts.app')

@section('content')

<!-- HEADER -->
    <div class="flex items-start justify-between mb-8">

      <div>
            <h1 class="text-5xl font-black bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Histori 
            </h1>

            <p class="text-purple-500 text-2xl mt-3">
                Riwayat Data Squat Pengguna
            </p>

        </div>

    </div>

    <!-- CARD TABLE -->
     <div class="bg-white rounded-[2rem] p-6 shadow-lg border border-orange-400 flex flex-col items-center justify-center text-center">
        <table class="w-full min-w-full table-fixed">
        
            <!-- HEAD -->
            <thead>

                <tr class="bg-gray-200 border-b border-[#edf0f7]">

                    <th class="p-6 text-left text-gray-600 font-semibold text-xl">
                        No
                    </th>

                    <th class="p-6 text-left text-gray-600 font-semibold text-xl">
                        Sudut Lutut
                    </th>

                    <th class="p-6 text-left text-gray-600 font-semibold text-xl">
                        Status
                    </th>

                     <th class="p-6 text-left text-gray-600 font-semibold text-xl">
                        Waktu
                    </th>

                    <th class="p-6 text-center text-gray-600 font-semibold text-xl">
                        Aksi
                    </th>

                </tr>

            </thead>

            <!-- BODY -->
            <tbody>

                @foreach ($data as $item)

                <tr class="border-b border-[#edf0f7] hover:bg-[#f9f9ff] transition">

                    <!-- NO -->
                    <td class="p-6 text-gray-700 font-semibold text-lg">
                        {{ $data->firstItem() + $loop->index }}
                    </td>

                    <!-- SUDUT -->
                    <td class="p-6 text-4xl font-black text-blue-500">
                        {{ $item->sudut_lutut }}°
                    </td>

                    <!-- STATUS -->
                    <td class="p-6">

                        <span class="bg-[#f0fdf4] text-green-600 px-5 py-2 rounded-2xl text-base font-semibold border border-green-200">

                            {{ $item->status_gerakan }}

                        </span>

                    </td>

                    <!-- WAKTU -->
                    <td class="p-6 text-gray-500 text-lg">
                        {{ $item->created_at }}
                    </td>

                    <td class="p-6 text-center">

                        <form action="{{ route('monitoring.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>
       
        </table>

        <div class="mt-8 flex justify-center">
            {{ $data->links() }}
        </div>

        </div>

    
</div>
</div>


@endsection