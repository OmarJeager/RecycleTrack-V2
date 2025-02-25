<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <img src="{{ asset('logo2.png') }}" alt="Aptiv Image" class="absolute top-7 right-0 mt-2 mr-2 w-100 h-40 transition transform hover:scale-105">

    <div class="flex justify-between items-center mt-2 mb-2">
        <img src="{{ asset('logo.png') }}" alt="Aptiv Image" class="transition transform hover:scale-105">
        <img src="{{ asset('developeby.png') }}" alt="Aptiv Image" class="transition transform hover:scale-105">
    </div>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div>

        <div class="mt-4 group">
            <a href="{{ route('sertissage.create') }}" 
               class="text-blue-500 hover:text-red-500 hover:text-lg hover:underline group-active:text-red-500 group-active:text-lg group-active:font-bold">
                Crimping Area
            </a>
        </div>
        <div class="mt-4 group">
            <a href="{{ route('add.create') }}" 
               class="text-blue-500 hover:text-red-500 hover:text-lg hover:underline group-active:text-red-500 group-active:text-lg group-active:font-bold">
                Twist Area
            </a>
        </div>
        <div class="mt-4 group">
            <a href="{{ route('lphunkuser.create') }}" 
               class="text-blue-500 hover:text-red-500 hover:text-lg hover:underline group-active:text-red-500 group-active:text-lg group-active:font-bold">
                LP Hunk Area
            </a>
        </div>
        <div class="mt-4 group">
            <a href="{{ route('usercoupeone.create') }}" 
               class="text-blue-500 hover:underline group-active:text-red-500 group-active:text-lg group-active:font-bold">
                Cutting Area G1
            </a>
        </div>
        <div class="mt-4 group">
            <a href="{{ route('composetwouser.create') }}" 
               class="text-blue-500 hover:underline group-active:text-red-500 group-active:text-lg group-active:font-bold">
                Cutting Area G2
            </a>
        </div>
        <div class="mt-4 group">
            <a href="{{ route('usercomposothree.create') }}" 
               class="text-blue-500 hover:underline group-active:text-red-500 group-active:text-lg group-active:font-bold">
                Cutting Area G3
            </a>
        </div>
        <div class="mt-4 group">
            <a href="{{ route('usercomposofour.create') }}" 
               class="text-blue-500 hover:underline group-active:text-red-500 group-active:text-lg group-active:font-bold">
                Cutting Area G4
            </a>
        </div>
        
    </div>
</div>

</x-app-layout>
