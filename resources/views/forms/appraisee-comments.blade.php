<div>
    <div class="container mx-auto p-4 my-6 ">
        <div
            class=" w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35"
            style="background: #edf2f7;">
            <div class="py-5">
                <h2 class="text-2xl font-semibold">SECTION 9: Appraisee’s Comments</h2>
                <form>
                    <div class="mb-4">
                        <label for="appraiser-comments" class="block text-base font-medium">Appraisee’s Comments</label>
                        <textarea class="w-full p-2 border border-gray-300 rounded-lg" id="appraiser-comments"
                                  rows="4"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="signatureFile2" class="block text-base font-medium">APPRAISEE’S
                                SIGNATURE</label><br>
                            <input type="file" id="signatureFile2" accept="image/*" class="mt-2">
                            <img id="signaturePreview2" src="" alt="Signature Preview" class="max-w-xs mt-2 hidden">
                            <button id="removeSignature2" class="btn btn-primary mt-2 hidden">Remove Signature</button>
                            <br>
                            <label for="appraiserDate" class="block mt-2 text-right">Date:</label>
                            <input type="date" class="w-full p-2 border border-gray-300 rounded-lg" name="appraiserDate"
                                   id="appraiserDate" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
