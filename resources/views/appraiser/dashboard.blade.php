<x-app-layout>
    <div class="py-12">
        <div>
{{--                <x-sidebar></x-sidebar>--}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
            <!-- Styles -->
            @include('appraiser.sidebar')

            @livewire('appraiser.appraiser-details')
            @livewire('appraisal-comments-form')
        </div>
    </div>
</x-app-layout>
