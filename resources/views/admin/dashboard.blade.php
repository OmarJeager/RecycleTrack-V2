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

        <!-- Create Section -->
        <div class="mt-8 space-y-4">
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.create') }}" class="text-blue-500 hover:text-blue-700">
                    {{ __('Create Machine') }}
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('torsado.create') }}" class="text-blue-500 hover:text-blue-700">
                    Create New Torsado Machine
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('lphunk.create') }}" class="text-blue-500 hover:text-blue-700">
                    Create New LP Hunk
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composetwo.create') }}" class="text-blue-500 hover:text-blue-700">
                    Create New ComposeTow
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composothree.create') }}" class="text-blue-500 hover:text-blue-700">
                    Create New ComposeThree
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composofour.create') }}" class="text-blue-500 hover:text-blue-700">
                    Create New ComposoFour
                </a>
            </div>
        </div>

        <!-- Show Section -->
        <div class="mt-8 space-y-4">
            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.sertissage') }}" class="text-blue-500 hover:text-blue-700">
                    Show All Machine Entry
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.torsado') }}" class="text-blue-500 hover:text-blue-700">
                    Show All Torsado
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('admin.lphunk') }}" class="text-blue-500 hover:text-blue-700">
                    Show All LP Hunk
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composetwo.index') }}" class="text-blue-500 hover:text-blue-700">
                    Show All Compose Tow
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composothree.index') }}" class="text-blue-500 hover:text-blue-700">
                    Show All Composo Three
                </a>
            </div>

            <div class="transition-transform transform hover:scale-105">
                <a href="{{ route('composofour.index') }}" class="text-blue-500 hover:text-blue-700">
                    Show All Composo Four
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
