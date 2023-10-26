<div>
    <div class="container mx-auto p-4 my-6">
        <div class="w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                <h4 class="text-xl font-semibold">SECTION 4: End-of-Year Review Form</h4>
                <p class="text-sm">END-OF-YEAR REVIEW FORM</p>
                <form wire:submit.prevent="submitEndOfYearReview">
                    <div class="flex flex-col overflow-x-auto">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                @if (session()->has('message'))
                                    <div class="alert alert-success text-green-700 z-50">{{ session('message') }}</div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="alert alert-success text-green-700 z-50">{{ session('error') }}</div>
                                @endif

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
                                        @php $rowNumber = 1; @endphp

                                        @foreach ($targets as $key => $target)
                                            <tr>
                                                <td class="bg-gray-100 pl-3">{{ $key + 1 }}</td>
                                                <td class="bg-gray-100">
                                                    <textarea wire:model="targets.{{ $key }}.target" type="text" cols="50" rows="1" class="w-full p-2 " readonly></textarea>
                                                    @error("targets.{$key}.target") <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                </td>
                                                <td class="bg-gray-100">
                                                    <textarea wire:model="targets.{{ $key }}.performanceAssessment" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                                    @error("targets.{$key}.performanceAssessment") <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                </td>
                                                <td class="bg-gray-100">
                                                    <textarea  type="text" cols="50" rows="1" class="w-full p-2 " readonly>5</textarea>
                                                </td>
                                                <td class="bg-gray-100">
                                                    <textarea wire:model="targets.{{ $key }}.score" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                                    @error("targets.{$key}.score") <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                </td>
                                                <td class="bg-gray-100">
                                                    <textarea wire:model="targets.{{ $key }}.comment" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                                    @error("targets.{$key}.comment") <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
