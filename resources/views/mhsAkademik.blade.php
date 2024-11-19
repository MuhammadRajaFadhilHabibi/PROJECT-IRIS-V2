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
            <div class="flex justify-between items-center mt-8">
                <h2 class="text-2xl font-bold">IRS</h2>
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
                <button class="w-[25%] bg-gray-200 hover:bg-blue-500 text-gray-700 px-4 py-2 rounded">IRS</button>
                <button class="w-[25%] bg-gray-200 hover:bg-blue-500 text-gray-700 px-4 py-2 rounded">KHS</button>
                <button class="w-[25%] bg-gray-200 hover:bg-blue-500 text-gray-700 px-4 py-2 rounded">Transkrip</button>
            </div>

            <div class="border border-gray-300 w-[98%] mb-4"></div>

            <!-- Content IRS -->
            <div class="bg-white shadow rounded-lg p-6 mr-5">
                <h1 class="text-xl font-bold mb-4">Isian Rencana Semester (IRS)</h1>
                <div>
                    <!-- Semester List -->
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 1</span>
                            <button>
                                <img src="../pylus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 2</span>
                            <button>
                                <img src="../pylus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>
                    <div class="border rounded-lg mb-4">
                        <div class="flex justify-between p-4 bg-gray-100">
                            <span>Semester 3</span>
                            <button>
                                <img src="../pylus.svg" alt="icon plus">
                            </button>
                        </div>
                    </div>

                    <!-- Button -->
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Buat Rencana Studi</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>