<div>
    <div class="md:hidden text-white ms-4">
        <i class="fas fa-arrow-left fixed bg-blue-500"><span class=" p-1 bg-blue-500 capitalize">Press Here</span></i>
    </div>
    <div class="container mx-auto p-4 my-6 ">

        {{--            Persoal detail forms start here--}}
        <div
            class=" w-full bg-gray-50 min-h-screen transition-all overflow-hidden shadow-xl md:w-[calc(100%-256px)] md:ml-64 sm:rounded-lg max-w-7xl mx-auto sm:px-6 lg:px-8 sm:ms-35"
            style="background: #edf2f7;">

            <div class="text-center">
                <h2 class="text-2xl font-bold mb-2 mt-5">PUBLIC SERVICES PERFORMANCE MANAGEMENT</h2>
                <h3 class="text-lg font-semibold mb-2">(STAFF PERFORMANCE PLANNING, REVIEW AND APPRAISAL FORM)</h3>
                <h3 class="text-lg font-semibold mb-2">STRICTLY CONFIDENTIAL</h3>
            </div>
            <form wire:submit.prevent="submit" class="mt-4">
                <!-- SECTION 1 - A: Appraisee Personal Information -->
                <h4 class="text-xl font-semibold mb-2">SECTION 1 - A: Appraisee Personal Information</h4>
                <div class="space-y-2">
                    <label class="block">Title:</label>
                    <div class="space-x-2">
                        <label class="inline-flex items-center">
                            <input wire:model="title" type="radio" class="form-radio" value="Mr.">
                            <span class="ml-2">Mr.</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input wire:model="title" type="radio" class="form-radio" value="Mrs.">
                            <span class="ml-2">Mrs.</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input wire:model="title" type="radio" class="form-radio" value="Ms.">
                            <span class="ml-2">Ms.</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input wire:model="title" type="radio" class="form-radio" value="Other" >
                            <span class="ml-2">Other (Pls. specify):</span>
                        </label>
                        <input wire:model="title" type="text" class="w-16 h-6">

                    </div>

                    @error('title') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <div class="form-group mt-5">
                        <label class="block">Surname:
                            <input type="text" class="form-input w-full" wire:model="surname">
                            @error('surname') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                    <div class="form-group mt-5">
                        <label class="block">First Name:
                            <input type="text" class="form-input w-full" wire:model="firstName">
                            @error('firstName') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                    <div class="form-group mt-5">
                        <label class="block">Other Name(s):
                            <input type="text" class="form-input w-full" wire:model="otherNames">
                            @error('otherNames') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                        </label>
                    </div>
                </div>
                <div class="space-y-2 mt-5">
                    <label class="block">Gender:</label>
                    <div class="space-x-2 ">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" wire:model="gender" value="Male">
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" wire:model="gender" value="Female">
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                    @error('gender') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mt-5">
                    <label class="block">Grade/Salary (p.a):
                        <input type="text" class="form-input w-full" wire:model="gradeSalary">
                        @error('gradeSalary') <span class="error text-red-600 block">{{ $message }}</span> @enderror
                    </label>
                </div>
                <div class="form-group mt-5">
                    <label class="block">Present Job Title/Position:
                        <input type="text" class="form-input  w-full" wire:model="jobTitlePosition">
                        @error('jobTitlePosition') <span
                            class="error text-red-600 block">{{ $message }}</span> @enderror
                    </label>
                </div>
                <div class="form-group mt-5">
                    <label class="block">Date of Appointment to Present Grade (dd/mm/yyyy):
                        <input type="date" class="form-input" wire:model="dateOfAppointment">
                        @error('dateOfAppointment') <span
                            class="error text-red-600 block">{{ $message }}</span> @enderror
                    </label>
                </div>
                <div class="form-group mt5">
                    @if ($signature)
                        <img src="{{ $signature->temporaryUrl() }}" alt="Signature Preview" class="max-w-xs mt-2">
                    @elseif ($userSignature)
                        <img src="{{ 'storage/'.$userSignature }}" alt="User's Signature" class="max-w-xs mt-2">
                    @endif
                    {{--                    show message while loading signature--}}
                    <div wire:loading wire:target="signature">
                        <span class="text-green-500">Loading Signature ...</span>
                    </div>

                    <label for="signature">Signature<br>
                        <input wire:model="signature" accept="image/png, image/jpeg, image/jpg" type="file" id="signature" class="rounded-3xl bg-blue-100 my-3">
                        @error('signature')
                            <span class="text-red-600"> {{ $message }}</span>
                        @enderror
                    </label>

                </div>
                <button type="submit" class="bg-blue-500 text-white rounded-3xl p-2 mb-6 mt-4">Update Profile</button>
            </form>
            {{--            show messages base on the status of the form--}}
            @if (session()->has('message'))
                <div class="alert alert-success text-green-700 inline">
                    {{ session('message') }}
                </div>
            @endif

        </div>
    </div>

</div>


