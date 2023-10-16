<div>


    {{--    Training attended --}}
    <div class="container mx-auto p-4 my-6 ">
        <div class=" w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <!-- TRAINING RECEIVED DURING THE PREVIOUS YEAR -->
            <!-- Display a success message if available -->
            @if (session('success'))
                <div class="alert alert-success text-green-700 z-50">{{ session('success') }}</div>
            @endif
            <div class="py-5">
                <h4 class="text-xl font-semibold mt-4">TRAINING RECEIVED DURING THE PREVIOUS YEAR</h4>
                <form wire:submit.prevent="submitForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div class="form-group ">
                        <label class="block">Institution:
                            <input type="text" class="form-input w-full" wire:model="institution" >
                            @error('institution') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                    <div class="form-group pt-2">
                        <label class="block">Date (mm-dd-yyyy):
                            <input type="date" class="form-input mb-5" wire:model="trainingDate" >
                            @error('trainingDate') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div class="form-group ">
                        <label class="block">Institution:
                            <input type="text" class="form-input w-full" wire:model="institution2" >
                            @error('institution2') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="block">Date (mm-dd-yyyy):
                            <input type="date" class="form-input mb-5" wire:model="trainingDate2" >
                            @error('trainingDate2') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div class="form-group ">
                        <label class="block">Institution:
                            <input type="text" class="form-input w-full" wire:model="institution3" >
                            @error('institution3') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="block">Date (mm-dd-yyyy):
                            <input type="date" class="form-input mb-5" wire:model="trainingDate3" >
                            @error('trainingDate3') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white hover:bg-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
