<div>
    <div class="container mx-auto p-4 my-6 ">
        <div
            class=" w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35"
            style="background: #edf2f7;">
            <div class="py-5">
                <div class="text-center">
                    <h4 class="text-lg font-semibold">SECTION 3: Mid-Year Review Form</h4>
                    <p class="text-sm">This is to be completed in July by the Appraiser and Appraisee</p>
                    <p class="text-sm">Progress has been discussed and Agreements have been reached as detailed
                        below.</p>
                    <h5 class="text-lg font-semibold">MID-YEAR REVIEW</h5>
                </div>

                <!-- Mid-Year Review Table -->
                <div class="flex flex-col overflow-x-auto">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="w-full bg-gray-200">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-2">NO.</th>
                                        <th class="px-4 py-2">TARGET</th>
                                        <th class="px-4 py-2">PROGRESS REVIEW</th>
                                        <th class="px-4 py-2">REMARKS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2" name="kra1"
                                                                          required></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2" name="targets1"
                                                                          required></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="resources1" required></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2" name="remark1"
                                                                          required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="kra2"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="targets2"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="resources2"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="remark2"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="kra3"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="targets3"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="resources3"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="remark3"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="kra4"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="targets4"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="resources4"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="remark4"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="kra5"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="targets5"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="resources5"></textarea></td>
                                        <td class="bg-gray-100"><textarea type="text" class="w-full p-2"
                                                                          name="remark5"></textarea></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Row button -->
                <button type="button" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white" id="addRowBtn2">Save</button>
                <hr class="my-4">

                <!-- Competency Table -->
                <div class="flex flex-col overflow-x-auto">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="w-full bg-gray-200">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-2">NO.</th>
                                        <th class="px-4 py-2">COMPETENCY</th>
                                        <th class="px-4 py-2">PROGRESS REVIEW</th>
                                        <th class="px-4 py-2">REMARKS</th>
                                    </tr>
                                    </thead>
                                    <tbody id="competence">
                                    <tr>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="kra1"
                                                                       required></td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="targets1"
                                                                       required></td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="resources1"
                                                                       required></td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="remark1"
                                                                       required></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="kra2"></td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="targets2">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="resources2">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="remark2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="kra3"></td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="targets3">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="resources3">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="remark3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="kra4"></td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="targets4">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="resources4">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="remark4">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="kra5"></td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="targets5">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="resources5">
                                        </td>
                                        <td class="bg-gray-100"><input type="text" class="w-full p-2" name="remark5">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Row button -->
                <button type="button" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white" id="addRowBtn2">Save</button>
                <hr class="my-4">

                <!-- Signatures -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="signatureFile" class="block font-semibold">APPRAISEE’S SIGNATURE</label>
                        <input type="file" id="signatureFile" accept="image/*" class="mt-2">
                        <img id="signaturePreview" src="" alt="Signature Preview" class="max-w-xs mt-2 hidden">
                        <button id="removeSignature" class="btn btn-primary mt-2 hidden">Remove Signature</button>
                        <label for="appraiseeDate" class="block mt-2">Date:</label>
                        <input type="date" class="w-full p-2" name="appraiseeDate" id="appraiseeDate" required>
                    </div>
                    <div>
                        <label for="signatureFile2" class="block font-semibold">APPRAISER’S SIGNATURE</label>
                        <input type="file" id="signatureFile2" accept="image/*" class="mt-2">
                        <img id="signaturePreview2" src="" alt="Signature Preview" class="max-w-xs mt-2 hidden">
                        <button id="removeSignature2" class="btn btn-primary mt-2 hidden">Remove Signature</button>
                        <label for="appraiserDate" class="block mt-2">Date:</label>
                        <input type="date" class="w-full p-2" name="appraiserDate" id="appraiserDate" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
