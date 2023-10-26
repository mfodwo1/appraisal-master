<div>
    <div class="container mx-auto p-4 my-6">
        <div class="w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                @if ($this->UserDetails)
                    <h1>Appraisee Details</h1>
                    <p>First Name: {{ $this->UserDetails->first_name }}</p>
                    <p>Surname: {{ $this->UserDetails->surname }}</p>
                    <!-- Add more details here -->
                @else
                    <p>No appraisee details found.</p>
                @endif
            </div>
            <hr>
            <div class="py-5">
                @if($this->TrainingRecords)
                    <h2 CLASS="text-center">TRAINING ATTENDED</h2>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left ">
                                <thead class="text-xs uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tranning Attended
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($this->TrainingRecords as $Training)
                                        <tr class="bg-white border-b hover:bg-blue-100">
                                            <td class="px-6 py-4">
                                                {{$Training->institution}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$Training->training_date}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                @endif
            </div>

            <div class="py-5">
                @if($this->PerfomancePlanRecords)
                    <h2 CLASS="text-center">Performance Planning </h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left ">
                            <thead class="text-xs uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Target
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Key Result Area
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Resource Required
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b hover:bg-blue-100">
                                <td class="px-6 py-4">
                                    @if($this->TargetRecords)
                                        @foreach($this->TargetRecords as $Target)
                                            <p class="py-0.5">{{$Target->target}}</p><br>
                                        @endforeach
                                    @endif
                                </td>

                                    <td class="px-6 py-4">
                                        {{$this->PerfomancePlanRecords->key_result_area}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$this->PerfomancePlanRecords->resource_required}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                @endif
            </div>

            <div class="py-5">
                @if($this->MidYearReviewRecords)
                    <h2 CLASS="text-center">Mid-Year Review</h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left ">
                            <thead class="text-xs uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Target
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Progress Review
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remarks
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b hover:bg-blue-100">
                                    <td class="px-6 py-4">
                                        @if($this->TargetRecords)
                                            @foreach($this->TargetRecords as $Target)
                                                <p class="py-0.5">{{$Target->target}}</p><br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$this->MidYearReviewRecords->targets_progress_review}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$this->MidYearReviewRecords->targets_remarks}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
