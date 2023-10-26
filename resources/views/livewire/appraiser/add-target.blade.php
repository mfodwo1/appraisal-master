<div>
    <form wire:submit.prevent="addTarget">
            <label for="newTarget">New Target</label><br>
            <input type="text" wire:model="newTarget" class="w-full">
            <div>
                @error('newTarget') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

        <button type="submit" class="bg-blue-500 px-2 py-2 rounded-full text-white mt-2">Add Target</button>
    </form>
</div>
