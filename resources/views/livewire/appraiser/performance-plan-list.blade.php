<div>
    <h2 class="text-2xl font-semibold mb-4">Performance Plans</h2>

    <!-- Display a table of performance plans -->
    <div class="flex flex-col overflow-x-auto">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full bg-white border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="p-2 text-left border-b border-gray-300 w-28">Key Result Area</th>
                                <th class="p-2 text-left border-b border-gray-300 w-28">Resource Required</th>
                                <th class="p-2 text-left border-b border-gray-300 w-28">Targets</th>
                                <th class="p-2 text-left border-b border-gray-300 w-8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($performancePlans as $plan)
                                <tr>
                                    <td class="p-2 border-b border-gray-300">
                                        @if ($editMode && $editPlanId === $plan->id)
                                            <input wire:model="keyResultArea" type="text" class="w-full">
                                        @else
                                            {{ $plan->key_result_area }}
                                        @endif
                                    </td>
                                    <td class="px-2 py-2 border-b border-gray-300">
                                        @if ($editMode && $editPlanId === $plan->id)
                                            <input wire:model="resourceRequired" type="text" class="w-full">
                                        @else
                                            {{ $plan->resource_required }}
                                        @endif
                                    </td>
                                    <td class="px-2 py-2 border-b border-gray-300">
                                        @foreach ($plan->targets as $target)
                                            @if ($editTargetMode && $editPlanId === $plan->id)
                                                <div class="flex ">
                                                    <input wire:model="editedTargets.{{ $target->id }}" type="text" class="w-full"><br>
                                                    <button wire:click="deleteTarget({{ $target->id }})" type="submit" class="px-2 py-2 rounded-full text-red-500 ml-2"><i class="fas fa-trash"></i></button>
                                                </div>
                                            @else
                                                {{ $target->target }}<br>
                                            @endif
                                        @endforeach
                                            @if ($editTargetMode)
                                                <div>
                                                   <!-- Include the AddTarget component to allow adding new targets -->
                                                    @livewire('appraiser.add-target', ['planId' => $editPlanId])
                                                </div>
                                            @endif
                                    </td>
                                    <td class="p-2 border-b border-gray-300">
                                        @if ($editMode && $editPlanId === $plan->id)
                                            <button wire:click="update({{ $plan->id }})" type="submit" class="px-4 py-2 rounded-full text-blue-500"><i class="fas fa-save mr-1"></i>Save</button>
                                            <button wire:click="cancelEdit" type="submit" class="px-4 py-2 rounded-full text-red-500 ml-2"><i class="fas fa-cancel mr-1"></i>Cancel</button>
                                        @elseif ($editTargetMode && $editPlanId === $plan->id)
                                            <button wire:click="updateTargets({{ $plan->id }})" type="submit" class="px-4 py-2 rounded-full text-blue-500"><i class="fas fa-save mr-1"></i>Save</button>
                                            <button wire:click="cancelEdit" type="submit" class="px-4 py-2 rounded-full text-red-500 ml-2"><i class="fas fa-cancel mr-1"></i>Cancel</button>
                                        @else
                                            <div>
                                            <button wire:click="edit({{ $plan->id }})" type="submit" class=" px-2 py-2 rounded-full text-blue-500"><i class="fas fa-edit"></i></button>
                                            <button wire:click="delete({{ $plan->id }})" type="submit" class="px-2 py-2 rounded-full text-red-500 ml-2"><i class="fas fa-trash"></i></button>
                                            <span>Plan</span>
                                            </div>
                                            <button wire:click="editTargets({{ $plan->id }})" type="submit" class="px-2 py-2 rounded-full text-blue-500 mt-2"><i class="fas fa-edit"></i></button>
                                            <span>target</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
