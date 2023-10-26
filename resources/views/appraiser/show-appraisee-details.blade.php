<x-app-layout>
    <div class="py-12">
        <div>
            @include('appraiser.sidebar')

            <div class="md:hidden text-white ms-4">
                <i class="fas fa-arrow-left fixed bg-blue-500"><span class=" p-1 bg-blue-500 capitalize">Press Here</span></i>
            </div>

{{--            @livewire('appraiser.appraisee-details')--}}
            @livewire('appraiser.appraisee-details', ['userId' => $userId])
            @livewire('appraiser.performance-planning', ['userId' => $userId])
            @livewire('appraiser.mid-year-review-form', ['userId' => $userId])
            @livewire('appraiser.end-of-year-review-from', ['userId' => $userId])
            @livewire('appraiser.annual-appriasal-core-form', ['userId' => $userId])
            @livewire('appraiser.annual-appriasal-none-core-form', ['userId' => $userId])

        </div>
    </div>
</x-app-layout>
