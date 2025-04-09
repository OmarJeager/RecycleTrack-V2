<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <img src="{{ asset('logo2.png') }}" alt="Aptiv Image" class="absolute top-7 right-0 mt-2 mr-2 w-100 h-40 transition transform hover:scale-105">

    <div class="flex justify-between items-center mt-2 mb-2">
        <img src="{{ asset('logo.png') }}" alt="Aptiv Image" class="transition transform hover:scale-105">
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="absolute bottom-0 right-0 mb-2 mr-2">
                <img src="{{ asset('developeby.png') }}" alt="Aptiv Image" class="w-40 h-40 transition transform hover:scale-105">
            </div>

            <!-- Section for Links -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Navigation Areas</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="group">
                        <a href="{{ route('sertissage.create') }}" 
                           class="block p-4 bg-blue-100 rounded-lg shadow-md hover:bg-blue-200 transition transform hover:scale-105">
                            <span class="text-blue-500 group-hover:text-red-500 font-semibold">Crimping Area</span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="{{ route('add.create') }}" 
                           class="block p-4 bg-blue-100 rounded-lg shadow-md hover:bg-blue-200 transition transform hover:scale-105">
                            <span class="text-blue-500 group-hover:text-red-500 font-semibold">Twist Area</span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="{{ route('lphunkuser.create') }}" 
                           class="block p-4 bg-blue-100 rounded-lg shadow-md hover:bg-blue-200 transition transform hover:scale-105">
                            <span class="text-blue-500 group-hover:text-red-500 font-semibold">LP Hunk Area</span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="{{ route('usercoupeone.create') }}" 
                           class="block p-4 bg-blue-100 rounded-lg shadow-md hover:bg-blue-200 transition transform hover:scale-105">
                            <span class="text-blue-500 group-hover:text-red-500 font-semibold">Cutting Area G1</span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="{{ route('composetwouser.create') }}" 
                           class="block p-4 bg-blue-100 rounded-lg shadow-md hover:bg-blue-200 transition transform hover:scale-105">
                            <span class="text-blue-500 group-hover:text-red-500 font-semibold">Cutting Area G2</span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="{{ route('usercomposothree.create') }}" 
                           class="block p-4 bg-blue-100 rounded-lg shadow-md hover:bg-blue-200 transition transform hover:scale-105">
                            <span class="text-blue-500 group-hover:text-red-500 font-semibold">Cutting Area G3</span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="{{ route('usercomposofour.create') }}" 
                           class="block p-4 bg-blue-100 rounded-lg shadow-md hover:bg-blue-200 transition transform hover:scale-105">
                            <span class="text-blue-500 group-hover:text-red-500 font-semibold">Cutting Area G4</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-8">
        <p class="text-gray-600 text-sm">
            &copy; {{ date('Y') }} Aptiv. All rights reserved.
        </p>
    </div>
</x-app-layout>
