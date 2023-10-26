<x-app-layout>
    <div class="py-12">
        <div>
{{--                <x-sidebar></x-sidebar>--}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
            <!-- Styles -->

            @include('appraisee.sidebar')

            @livewire('appraisee.personal-details-form')
            @livewire('appraisee.training-records')

            @livewire('appraisee.performance-planning')

            {{--    Mid year review--}}
            @livewire('appraisee.mid-year-review-form')

            {{--End of year review--}}
            @livewire('appraisee.end-of-year-review-from')
            {{--    @include('forms.end-of-year-review')--}}

            {{--    Annual appraisal--}}
            @livewire('appraisee.annual-appriasal-core-form')
            @livewire('appraisee.annual-appriasal-none-core-form')

            {{--Career developtment--}}
            @include('forms.career-development')

            {{--  Assessment dercision--}}
            @include('forms.assessment-decision')

            {{--    Appraisee comments--}}
            @include('forms.appraisee-comments')

        </div>
    </div>
</x-app-layout>
