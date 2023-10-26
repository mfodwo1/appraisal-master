<div>
    <div class="container mx-auto p-4 my-6">
        <div class="w-full bg-gray-50 transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35" style="background: #edf2f7;">
            <div class="py-5">
                <h4 class="text-xl font-semibold">SECTION 5: Annual Appraisal</h4>
                <p class="text-sm">Assessment of Core Competencies</p>
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
                                                    <th class="py-2">A/. CORE COMPETENCIES</th>
                                                    <th class="py-2">(S) Score on Scale</th>
                                                    <th class="py-2">W x S</th>
                                                    <th class="py-2">COMMENTS</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(i) Organisation and Management:</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Ability to plan, organise and manage workload.</li>
                                                            <li>Ability to work systematically and maintain quality.</li>
                                                            <li>Ability to manage others to achieve shared goals.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="plan" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="plan">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('plan') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio" wire:model="work" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="work">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('work') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio" wire:model="manage" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="manage">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('manage') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$plan_weight}}</span><br>
                                                        <span>{{$work_weight}}</span><br>
                                                        <span>{{$manage_weight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$organization_management_total}}</span><br>
                                                        Average: <span>{{$organization_management_average}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(ii) Innovation and Strategic Thinking:</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Support for organisational change</li>
                                                            <li>Ability to think broadly and demonstrate creativity.</li>
                                                            <li>Originality in thinking</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="change" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="change">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('change') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="creativity" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="creativity">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('creativity') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="thinking" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="thinking">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('thinking') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$change_weight}}</span><br>
                                                        <span>{{$creativity_weight}}</span><br>
                                                        <span>{{$thinking_weight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$innovation_total}}</span><br>
                                                        Average: <span>{{$innovation_average}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(iii) Leadership and Decision Making</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Ability to initiate action and provide direction to others</li>
                                                            <li>Accept responsibility and decision-making.</li>
                                                            <li>Ability to exercise good judgment.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="direction" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="direction">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('direction') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="decision_making" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="decision_making">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('decision_making') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="judgment" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="judgment">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('judgment') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$direction_weight}}</span><br>
                                                        <span>{{$decision_making_weight}}</span><br>
                                                        <span>{{$judgment_weight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$decision_making_total}}</span><br>
                                                        Average: <span>{{$decision_making_average}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(iv) Developing and Improving</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Commitment to organization development</li>
                                                            <li>ACommitment to customer satisfaction</li>
                                                            <li>Commitment to personnel development</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="organizationDevelopment" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="organizationDevelopment">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('organizationDevelopment') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="satisfaction" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="satisfaction">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('satisfaction') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="personnelDevelopment" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="personnelDevelopment">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('personnelDevelopment') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$organizationDevelopmentWeight}}</span><br>
                                                        <span>{{$satisfactionWeight}}</span><br>
                                                        <span>{{$personnelDevelopmentWeight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$developingTotal}}</span><br>
                                                        Average: <span>{{$developingAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(v) Communication (oral, written & electronic)</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Ability to communicate decisions clearly and fluently</li>
                                                            <li>Ability to negotiate and manage conflict effectively.</li>
                                                            <li>Ability to relate and network across different levels and departments</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="communicateDecision" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="communicateDecision">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('communicateDecision') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="negotiate" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="negotiate">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('negotiate') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="network" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="network">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('network') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$communicateDecisionWeight}}</span><br>
                                                        <span>{{$negotiateWeight}}</span><br>
                                                        <span>{{$networkWeight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$communicationTotal}}</span><br>
                                                        Average: <span>{{$communication_average}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(vi) Job Knowledge and Technical Skills</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Demonstration of correct mental, physical and manual skills.</li>
                                                            <li>Demonstration of cross-functional awareness.</li>
                                                            <li>Building, applying and sharing of necessary expertise and technology.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="manualSkill" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="manualSkill">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('manualSkill') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="crossFunctionalAwareness" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="crossFunctionalAwareness">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('crossFunctionalAwareness') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="expertise" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="expertise">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('expertise') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$manualSkillWeight}}</span><br>
                                                        <span>{{$crossFunctionalAwarenessWeight}}</span><br>
                                                        <span>{{$expertiseWeight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$technicalSkillsTotal}}</span><br>
                                                        Average: <span>{{$technicalSkillsAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(vii) Supporting and Cooperating</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Ability to work effectively with teams, clients and staff.</li>
                                                            <li>Ability to show support to others.</li>
                                                            <li>Ability to adhere to organisation’s principles, ethics and values.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="teamWork" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="teamWork">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('teamWork') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="showSupport" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="showSupport">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('showSupport') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="adherePrinciple" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="adherePrinciple">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('adherePrinciple') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$teamWorkWeight}}</span><br>
                                                        <span>{{$showSupportWeight}}</span><br>
                                                        <span>{{$adherePrincipleWeight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$cooperatingTotal}}</span><br>
                                                        Average: <span>{{$cooperatingAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(viii) Maximising and maintaining Productivity</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Ability to motivate and inspire others.</li>
                                                            <li>Ability to accept challenges and execute them with confidence.</li>
                                                            <li>Ability to manage pressure and setbacks</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="inspireOther" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="inspireOther">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @error('inspireOther') <span class="error text-red-600 block">{{ $message }}</span> @enderror

                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="confidence" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="confidence">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="managePressure" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="managePressure">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$inspireOtherWeight}}</span><br>
                                                        <span>{{$confidenceWeight}}</span><br>
                                                        <span>{{$managePressureWeight}}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$maintainingProductivityTotal}}</span><br>
                                                        Average: <span>{{$maintainingProductivityAverage}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        <h5 class="font-semibold">(ix) Developing / Managing budgets and saving cost:</h5>
                                                        <ul class="list-disc list-inside">
                                                            <li>Firm awareness of financial issues and accountabilities.</li>
                                                            <li>Understanding of business processes and customer priorities.</li>
                                                            <li>Executing result-based actions.</li>
                                                        </ul>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="accountability" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="accountability">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="businessProcesses" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="businessProcesses">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex space-x-1">
                                                            @foreach(range(1, 5) as $value)
                                                                <div>
                                                                    <input  type="radio"  wire:model="resultBasedAction" value="{{ $value }}" wire:change="calculateCoreCompetencies">
                                                                    <label class="ml-2" for="resultBasedAction">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        <span>{{$accountabilityWeight}}</span><br>
                                                        <span>{{$businessProcessesWeight}}</span><br>
                                                        <span>{{$resultBasedActionWeight}}</span><br>
                                                    </td>
                                                    <td class="py-2">
                                                        <br>
                                                        Total: <span>{{$savingcostTotal}}</span><br>
                                                        Average: <span>{{$savingcostAverage}}</span>
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
                        <div class="alert alert-success text-green-700 z-50">{{ session('error') }}</div>
                    @endif

                    <h5><br>Average: <span>{{$averageOfaverages}}</span></h5>
                    <button type="submit" class="bg-blue-500 mt-5 p-2 rounded-3xl text-white">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
