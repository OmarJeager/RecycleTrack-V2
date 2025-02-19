<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('sertissage.create') }}" class="text-blue-500 hover:underline">
                    Create Sertissage
                </a>
            </div>
            <div class="mt-4">
                <a href="{{ route('add.create') }}" class="text-blue-500 hover:underline">
                    Create Torsadodd
                </a>
            </div>
            <div class="mt-4">
                <a href="{{ route('lphunkuser.create') }}" class="text-blue-500 hover:underline">
                    Create LP Hunk
                </a>
            </div>
            <div class="mt-4">
                <a href="{{ route('composetwouser.create') }}" class="text-blue-500 hover:underline">
                    Create Compose Two
                </a>
            </div>
            <div class="mt-4">
                <a href="{{ route('usercomposothree.create') }}" class="text-blue-500 hover:underline">
                    Create Compose three
                </a>
            </div>
            <div class="mt-4">
                <a href="{{ route('usercomposofour.create') }}" class="text-blue-500 hover:underline">
                    Create Compose Four
                </a>
            </div>
        </div>
</x-app-layout>
