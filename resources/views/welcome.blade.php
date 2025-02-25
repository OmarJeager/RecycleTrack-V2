<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100 flex flex-col min-h-screen">
    <img src="{{ asset('logo2.png') }}" alt="Aptiv Image" class="absolute top-0 left-0 mt-2 mr-2 w-100 h-40 transition transform hover:scale-105">
    
    <!-- Main content area -->
    <div class="flex-grow flex flex-col items-center justify-center">
        <!-- Image with spacing -->
        <img src="{{ asset('aptiv.png') }}" alt="Aptiv Image" class="mt-8 mb-6 transition transform hover:scale-105">
        <img src="{{ asset('logo.png') }}" alt="Aptiv Image" class="mt-2 mb-2 transition transform hover:scale-105">
        <img src="{{ asset('developeby.png') }}" alt="Aptiv Image" class="absolute top-0 right-0 mt-2 mr-2 w-100 h-40 transition transform hover:scale-105">
        @if (Route::has('login'))
            <div class="flex justify-center items-center mb-6">
                <nav class="flex space-x-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-5 py-2 bg-blue-500 text-white ring-1 ring-transparent transition transform hover:bg-blue-600 hover:scale-105 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-5 py-2 bg-red-500 text-white ring-1 ring-transparent transition transform hover:bg-blue-600 hover:scale-105 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-5 py-2 bg-red-500 text-white ring-1 ring-transparent transition transform hover:bg-blue-600 hover:scale-105 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </div>
        @endif
    </div>

    <!-- Footer with padding -->
    <footer class="w-full py-4 bg-gray-800 text-white text-center">
        &copy; {{ date('Y') }} Aptiv All rights reserved.
    </footer>

</body>
</html>
