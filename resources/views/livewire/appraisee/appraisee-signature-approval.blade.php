<div>
    @if (!$performancePlan->isEmpty()) <!-- Check if the collection is not empty -->
    @php
        $plan = $performancePlan->first(); // Get the first item from the collection
    @endphp
    @if (!$plan->appraisee_approve)
        <button wire:click="approveAppraiseeSignature" class="bg-blue-500 text-white rounded-3xl p-1 mb-6 mt-4">Approve Appraisee Signature</button>
    @else
        <div>
            <img src="{{ 'storage/'.$appraiseeSignature }}" alt="Appraisee's Signature" class="w-48">
            <p>Appraisee has approved.</p>
            <button wire:click="disapproveAppraiseeSignature" class="bg-red-500 text-white rounded-3xl p-1 mb-6 mt-4">Appraisee disapprove</button>

        </div>
    @endif
    @endif
</div>
