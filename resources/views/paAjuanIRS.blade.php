@extends('header')

@section('title', 'Ajuan IRS')

@section('page')
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    /* Hilangkan outline pada elemen teks dan cegah pemilihan teks */
    p, span, h1, h2, h3, h4, h5, h6, a {
        outline: none;
        user-select: none;
    }
    .no-outline {
        outline: none;
        pointer-events: none;
    }
</style>

<div class="flex h-screen">
    {{-- Sidebar --}}
    <x-side-bar :active="request()->route()->getName()"></x-side-bar>
    {{-- End Sidebar --}}

    {{-- Main Content --}}
    <div id="main-content" class="flex-1 p-8 bg-white min-h-screen ml-[340px]">
        <div class="flex flex-col items-start space-y-8">
            <!-- Header Daftar Mahasiswa -->
            <h1 class="text-3xl font-bold text-[#264A5D]">Daftar Persetujuan IRS</h1>
            <p class="text-xl font text-[#264A5D] mb-4">Nama</p>
            <div class="flex items-center space-x-2">
                <a href="{{ route('daftarmahasiswa') }}">
                    <img src="{{ asset('Back.png') }}" alt="Kembali" class="w-8 h-8 mr-1">
                </a>
                <h1 class="text-2xl font-bold font-sans">Isian Rencana Studi (IRS) Mahasiswa</h1>
            </div>  
        </div>

    {{-- Main Content --}}
    <div id="main-content" class="my-5 bg-white shadow-md rounded-lg overflow-hidden">
    @foreach ($mahasiswa as $m)
        <aside class="w-full">
            <div class="px-6 flex items-center bg-gray-100 p-4 rounded-lg shadow">   
                <img src="{{ asset('alip.jpg') }}" alt="Profile Image" class="w-24 h-24 rounded-full object-cover mb-2">
                <div class="flex flex-col px-6 ">
                    <h2 class="font-sans text-lg font-bold">{{ $m->nama }}</h2>
                    <p>NIM. {{ $m->nim }}</p>
                    <p>Fakultas </p>
                    <p>Program Studi {{ $m->prodi }}</p>
            </div>
        </aside>
    @endforeach
    </div>

    <div class="flex justify-between items-center mb-6">
            <input id="searchMahasiswa" type="text" placeholder="Search..." class="focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 sans border">
            <button id="tandaTangan" data-modal-target="uploadModal" data-modal-toggle="uploadModal" 
                class="btn btn-primary text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg font-medium rounded-lg text-sm px-5 py-2.5">
                Tambah Persetujuan IRS
            </button>
        </div>
        
        <!-- Tabel Data Persetujuan -->
        <div class="my-5 bg-white shadow-md rounded-lg overflow-hidden">
            <table id="Mahasiswa" class="w-full bg-white rounded-lg shadow-md border-collapse">
                    <thead>
                        <tr class="text-[#264A5D] text-center" style="background-color: #ECEFF6;">
                            <th class="py-3 px-4 border">No</th>
                            <th class="py-3 px-4 border">Semester</th>
                            <th class="py-3 px-4 border">Tahun Akademik</th>
                            <th class="py-3 px-4 border">IRS Mahasiswa</th>
                            <th class="py-3 px-4 border">Status</th>
                            <th class="py-3 px-4 border">QR Code</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($mahasiswa as $m)
                        <tr class="border-b {{ $loop->iteration % 2 == 0 ? 'bg-[#ECEFF6]' : '' }}">
                            <td class="py-3 px-4 text-center border">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 border">Semester {{ $m->semester_berjalan }}</td>
                            <td class="py-3 px-4 border">{{ $m->tahun_akademik }}</td>
                            <td class="py-3 px-4 text-center border">
                                <a href="{{ route('halamanIRS', ['id' => $m->id]) }}" target="_blank" class="text-blue-500">Lihat IRS</a>
                            </td>
                            <td class="py-3 px-4 text-center border">status</td>
                            <td class="py-3 px-4 text-center border"></td>
                        </tr>
                    @endforeach
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

{{-- datatable  --}}
            <script>
                $(document).ready( function () {
                    var tableMahasiswa = $('#Mahasiswa').DataTable({
                        layout :{
                            topStart: null,
                            topEnd: null,
                            bottomStart: 'pageLength',
                            bottomEnd: 'paging'
                        }
                    });

                    $('#searchMahasiswa').keyup(function() {
                        tableMahasiswa.search($(this).val()).draw();
                    });
                } );
            </script>
        {{-- datatble_end --}}
