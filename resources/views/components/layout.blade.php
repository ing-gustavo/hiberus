<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">

        <nav class="bg-white shadow">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between">

                    <div class="flex">
                       
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="/"  class="{{ request()->is('/') ? 'border-indigo-500 text-gray-900': 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center border-b-2  px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Dashboard</a>
                            <a href="/vehicles"  class="{{ request()->is('vehicles') ? 'border-indigo-500 text-gray-900': 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center border-b-2  px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Vehicles</a>
                            <a href="/drivers" class="{{ request()->is('drivers') ? 'border-indigo-500 text-gray-900': 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center border-b-2  px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Drivers</a>
                            <a href="/trips" class="{{ request()->is('trips') ? 'border-indigo-500 text-gray-900': 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center border-b-2  px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Trips</a>
                        </div>
                    </div>
               
                </div>
            </div>

        </nav>

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <main class="container m-auto p-6 lg:p-8 ">
                {{ $slot }}
            </main>
        </div>
        @stack('scripts')
    </body>
</html>

