<div>
    @if (session()->has('message'))
        <div class="alert alert-success text-green-700 z-50">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-success text-red-500 z-50">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="submitForm">
        @foreach($institutions as $key => $institution)
            <div class="flex flex-wrap md:flex-nowrap gap-2">
                <div class="w-2/3 pt-2">
                    <label class="block">Add Institution</label>
                    <div>
                        <input type="text" class="form-input w-full" wire:model="institutions.{{ $key }}.name">
                        @error("institutions.$key.name")
                            <span class="error text-red-600 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="pt-2 w-1/3">
                    <label class="block">Add Date (mm-dd-yyyy)</label>
                    <div >
                        <input type="date" class="w-full mb-5" wire:model="institutions.{{ $key }}.date">
                        @error("institutions.$key.date")
                            <span class="error text-red-600 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        @endforeach
        <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white hover:bg-blue-800">Submit</button>
    </form>

</div>
