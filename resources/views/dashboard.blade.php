<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        
        Thia is my page
        <h1>{{Auth::user()->email}}</h1>
    </div>
</x-app-layout>
