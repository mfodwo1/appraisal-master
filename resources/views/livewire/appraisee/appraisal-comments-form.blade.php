<div>
    {{--    Appraiser’s Comments on Performance Plan Achievements--}}
    <div class="container mx-auto p-4 my-6 ">
        <div class=" w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                <h2 class="text-2xl font-semibold">SECTION 6: Annual Appraisal</h2>
                <h3 class="text-xl font-semibold">Appraiser’s Comments on Performance Plan Achievements</h3>
                <form wire:submit.prevent="submitcomment">
                    <div class="mb-4">
                        <label for="appraiser-comments" class="block text-base font-medium">Comment on Performance Plan achievements and additional contributions made</label>
                        <textarea wire:model.debounce="comments" class="w-full p-2 border border-gray-300 rounded-lg" id="appraiser-comments" rows="4"></textarea>
                        @error('comments') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="appraiserSignature" class="block text-base font-medium">APPRAISER’S SIGNATURE</label><br>
                            <input wire:model="appraiserSignature" type="file" id="appraiserSignature" accept="image/*" class="mt-2">
                            <img wire:loading wire:target="appraiserSignature" src="{{ asset('images/loading.gif') }}" alt="Uploading..." class="max-w-xs mt-2">
                            @if($appraiserSignature)
                                <img src="{{ $appraiserSignature->temporaryUrl() }}" alt="Signature Preview" class="max-w-xs mt-2">
                                <button wire:click="removeSignature" class="btn btn-primary mt-2">Remove Signature</button>
                            @endif
                            <label for="appraiserDate" class="block mt-2 text-right">Date:</label>
                            <input type="date" class="w-full p-2 border border-gray-300 rounded-lg" name="appraiserDate" id="appraiserDate">
                            @error('appraiserDate') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white rounded-3xl p-2 mb-6 mt-4">Add Comment</button>
                </form>
                @if (session()->has('message'))
                    <div class="alert alert-success text-green-700 inline">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
