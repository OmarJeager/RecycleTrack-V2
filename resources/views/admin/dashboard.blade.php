<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <a href="{{ route('admin.create') }}" class="text-blue-500 hover:text-blue-700">
            {{ __('Create Machine') }}
        </a><br>
        @if(session('success'))
        <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" style="margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif
</a>
<div class="mt-4">
    <a href="{{ route('torsado.create') }}" class="text-blue-500 hover:text-blue-700">
        Create New Torsado Machine
    </a>
        <div class="mt-4">
            <a href="{{ route('admin.sertissage') }}" class="text-blue-500 hover:text-blue-700">
                Show All  Machine Entry</a>
    
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.torsado') }}" class="text-blue-500 hover:text-blue-700">
                Show All  Torsado</a>
    
        </div>
        {{-- 
        <a href="{{ route('sertissage.index') }}" class="text-blue-500 hover:text-blue-700">
            {{ __('All Machine') }}
        </a> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
       
    </x-slot>

</x-app-layout>
