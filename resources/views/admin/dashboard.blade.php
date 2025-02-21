<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Logo -->
        <div class="flex justify-start">
            <img src="{{ asset('logo.png') }}" alt="Aptiv Image" class="first">
        </div>

        <!-- Section Create -->
        <div class="bg-red-500 text-black text-2xl p-4">
            <h1>Section Create</h1>
        </div>
        <div class="transition-transform transform hover:scale-105">
            <a href="{{ route('admin.create') }}" class="text-blue-500 hover:text-blue-700">
                Create New Crimping Machine
            </a>
        </div>
        <div class="transition-transform transform hover:scale-105">
            <a href="{{ route('torsado.create') }}" class="text-blue-500 hover:text-blue-700">
                Create New Twist Machine
            </a>
        </div>
        <div class="transition-transform transform hover:scale-105">
            <a href="{{ route('lphunk.create') }}" class="text-blue-500 hover:text-blue-700">
                Create New LP Hunk Machine
            </a>
        </div>
        <div class="transition-transform transform hover:scale-105">
            <a href="{{ route('coupeone.create') }}" class="text-blue-500 hover:text-blue-700">
                Create New Cutting G1 Machine
            </a>
        </div>
        <div class="transition-transform transform hover:scale-105">
            <a href="{{ route('composetwo.create') }}" class="text-blue-500 hover:text-blue-700">
                Create New Cutting G2 Machine
            </a>
        </div>
        <div class="transition-transform transform hover:scale-105">
            <a href="{{ route('composothree.create') }}" class="text-blue-500 hover:text-blue-700">
                Create New Cutting G3 Machine
            </a>
        </div>
        <div class="transition-transform transform hover:scale-105">
            <a href="{{ route('composofour.create') }}" class="text-blue-500 hover:text-blue-700">
                Create New Cutting G4 Machine
            </a>
        </div>

        <!-- Section Filter By Date -->
        <div class="bg-red-500 text-black text-2xl p-4">
            <h1>Section Filter By Date</h1>
        </div>
        <div class="mt-8 space-y-4">
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.sertissage') }}" class="text-blue-500 hover:text-blue-700">
                    Filter By Crimping Data
                </a>
            </div>
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.torsado') }}" class="text-blue-500 hover:text-blue-700">
                    Filter By Twist Data
                </a>
            </div>
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.lphunk') }}" class="text-blue-500 hover:text-blue-700">
                    Filter By Date LP Hunk Data
                </a>
            </div>
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('coupeone.index') }}" class="text-blue-500 hover:text-blue-700">
                    Filter By Date Coupe G1 Data
                </a>
            </div>
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composetwo.index') }}" class="text-blue-500 hover:text-blue-700">
                    Filter By Coupe G2 Data
                </a>
            </div>
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composothree.index') }}" class="text-blue-500 hover:text-blue-700">
                    Filter By Coupe G3 Data
                </a>
            </div>
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composofour.index') }}" class="text-blue-500 hover:text-blue-700">
                    Filter By Date Coupe G4 Data
                </a>
            </div>
        </div>
        <!-- Section Filter By Date -->
        <div class="bg-red-500 text-black text-2xl p-4">
            <h1>Section Archive</h1>
        </div>
        <div class="mt-8 space-y-4">
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.archive') }}" class="text-blue-500 hover:text-blue-700">
                    Crimping Area Data Archive
                </a>
            </div>
            <div class="mt-8 space-y-4">
                <div class="transition-transform transform hover:scale-105">
                    <a href="{{ route('torsado.archive') }}" class="text-blue-500 hover:text-blue-700">
                        Twist Area Data Archive
                    </a>
                </div>
                <div class="mt-8 space-y-4">
                    <div class="transition-transform transform hover:scale-105">
                        <a href="{{ route('lphunk.archive') }}" class="text-blue-500 hover:text-blue-700">
                            LP Hunk Area Data Archive
                        </a>
                    </div>
                    <div class="mt-8 space-y-4">
                        <div class="transition-transform transform hover:scale-105">
                            <a href="{{ route('coupeone.archive') }}" class="text-blue-500 hover:text-blue-700">
                                Cutting Area G1 Data Archive
                                </a>
                            </div>
                            <div class="mt-8 space-y-4">
                                <div class="transition-transform transform hover:scale-105">
                                    <a href="{{ route('composotwo.archive') }}" class="text-blue-500 hover:text-blue-700">
                                        Cutting Area G2 Data Archive
                                    </a>
                                </div>
                                <div class="mt-8 space-y-4">
                                    <div class="transition-transform transform hover:scale-105">
                                        <a href="{{ route('composothree.archive') }}" class="text-blue-500 hover:text-blue-700">
                                        Cutting Area G3 Data Archive
                                        </a>
                                </div>
                                <div class="mt-8 space-y-4">
                                    <div class="transition-transform transform hover:scale-105">
                                        <a href="{{ route('composofour.archive') }}" class="text-blue-500 hover:text-blue-700">
                                        Cutting Area G4 Data Archive
                                        </a>
                                </div>        
        </div>
        <!-- Log Out -->
        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </x-slot>
</x-app-layout>
