{{-- mid year review --}}
<div>
    <div class="container mx-auto p-4 my-6 ">
        <div class=" w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                <div class="text-center">
                    <h4 class="text-lg font-semibold">SECTION 3: Mid-Year Review Form</h4>
                    <p class="text-sm">This is to be completed in July by the Appraiser and Appraisee</p>
                    <p class="text-sm">Progress has been discussed and Agreements have been reached as detailed
                        below.</p>
                    <h5 class="text-lg font-semibold">MID-YEAR REVIEW</h5>
                </div>
                @if (session('message'))
                    <div class="alert alert-success text-green-700 z-50">{{ session('message') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-error text-red-600 z-50">{{ session('error') }}</div>
                @endif
                <form wire:submit.prevent="submitPerformancePlanning">
                    <div class="flex flex-wrap md:flex-nowrap gap-2">
                        <div class="mb-5">
                            <div class="max-w-sm rounded overflow-hidden">
                                <div class="px-1 py-4">
                                    <label class="font-bold text-l mb-2">TARGET</label>
                                    @foreach ($targets as $target)
                                        <div class="px-1">
                                            <!-- Display the target from the fetched targets in a read-only input -->
                                            <textarea class="w-full h-10 " cols="30" readonly>{{ $target->target }}</textarea>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="max-w-sm rounded overflow-hidden">
                            <div class="px-0.5 py-4">
                                <label class="font-bold text-l mb-2" for="key_result_area">progress Review
                                    <textarea wire:model="progressReview" type="text" cols="40" rows="10" class="w-full p-2"></textarea>
                                    @error('progressReview') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                </label>
                            </div>
                        </div>
                        <div class="max-w-sm rounded overflow-hidden">
                            <div class="px-1 py-4">
                                <label class="font-bold text-l mb-2" for="resource_">Remarks
                                    <textarea wire:model="remarks" type="text" cols="50" rows="10" class="w-full p-2"></textarea>
                                    @error('remarks') <span class="error text-red-600 block">{{ $message }}</span> @enderror
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




                <div class="flex flex-col overflow-x-auto">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full bg-white border-collapse border border-gray-300">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-2 w-1">NO.</th>
                                        <th class="px-4 py-2">TARGET</th>
                                        <th class="px-4 py-2">PERFORMANCE ASSESSMENT</th>
                                        <th class="px-4 py-2 w-2">WEIGHT OF TARGET</th>
                                        <th class="px-4 py-2">SCORE</th>
                                        <th class="px-4 py-2">COMMENTS</th>
                                    </tr>
                                    </thead>
                                    <tbody id="dynamic-table-body">
                                    @php
                                        $rowNumber = 1; // Initialize the row number counter
                                    @endphp
                                    @foreach ($targets as $target)
                                        <tr>
                                            <td class="bg-gray-100 pl-3">{{ $rowNumber }}</td>
                                            <td class="bg-gray-100"><textarea wire:model="target" type="text" cols="50" rows="1" class="w-full p-2 ">{{ $target->target }}</textarea>
                                                @error('target1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                            </td>
                                            <td class="bg-gray-100"><textarea wire:model="performanceAssessment" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                                @error('performanceAssessment1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                            </td>
                                            <td class="bg-gray-100"><textarea type="text" cols="20" rows="1" class="w-full p-2 " readonly>5</textarea>
                                            </td>
                                            <td class="bg-gray-100"><textarea wire:model="score" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                                @error('score1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                            </td>
                                            <td class="bg-gray-100"><textarea wire:model="comment" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                                @error('comment1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                            </td>
                                        </tr>
                                        @php
                                            $rowNumber++; // Increment the row number
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
