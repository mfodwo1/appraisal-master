<div>
    @if (!$performancePlan->isEmpty()) <!-- Check if the collection is not empty -->
    @php
        $plan = $performancePlan->first(); // Get the first item from the collection
    @endphp
    @if (!$plan->appraiser_approve)
        <button wire:click="approveAppraiserSignature" class="bg-blue-500 text-white rounded-3xl p-1 mb-6 mt-4">Approve Appraiser Signature</button>
    @else
        <div>
            <img src="{{ '../storage/'.$appraiserSignature }}" alt="Appraiser's Signature" class="w-48">
            <p>Appraisee has approved.</p>
            <button wire:click="disapproveAppraiserSignature" class="bg-red-500 text-white rounded-3xl p-1 mb-6 mt-4">Appraiser disapprove</button>

        </div>
    @endif
    @endif
</div>
