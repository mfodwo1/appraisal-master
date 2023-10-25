<div>
    <div class="container mx-auto p-4 my-6">
        <div class="w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
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
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Staff ID</th>
                                        <th>Gender</th>
                                        <th>Department</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($appraisees as $appraisee)
                                        <tr>
                                            <td>{{ $appraisee->first_name }}</td>
                                            <td>{{ $appraisee->surname }}</td>
                                            <td>{{ $appraisee->staff_id }}</td>
                                            <td>{{ $appraisee->gender }}</td>
                                            <td>{{ $appraisee->department->department_name }}</td>
                                            <td>
                                                <button wire:click="showAppraiseeDetails({{ $appraisee->id }})" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">View Detail</button>
                                            @if ($appraisee->appraisal_status === 1)
                                                    <button wire:click="markNotComplete({{ $appraisee->id }})" class="bg-green-700 mt-5 p-2 rounded-3xl text-white">Complete</button>
                                                @else
                                                    <button wire:click="markComplete({{ $appraisee->id }})" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Not Complete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @if ($showDetails)
                            @livewire('appraisee-details')
                            <button wire:click="closeDetails">Close</button>
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
