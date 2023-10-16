<div>
    <div class="container mx-auto p-4 my-6 ">
        <div
            class=" w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35"
            style="background: #edf2f7;">
            <div class="py-5">
                <h4 class="text-xl font-semibold">SECTION 4: End-of-Year Review Form</h4>
                <p class="text-sm">END-OF-YEAR REVIEW FORM</p>
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
                                        <th class="px-4 py-2 ">SCORE</th>
                                        <th class="px-4 py-2">COMMENTS</th>
                                    </tr>
                                    </thead>
                                    <tbody id="dynamic-table-body">
                                    <tr>
                                        <td class="bg-gray-100 pl-3">1</td>
                                        <td class="bg-gray-100"><textarea wire:model="target1" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('target1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="performanceAssessment1" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('performanceAssessment1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100" ><textarea type="text" cols="20" rows="1" class="w-full p-2 " readonly>5</textarea>
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="score1" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('score1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="comment1" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('comment1') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100 pl-3">2</td>
                                        <td class="bg-gray-100"><textarea wire:model="target2" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('target2') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="performanceAssessment2" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('performanceAssessment2') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100" ><textarea type="text" cols="20" rows="1" class="w-full p-2 " readonly>5</textarea>
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="score2" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('score2') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="comment2" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('comment2') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100 pl-3">3</td>
                                        <td class="bg-gray-100"><textarea wire:model="target3" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('target3') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="performanceAssessment3" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('performanceAssessment3') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100" ><textarea type="text" cols="20" rows="1" class="w-full p-2 " readonly>5</textarea>
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="score3" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('score3') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="comment3" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('comment3') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100 pl-3">4</td>
                                        <td class="bg-gray-100"><textarea wire:model="target4" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('target4') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="performanceAssessment4" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('performanceAssessment4') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea type="text" cols="20" rows="1" class="w-full p-2 " readonly>5</textarea>
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="score4" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('score4') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>

                                        <td class="bg-gray-100"><textarea wire:model="comment4" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('comment4') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100 pl-3">5</td>
                                        <td class="bg-gray-100"><textarea wire:model="target5" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('target5') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="performanceAssessment5" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('performanceAssessment5') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea  type="text" cols="20" rows="1" class="w-full p-2 " readonly>5</textarea>
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="score5" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('score5') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="bg-gray-100"><textarea wire:model="comment5" type="text" cols="50" rows="1" class="w-full p-2 "></textarea>
                                            @error('comment5') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="px-4 py-2 font-semibold">TOTAL (Q)</td>
                                        <td id="totalWeightOfTarget" class="px-4 py-2">0</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="px-4 py-2 font-semibold">AVERAGE (A)</td>
                                        <td id="averageWeightOfTarget" class="px-4 py-2">0</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="px-4 py-2 font-semibold">(M)</td>
                                        <td id="weightedAverage" class="px-4 py-2">0</td>
                                        <td></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{--                <!-- Signature -->--}}
                {{--                <hr class="my-5">--}}
                {{--                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">--}}
                {{--                    <div>--}}
                {{--                        <label for="signatureFile" class="block font-semibold">APPRAISEE’S SIGNATURE</label><br>--}}
                {{--                        <input type="file" id="signatureFile" accept="image/*" class="mt-2">--}}
                {{--                        <img id="signaturePreview" src="" alt="Signature Preview" class="max-w-xs mt-2 hidden">--}}
                {{--                        <button id="removeSignature" class="btn btn-primary mt-2 hidden">Remove Signature</button>--}}
                {{--                        <br>--}}
                {{--                        <label for="appraiseeDate" class="block mt-2">Date:</label>--}}
                {{--                        <input type="date" class="w-full p-2 border border-gray-300 rounded" name="appraiseeDate"--}}
                {{--                               id="appraiseeDate" required>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <label for="signatureFile2" class="block font-semibold">APPRAISER’S SIGNATURE</label><br>--}}
                {{--                        <input type="file" id="signatureFile2" accept="image/*" class="mt-2">--}}
                {{--                        <img id="signaturePreview2" src="" alt="Signature Preview" class="max-w-xs mt-2 hidden">--}}
                {{--                        <button id="removeSignature2" class="btn btn-primary mt-2 hidden">Remove Signature</button>--}}
                {{--                        <br>--}}
                {{--                        <label for="appraiserDate" class="block mt-2">Date:</label>--}}
                {{--                        <input type="date" class="w-full p-2 border border-gray-300 rounded" name="appraiserDate"--}}
                {{--                               id="appraiserDate" required>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
</div>
