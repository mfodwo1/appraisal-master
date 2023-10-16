
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
                    @livewire('performance-plan-list')

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
                            @livewire('appraisee-signature-approval', ['performancePlan' => $performancePlan])
                        @endif

                        <!-- Appraiser Signature Approval -->
                        @if(isset($performancePlan))
                            @livewire('appraiser-signature-approval', ['performancePlan' => $performancePlan])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






{{--    Performance planing --}}
{{--<div>--}}
{{--    <div class="container mx-auto p-4 my-6 ">--}}
{{--        <div class=" w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">--}}
{{--            <div class="py-5">--}}
{{--                <div class="text-center">--}}
{{--                    <h4 class="text-lg font-semibold">SECTION 2: Performance Planning Form</h4>--}}
{{--                    <p class="text-sm">To be agreed between the Appriaser and the employee at the start of the annual appraisal cycle or when a new employee is engaged</p>--}}
{{--                </div>--}}
{{--                @if (session('success'))--}}
{{--                    <div class="alert alert-success text-green-700 z-50">{{ session('success') }}</div>--}}
{{--                @elseif (session('error'))--}}
{{--                    <div class="alert alert-error text-red-600 z-50">{{ session('error') }}</div>--}}
{{--                @endif--}}
{{--                <form wire:submit.prevent="submitPerformancePlanning">--}}
{{--                    <div class="mb-5">--}}
{{--                        <div class="flex flex-wrap md:flex-nowrap gap-2">--}}
{{--                            <div class="max-w-sm rounded overflow-hidden ">--}}
{{--                                <div class="px-0.5 py-4">--}}
{{--                                    <label class="font-bold text-l mb-2" for="key_result_area">KEY RESULT AREAS--}}
{{--                                        <textarea wire:model="keyResultArea"  type="text" cols="50" rows="9" class="w-full p-2 " ></textarea>--}}
{{--                                        @error('keyResultArea') <span class="error text-red-600 block">{{ $message }}</span> @enderror--}}
{{--                                    </label>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="max-w-sm rounded overflow-hidden ">--}}
{{--                                <div class="px-1 py-4">--}}
{{--                                    <label class="font-bold text-l mb-2" >TARGETS--}}
{{--                                        <textarea wire:model="target1" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>--}}
{{--                                        @error('target1') <span class="error text-red-600 block">{{ $message }}</span> @enderror--}}
{{--                                        <textarea wire:model="target2" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>--}}
{{--                                        @error('target2') <span class="error text-red-600 block">{{ $message }}</span> @enderror--}}
{{--                                        <textarea wire:model="target3" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>--}}
{{--                                        @error('target3') <span class="error text-red-600 block">{{ $message }}</span> @enderror--}}
{{--                                        <textarea wire:model="target4" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>--}}
{{--                                        @error('target4') <span class="error text-red-600 block">{{ $message }}</span> @enderror--}}
{{--                                        <textarea wire:model="target5" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>--}}
{{--                                        @error('target5') <span class="error text-red-600 block">{{ $message }}</span> @enderror--}}
{{--                                    </label>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="max-w-sm rounded overflow-hidden">--}}
{{--                                <div class="px-1 py-4">--}}
{{--                                    <label class="font-bold text-l mb-2" for="resource_">RESOURCES REQUIRED--}}
{{--                                        <textarea wire:model="resourceRequired" type="text" cols="50" rows="9" class="w-full p-2 "  ></textarea>--}}
{{--                                        @error('resourceRequired') <span class="error text-red-600 block">{{ $message }}</span> @enderror--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Signature -->--}}
{{--                    <hr class="my-5">--}}
{{--                    <div class="grid grid-cols-2 gap-4">--}}
{{--                        <!-- Appraisee's Signature -->--}}
{{--                        <div>--}}
{{--                            <p class="block font-semibold">APPRAISEE’S SIGNATURE</p>--}}
{{--                            @if ($submission && $submission->appraisee_approve)--}}
{{--                                <!-- Display the signature image -->--}}
{{--                                <img src="{{ asset('storage/'.$userSignature) }}" alt="Appraisee's Signature" class="max-w-xs mt-2">--}}
{{--                                <button wire:click="appraiseeDisapprove" class="bg-red-500 text-white p-2 rounded-lg mt-4">Disapprove</button>--}}
{{--                            @endif--}}

{{--                            <!-- Display the "Approve and sign" button if not approved -->--}}
{{--                            @unless ($submission && $submission->appraisee_approve)--}}
{{--                                <button wire:click="approveAppraisee" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Approve and sign</button>--}}
{{--                            @endunless--}}

{{--                            <label for="appraiseeDate" class="block mt-2">Date:--}}
{{--                                <input type="date" class="w-full p-2" name="appraiseeDate" id="appraiseeDate">--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <!-- Appraiser's Signature -->--}}
{{--                        <div>--}}
{{--                            <p class="block font-semibold">APPRAISER’S SIGNATURE</p>--}}
{{--                            @if ($submission && $submission->appraiser_approve)--}}
{{--                                <!-- Display the signature image -->--}}
{{--                                <img src="{{ asset('storage/'.$userSignature) }}" alt="Appraiser's Signature" class="max-w-xs mt-2">--}}
{{--                                <button wire:click="appraiserDisapprove" class="bg-red-500 text-white p-2 rounded-lg mt-4">Disapprove</button>--}}
{{--                            @endif--}}

{{--                            <!-- Display the "Approve and sign" button if not approved -->--}}
{{--                            @unless ($submission && $submission->appraiser_approve)--}}
{{--                                <button wire:click="approveAppraiser" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Approve and sign</button>--}}
{{--                            @endunless--}}

{{--                            <label for="appraiserDate" class="block mt-2">Date:--}}
{{--                                <input type="date" class="w-full p-2" name="appraiserDate" id="appraiserDate">--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Submit button -->--}}
{{--                    <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Update</button>--}}
{{--                    @if (session('success'))--}}
{{--                        <div class="alert alert-success text-green-700 z-50">Updated</div>--}}
{{--                    @endif--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
