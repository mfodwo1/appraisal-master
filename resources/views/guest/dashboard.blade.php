<x-app-layout>
    <!-- Styles -->


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        @include('guest.guest')
    </div>

</x-app-layout>
