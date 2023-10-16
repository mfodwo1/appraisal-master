<div>

@if ($appraiserSignature) <!-- Check if the collection is not empty -->
        <div>
            <img src="{{ 'storage/'.$appraiserSignature }}" alt="Appraisee's Signature" class="w-48">
            <p>Appraisee has approved.</p>

        </div>
    @endif
</div>





{{--<div>--}}
{{--    @foreach($performancePlan as $plan)--}}
{{--        @if (!$plan->appraiser_approve)--}}
{{--            <button wire:click="approveAppraiserSignature">Approve Appraiser Signature</button>--}}
{{--        @else--}}
{{--            <div>--}}
{{--                <img src="{{ $performancePlan->appraiser_signature }}" alt="Appraiser's Signature">--}}
{{--                <p>Appraiser has approved.</p>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--</div>--}}
