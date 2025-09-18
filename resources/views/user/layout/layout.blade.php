<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="/client/css/home.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (max-width: 800px) {
            .custom-hidden {
                display: none !important;
            }

            .custom-flex {
                display: flex !important;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')


</head>

<body>
    <!-- Header -->
    @include('components.header')

    <!-- Main Content -->
    <main>
        <div class="min-h-screen bg-gray-100">
            <!-- Mobile Sidebar Toggle -->
            <div class="md:hidden w-full">
                <div class="flex items-center justify-between bg-[#1B8996] text-white px-4 py-2 shadow-md">
                    <h2 class="text-lg font-semibold">Welcome, {{ Auth::user()->name }}</h2>
                    <button id="toggleSidebar" class="text-white-600 focus:outline-none">
                        ☰
                    </button>
                </div>
                <div id="mobileSidebar" class="hidden bg-white p-4 shadow-md">
                    <nav class="space-y-2">

                        <a href="{{ route('user.appointments') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-200 rounded">Appointment</a>

                    </nav>
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- Sidebar for Desktop -->
                <aside class="w-64 bg-[#1B8996] text-white hidden md:flex md:flex-col md:h-screen md:sticky top-0 shadow-md">
                    <div class="p-6 border-b border-white/20">
                        <h2 class="text-xl font-semibold">Welcome, {{ Auth::user()->name }}</h2>
                    </div>
                    <nav class="p-4 space-y-2 flex-1">

                        <a href="{{ route('user.appointments') }}" class="block px-4 py-2  hover:bg-white/10 rounded">Appointment</a>


                    </nav>
                </aside>


                <!-- Main Content -->
                <div class="flex-1 p-6">
                    <div class="bg-white shadow p-6 rounded">
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script>
        // Toggle mobile sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('hidden');
        });
    </script>

    <!-- Scripts -->
    @stack('scripts')

</body>

</html>