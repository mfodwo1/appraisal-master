
{{-- Performance planning --}}
<div>
    <div class="container mx-auto p-4 my-6">
        <div class="w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                <div class="text-center">
                    <h4 class="text-lg font-semibold">SECTION 2: Performance Planning Form</h4>
                    <p class="text-sm">To be agreed between the Appraiser and the employee at the start of the annual appraisal cycle or when a new employee is engaged</p>
                </div>

                <!-- Key Result Area and Resources Required -->
                <div class="mb-5">
                    @livewire('appraiser.performance-plan-list', ['userId' => $userId])

                    @if (session('success'))
                        <div class="alert alert-success text-green-700 z-50">{{ session('success') }}</div>
                    @elseif (session('error'))
                        <div class="alert alert-error text-red-600 z-50">{{ session('error') }}</div>
                    @endif

                    @if ($formSubmitted)
                        <div>
                            <p>Performance planning form has already been submitted for this year edit form above.</p>
                        </div>
                    @else{
                    <form wire:submit.prevent="submitPerformancePlanning">
                        <div class="flex flex-wrap md:flex-nowrap gap-2">
                            <!-- Task Submission -->

                            <div class="mb-5">
                                <div class="max-w-sm rounded overflow-hidden">
                                    <div class="px-1 py-4">
                                        <label class="font-bold text-l mb-2" for="target">TARGET
                                            @foreach ($tasks as $index => $task)
                                                <div class="px-1">
                                                    <textarea wire:model="tasks.{{ $index }}.target" type="text" cols="50" rows="1" class="w-full p-2"></textarea>
                                                    @error("tasks.{$index}.target") <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                </div>
                                            @endforeach
                                        </label>
                                    </div>
                                </div>
                                <button wire:click.prevent="addTask" class="bg-blue-500 text-white p-2 rounded-3xl mt-2">Add Task</button>
                            </div>

                            <div class="max-w-sm rounded overflow-hidden">
                                <div class="px-0.5 py-4">
                                    <label class="font-bold text-l mb-2" for="key_result_area">KEY RESULT AREAS
                                        <textarea wire:model="keyResultArea" type="text" cols="50" rows="9" class="w-full p-2"></textarea>
                                        @error('keyResultArea') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                            </div>
                            <div class="max-w-sm rounded overflow-hidden">
                                <div class="px-1 py-4">
                                    <label class="font-bold text-l mb-2" for="resource_">RESOURCES REQUIRED
                                        <textarea wire:model="resourceRequired" type="text" cols="50" rows="9" class="w-full p-2"></textarea>
                                        @error('resourceRequired') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                            </div>
                        </div>
                            <!-- Submit button -->
                            <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Update</button>
                            @if (session('success'))
                                <div class="alert alert-success text-green-700 z-50">Updated</div>
                            @endif
                    </form>
                    @endif

                    <!-- Signature -->
                    <hr class="my-5">
                    <div class="grid grid-cols-2 gap-4">
                        @if(isset($performancePlan))
                            @livewire('appraiser.appraisee-signature-approval', ['performancePlan' => $performancePlan, 'userId' => $userId])
                        @endif
                        <!-- Appraiser Signature Approval -->
                        @if(isset($performancePlan))
                            @livewire('appraiser.appraiser-signature-approval', ['performancePlan' => $performancePlan])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
