<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isian Rencana Studi(IRS)</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto">
        <div class="flex items-center">
            <img src="../logo_iris.png" alt="IRIS Logo" class="h-15 mr-3">
            <h1 class="text-xl font-bold text-[35px] -ml-3">IRIS</h1>
        </div>

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-2">
                <a href="{{ route('mhsAkademik') }}">
                    <button class="text-2xl">&larr;</button>
                </a>
                <h1 class="text-3xl font-bold">Isian Rencana Studi (IRS)</h1>
            </div>
            <div class="flex items-center space-x-4">
                <button class="relative">
                    <span class="bg-gray-400 w-4 h-4 rounded-full"></span>
                </button>
                <div class="flex items-center space-x-2">
                    <span>Athala Darien</span>
                    <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="flex space-x-8">
            <!-- Sidebar Mata Kuliah -->
            <div class="w-1/3 h-1/3 ">
                <div class="border p-4 shadow-md bg-gray-200 flex flex-col">
                    <div class="">
                        <!-- Dropdown Mata Kuliah -->
                        <div class="relative">
                            <input type="checkbox" id="dropdown" class="peer hidden" />
                            <label for="dropdown"
                                class="mt-1 w-full bg-gray-400 text-white p-2 rounded-md flex items-center justify-between cursor-pointer">
                                <span id="selectedCourse">Pilih Mata Kuliah</span>
                                <!-- Nama mata kuliah yang dipilih akan muncul di sini -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>

                            <!-- List Dropdown -->
                            <ul id="dropdownList"
                                class="absolute left-0 w-full mt-2 bg-white border rounded-md shadow-lg hidden flex-col">
                                @foreach ($matakuliah as $mk)
                                    <li class="p-2 hover:bg-gray-100 cursor-pointer" data-course="{{ $mk->nama }}">
                                        {{ $mk->nama }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <!-- Kotak Mata Kuliah Terpilih -->
                        <div class="mt-3 text-[17px] text-gray-500">
                            <p><span>📚</span> Mata Kuliah Terpilih</p>
                            <div class="course-container">
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Border untuk Kelas, IPS, IPK -->
                <div class="border bg-gray-200 mt-4 p-4 px-6 shadow-md">
                    <div class="flex flex-row mb-9 justify-between">
                        <div class="flex flex-col items-center">
                            <p class="font-bold">Kelas</p>
                            <p>A</p>
                        </div>
                        <div class="border w-[4px] bg-gray-400 "></div>
                        <div class="flex flex-col items-center">
                            <p class="font-bold">IPS</p>
                            <p>4</p>
                        </div>
                        <div class="border w-[4px] bg-gray-400 "></div>
                        <div class="flex flex-col items-center">
                            <p class="font-bold">IPK</p>
                            <p>4</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center mt-7">
                        <p>Max Beban SKS</p>
                        <p>24</p>
                    </div>
                </div>

            </div>

            <!-- Jadwal -->
            <div class="w-2/3">
                <h2 class="bg-gray-200 rounded-md text-center p-2 text-xl font-semibold mb-3">JADWAL</h2>
                <div class="bg-gray-300 h-0.5 w-full mb-3"></div>
                <div></div>
                <div class="grid grid-cols-5 gap-4 text-center">
                    <!-- Header Hari -->
                    <div class="text-gray-600 font-semibold">Senin</div>
                    <div class="text-gray-600 font-semibold">Selasa</div>
                    <div class="text-gray-600 font-semibold">Rabu</div>
                    <div class="text-gray-600 font-semibold">Kamis</div>
                    <div class="text-gray-600 font-semibold">Jumat</div>

                    <!-- Jadwal Kosong -->
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                    <div class="h-20 border"></div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="flex items-center mt-6">
            <span class="text-lg font-bold">20 SKS Dipilih</span>
            <div class="ml-[310px] space-x-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded-md">Simpan</button>
                <button class="bg-red-500 text-white px-4 py-2 rounded-md">Hapus</button>
            </div>
            <div class="ml-[510px]">
                <button class="bg-gray-300 text px-4 py-2 rounded-md">Preview</button>
            </div>
        </div>
    </div>

    <!-- Dropdown Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdown'); // Checkbox untuk dropdown
            const dropdownList = document.getElementById('dropdownList'); // Daftar dropdown
            const selectedCourse = document.getElementById('selectedCourse'); // Tempat untuk menampilkan nama mata kuliah yang dipilih
            const courseContainer = document.querySelector('.course-container'); // Container untuk slot mata kuliah

            // Menangani klik pada item dropdown
            const items = dropdownList.querySelectorAll('li');
            items.forEach(item => {
                item.addEventListener('click', function () {
                    // Ambil nama mata kuliah yang dipilih
                    const courseName = item.textContent;

                    // Buat slot baru setiap kali mata kuliah dipilih
                    const newSlot = document.createElement('div');
                    newSlot.classList.add('mt-2', 'h-10', 'border', 'border-gray-400', 'selected-course-slot');
                    newSlot.textContent = courseName; // Set nama mata kuliah ke dalam slot
                    courseContainer.appendChild(newSlot);

                    // Menampilkan nama mata kuliah yang dipilih pada label dropdown
                    selectedCourse.textContent = courseName;

                    // Sembunyikan dropdown setelah pemilihan
                    dropdownList.classList.add('hidden');
                });
            });

            // Menangani klik di luar dropdown untuk menutupnya
            document.addEventListener('click', function (event) {
                if (!dropdownButton.contains(event.target) && !dropdownList.contains(event.target)) {
                    dropdownList.classList.add('hidden'); // Menyembunyikan dropdown jika klik di luar
                }
            });

            // Klik pada label dropdown untuk menampilkan daftar
            dropdownButton.addEventListener('click', function () {
                dropdownList.classList.toggle('hidden'); // Menampilkan atau menyembunyikan dropdown
            });
        });




    </script>

    <style>
        .selected-course-slot {
            background-color: #F8F8FF;
            /* Ganti warna latar */
            color: #333333;
            /* Ganti warna teks */
            padding-left: 4px;
            line-height: 2.5rem;
            /* Menyesuaikan tinggi teks */
            transition: all 0.3s ease;
            /* Animasi transisi */
        }

        .selected-course-slot:hover {
            background-color: #A4ABB6;
            color: white;
        }
    </style>
</body>

</html>