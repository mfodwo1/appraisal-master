<div>
    <div class="container mx-auto p-4 my-6">
        <div class="w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                <form wire:submit.prevent="submitForm">
                    <div class="flex flex-col overflow-x-auto">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                @if (session()->has('message'))
                                    <div class="alert alert-success text-green-700 z-50">{{ session('message') }}</div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="alert alert-success text-red-500 z-50">{{ session('error') }}</div>
                                @endif

                                <div class="overflow-x-auto">
                                    <div class="container">
                                        <div class="overflow-x-auto">
                                            <table class="w-full table-auto border border-collapse">
                                                <thead class="">
                                                <tr>
                                                    <th class="py-2">A/. NONE-CORE COMPETENCIES</th>
                                                    <th class="py-2">(S) Score on Scale</th>
                                                    <th class="py-2">W x S</th>
                                                    <th class="py-2">COMMENTS</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(xi) Ability to Develop Staff.</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Able to develop others (subordinates) .</li>
                                                            <li>Able to provide guidance and support to staff for their development.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="developOther" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="developOther">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio" wire:model="provideGuidance" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="provideGuidance">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$developOtherWeight}}</span><br>
                                                        <span>{{$provideGuidanceWeight}}</span><br>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$developStaffTotal}}</span><br>
                                                        Average: <span>{{$developStaffAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(xii) Commitment to Own Personal Development and Training</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Eagerness for self development.</li>
                                                            <li>Inner drive to supplement training from organization.</li>

                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="selfDevelopment" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="selfDevelopment">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="supplementTraining" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="supplementTraining">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$selfDevelopmentWeight}}</span><br>
                                                        <span>{{$supplementTrainingWeight}}</span><br>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$DevelopmentAndTrainingTotal}}</span><br>
                                                        Average: <span>{{$DevelopmentAndTrainingAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(xiii) Delivering Results and Ensuring Customer Satisfaction</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Ensuring customer satisfaction </li>
                                                            <li>Ensuring the delivery of quality service and products</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="customerSatisfaction" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="customerSatisfaction">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="qualityService" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="qualityService">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$customerSatisfactionWeight}}</span><br>
                                                        <span>{{$qualityServiceWeight}}</span><br>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$deliveringResultTotal}}</span><br>
                                                        Average: <span>{{$deliveringResultAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(xiv) Following Instructions and Working Towards Organisational Goals:</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Keeping to laid -down regulations and procedures.</li>
                                                            <li>Willingness to act</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="regulation" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="regulation">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="act" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="act">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$regulationWeight}}</span><br>
                                                        <span>{{$actWeight}}</span><br>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$OrganisationalGoalsTotal}}</span><br>
                                                        Average: <span>{{$OrganisationalGoalsAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(xv) Respect and Commitment</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Respect for superiors, colleagues and customers.</li>
                                                            <li>Commitment to work and Organisational Development.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="respect" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="respect">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="commitmentToWork" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="commitmentToWork">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$respectWeight}}</span><br>
                                                        <span>{{$commitmentToWorkWeight}}</span><br>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$respectAndCommitmentTotal}}</span><br>
                                                        Average: <span>{{$respectAndCommitmentAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(xvi) Ability to Work Effectively in a Team</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Ability to function in a team.</li>
                                                            <li>Ability to work in a team.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="functionInTeam" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="functionInTeam">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div class="form-check">
                                                                    <input class="form-radio" type="radio"  wire:model="workInTeam" value="{{ $value }}" wire:change="calculateNoneCoreCompetencies">
                                                                    <label class="ml-2" for="workInTeam">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$functionInTeamWeight}}</span><br>
                                                        <span>{{$workInTeamWeight}}</span><br>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$WorkEffectivelyTotal}}</span><br>
                                                        Average: <span>{{$WorkEffectivelyAverage}}</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success text-green-700 z-50">{{ session('success') }}</div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-success text-red-500 z-50">{{ session('error') }}</div>
                    @endif

                    <h5><br>Average: <span>{{$averageOfaverages}}</span></h5>
                    <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
