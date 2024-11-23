@extends('header')

@section('title', 'Daftar Persetujuan')

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
        <aside class="w-full">
            <div class="px-6 flex items-center bg-gray-100 p-4 rounded-lg shadow">   
                <img src="{{ asset('alip.jpg') }}" alt="Profile Image" class="w-24 h-24 rounded-full object-cover mb-2">
                <div class="flex flex-col px-6 ">
                    <h2 class="font-sans text-lg font-bold">Nama</h2>
                    <p>NIM. </p>
                    <p>Fakultas </p>
                    <p>Program Studi </p>
            </div>
        </aside>
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
            <table id="Mahasiswa" class="sans w-full border-collapse" id="mahasiswa" class="w-full bg-white rounded-lg shadow-md border-collapse">
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
                            <tr tr class="border-b 'bg-[#ECEFF6]' : '' }}">
                                <td class="py-3 px-4 text-center border"></td>
                                <td class="py-3 px-4 border">semester</td>
                                <td class="py-3 px-4 border">tahun akademik</td>
                                <td class="py-3 px-4 text-center border">
                                        <a href="/view-irs/" target="_blank" class="text-blue-500">Lihat IRS</a>
                                    </td>
                                </td>
                                <td class="py-3 px-4 text-center border">status</td>
                                <td class="py-3 px-4 text-center border"></td>
                            </tr>
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
