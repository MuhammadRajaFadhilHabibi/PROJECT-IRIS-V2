<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRIS - Isian Rencana Semester</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <x-side-bar :active="request()->route()->getName()"></x-side-bar>

        <!-- Main Content -->
        <div class="flex-1 ml-[350px]">
            <!-- Header -->
            <div class="justify-self-end mr-4 items-center mt-8">
                <div class="flex items-center space-x-4 mr-3">
                    <button class="relative">
                        <div class="border border-gray-300 bg-gray-300 rounded-full">
                            <img src="../notif.svg" alt="Notif" class="h-[20px]">
                        </div>
                    </button>
                    <div class="flex items-center space-x-2">
                        <span>Athala Darien</span>
                        <img src="https://via.placeholder.com/40" alt="User" class="w-8 h-8 rounded-full">
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="mt-7 flex space-x-4 mb-4 justify-around">
                <button id="tab-irs"
                    class="tab-btn w-[25%] bg-gray-200 hover:bg-blue-500 hover:text-white text-gray-700 px-4 py-2 rounded active-tab">IRS</button>
                <button id="tab-khs"
                    class="tab-btn w-[25%] bg-gray-200 hover:bg-blue-500 hover:text-white text-gray-700 px-4 py-2 rounded">KHS</button>
                <button id="tab-transkrip"
                    class="tab-btn w-[25%] bg-gray-200 hover:bg-blue-500 hover:text-white text-gray-700 px-4 py-2 rounded">Transkrip</button>
            </div>

            <div class="border border-gray-300 w-[98%] mb-4"></div>

            <!-- Content Sections -->
            <div id="content-irs" class="content-tab bg-white shadow rounded-lg p-6 mr-5">
                <h1 class="text-xl font-bold mb-4">Isian Rencana Semester (IRS)</h1>
                <div>
                    <!-- Semester List -->
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 1</span>
                            <button>
                                <img src="../pilus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 2</span>
                            <button>
                                <img src="../pilus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 3</span>
                            <button>
                                <img src="../pilus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>

                    <!-- Button -->
                    <a href="{{ route('mhsBuatIrs') }}">
                        <button class="bg-red-500 text-white px-4 py-2 rounded">Buat Rencana Studi</button>
                    </a>
                </div>
            </div>

            <div id="content-khs" class="content-tab bg-white shadow rounded-lg p-6 mr-5 hidden">
                <h1 class="text-xl font-bold mb-4">Kartu Hasil Studi (KHS)</h1>
                <div>
                    <!-- Semester List -->
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 1</span>
                            <button>
                                <img src="../pilus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 2</span>
                            <button>
                                <img src="../pilus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 3</span>
                            <button>
                                <img src="../pilus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div id="content-transkrip" class="content-tab bg-white shadow rounded-lg p-6 mr-5 hidden">
                <h1 class="text-xl font-bold mb-4">Transkrip</h1>
            </div>
        </div>

        <!-- JavaScript -->
        <script>
            // Select tab buttons and content sections
            const tabs = document.querySelectorAll('.tab-btn');
            const contents = document.querySelectorAll('.content-tab');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active-tab class from all tabs
                    tabs.forEach(btn => btn.classList.remove('active-tab'));

                    // Add active-tab class to the selected tab
                    tab.classList.add('active-tab');

                    // Hide all content sections
                    contents.forEach(content => content.classList.add('hidden'));

                    // Show the selected content section
                    const targetId = `content-${tab.id.split('-')[1]}`;
                    document.getElementById(targetId).classList.remove('hidden');
                });
            });
        </script>

        <!-- CSS -->
        <style>
            /* Active tab styling */
            .active-tab {
                background-color: #3b82f6;
                /* Blue color */
                color: white;
            }

            /* Hover styling */
            .tab-btn:hover {
                background-color: #2563eb;
                /* Darker blue */
                color: white;
            }
        </style>
</body>

</html>