<div>
    <div class="container mx-auto p-4 my-6">
        <div class="w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                <h4 class="text-xl font-semibold mt-4">TRAINING RECEIVED DURING THE PREVIOUS YEAR</h4>
                <form wire:submit.prevent="submitForm">
                @foreach($institutions as $key => $institutionData)
                    <div class="flex flex-wrap md:flex-nowrap gap-2">
                        @if ($editIndex === $key)
                            <!-- Input fields for editing -->
                            <div class="w-4/6">
                                <label class="block w-full">Institution {{ $key + 1 }}</label>
                                <div>
                                    <input type="text" class="w-full" wire:model="editedInstitution.name" >
                                    @error("editedInstitution.name") <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="w-1/6">
                                <label class="block w-full">Date (mm-dd-yyyy)</label>
                                <div>
                                    <input type="date" class="w-full" wire:model="editedInstitution.date" >
                                    @error("editedInstitution.date") <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="w-1/6 pt-6 ms-4">
                                <button wire:click="saveEditedInstitution({{ $key }})" class="bg-green-500 px-3 py-1 rounded-3xl text-white hover:bg-green-800">Save</button>
                                <button wire:click="cancelEdit" class="bg-red-500 px-3 py-1 rounded-3xl text-white hover:bg-red-800">Cancel</button>
                            </div>
                        @else
                            <!-- Display mode with the data -->
                            <div class="w-4/6">
                                <label class="block">Institution {{ $key + 1 }}</label>
                                <div>
                                    <input type="text" class="form-input w-full" value="{{ $institutionData['institution'] }}" readonly>
                                </div>
                            </div>
                            <div class="w-1/6">
                                <label class="block">Date (mm-dd-yyyy)</label>
                                <div>
                                    <input type="date" class="form-input mb-5" value="{{ $institutionData['training_date'] }}" readonly>
                                </div>
                            </div>
                            <div class="w-1/6 pt-6 ms-4">
                                <button wire:click="editInstitution({{ $key }})" class="px-3 py-1 rounded-3xl text-blue-500 hover:bg-blue-500 hover:text-white"><i class="fas fa-edit mr-1"></i></button>
                                <button wire:click="removeInstitution({{ $key }})" class="px-3 py-1 rounded-3xl text-red-500 hover:bg-red-800 hover:text-white"><i class="fas fa-trash mr-1"></i></button>
                            </div>
                        @endif
                    </div>
                @endforeach
{{--                    <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white hover:bg-blue-800">Submit</button>--}}
                </form>
                @livewire('add-new-training-record')
            </div>
        </div>
    </div>
</div>

