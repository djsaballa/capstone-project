@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Add Client Profile
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div
            class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">
            <div class="intr o-x lg:text-center flex items-center lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_privacy', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"><i
                            data-lucide="shield"></i></button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Privacy Notice
                    </div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_1', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">1</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Personal
                        Information</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_2', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">2</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Family
                        Composition</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_3', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">3</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Medical
                        Conditon</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_4', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">4</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Contact
                        Persons</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_5', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">5</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup
                        Background Information</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary">6</button>
                <div class="lg:w-32 font-medium text-base mb-5 lg:mt-3 ml-3 lg:mx-auto">Review</div>
            </div>
        </div>
        <div class="intro-y box lg:mt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('status'))
                <div class="alert alert-success text-center text-white">
                    <p>{{ Session::get('status') }}</p>
                </div>
            @endif
            <div class="mt-5 p-5">
                <h2 class="font-medium text-base mb-5 mr-auto">
                    Personal Information
                </h2>
            </div>
            <div class="pl-5 pr-5 ">
                <form method="POST" action="{{ route('add_client_profile_6_save') }}" enctype="multipart/form-data">
                    @csrf
                    @php
                        use App\Models\TempClientProfile;
                        
                        $tempCP = TempClientProfile::all();
                        $old_input = $tempCP->where('user_encoder_id', $user_info->id)->last();
                    @endphp
                    <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                    <div class="flex xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label">First Name</label>
                                        <input id="first-name" name="firstName" type="text" class="form-control"
                                            placeholder="First Name"
                                            value="{{ old('firstName', $old_input->first_name ?? null) }}">
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label">Middle Name</label>
                                        <input iid="middle-name" name="middleName" type="text" class="form-control"
                                            placeholder="Middle Name"
                                            value="{{ old('middleName', $old_input->middle_name ?? null) }}">
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label">Last Name</label>
                                        <input id="last-name" name="lastName" type="text" class="form-control"
                                            placeholder="Last Name"
                                            value="{{ old('lastName', $old_input->last_name ?? null) }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="startDate">Birthdate</label>
                                        <input id="birth-date" name="birthDate"
                                            value="{{ old('birthDate', $old_input->birth_date ?? null) }}"
                                            class="form-control" type="date" />
                                        <span id="startDateSelected"></span>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                        <input id="contact-number" name="contactNumber" type="text" class="form-control"
                                            placeholder="09123456789"
                                            value="{{ old('contactNumber', $old_input->contact_number ?? null) }}">
                                    </div>
                                </div>
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label"
                                            id="update-profile-form-3-ts-label">Gender</label>
                                        <select id="gender" name="gender" data-search="true"
                                            class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                            @if ($old_input)
                                                @if ($old_input->gender == 'Male')
                                                    <option value="{{ $old_input->gender }}">{{ $old_input->gender }}
                                                    </option>
                                                    <option value="Female">Female</option>
                                                @else
                                                    <option value="{{ $old_input->gender }}" selected="true">
                                                        {{ $old_input->gender }}</option>
                                                    <option value="Male" selected="true">Male</option>
                                                @endif
                                            @else
                                                <option value="Male" selected="true">Male</option>
                                                <option value="Female">Female</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-4" class="form-label">Height (cm)</label>
                                        <input id="height" name="height" type="number" class="form-control"
                                            placeholder="Height" value="{{ old('height', $old_input->height ?? null) }}">
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-4" class="form-label">Weight (kg)</label>
                                        <input id="weight" name="weight" type="number" class="form-control"
                                            placeholder="Weight" value="{{ old('weight', $old_input->weight ?? null) }}">
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-4" class="form-label">Age</label>
                                        <input id="age" name="age" type="number" class="form-control"
                                            placeholder="Age" value="{{ old('age', $old_input->age ?? null) }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-3-tomselected" class="form-label"
                                            id="update-profile-form-3-ts-label">Occupation</label>
                                        <input id="occupation" name="occupation" type="text" class="form-control"
                                            placeholder="Occupation"
                                            value="{{ old('occupation', $old_input->occupation ?? null) }}">
                                    </div>
                                </div>
                                <div class="col-span-6 2xl:col-span-3">
                                    @php
                                        use App\Models\District;
                                        use App\Models\Locale;
                                        
                                        $districts = District::all();
                                        $districts_json = $districts->toJson();
                                        
                                        $locales = Locale::all();
                                        $locales_json = $locales->toJson();
                                    @endphp
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label"
                                            id="update-profile-form-3-ts-label">Division</label>
                                        <select id="division-filter-3" name="division" data-search="true"
                                            class="w-full form-control" tabindex="-1"
                                            onchange="loadDistricts( {{ $districts_json }} )">
                                            @if ($old_input->division)
                                                @php
                                                    $old_input_division = $divisions->find($old_input->division);
                                                @endphp
                                                <option value="{{ $old_input_division->id }}" selected="true">
                                                    {{ $old_input_division->division }} </option>
                                            @else
                                                @if (old('division'))
                                                    @php
                                                        $old_division = $divisions->find(old('division'));
                                                    @endphp
                                                    <option value="{{ $old_division->id }}" selected="true">
                                                        {{ $old_division->division }} </option>
                                                @else
                                                    <option value="Select Division" selected="true"> Select
                                                        Division</option>
                                                @endif
                                            @endif
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">
                                                    {{ $division->division }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label"
                                            id="update-profile-form-3-ts-label">District</label>
                                            @if ($old_input)
                                                @php
                                                    $old_input_district = $districts->find( $old_input->district );
                                                    $old_input_list_districts = $districts->where('division_id', $old_input_division->division_id);
                                                @endphp
                                                <select id="district-filter-3" name="district" data-search="true"
                                                    class="w-full form-control" tabindex="-1" onchange="loadLocales3( {{ $locales_json }} )">
                                                    <option value="{{ $old_input_district->id }}" selected="true"> {{ $old_input_district->district }} </option>
                                                @foreach ($old_input_list_districts as $old_input_list_district)
                                                    <option value="{{ $old_input_list_district->id }}" > {{ $old_input_list_district->district }} </option>
                                                @endforeach
                                            @else
                                                @if ( old('district') )
                                                    @php
                                                        $old_district = $districts->find( old('district') );
                                                        $old_district_list_districts = $districts->where('division_id', $old_district->division_id);
                                                    @endphp
                                                    <select id="district-filter-3" name="district" data-search="true"
                                                        class="w-full form-control" tabindex="-1" onchange="loadLocales3( {{ $locales_json }} )">
                                                        <option value="{{ $old_district->id }}" selected="true"> {{ $old_district->district }} </option>
                                                    @foreach ($old_district_list_districts as $old_district_list_district)
                                                        <option value="{{ $old_district_list_district->id }}" > {{ $old_district_list_district->district }} </option>
                                                    @endforeach
                                                @else
                                                <select id="district-filter-3" name="district" data-search="true"
                                                    class="w-full form-control" tabindex="-1" onchange="loadLocales3( {{ $locales_json }} )" disabled>
                                                    <option value="Select District" selected="true" disabled> Select District</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label for="update-profile-form-3-tomselected" class="form-label"
                                            id="update-profile-form-3-ts-label">Locale</label>
                                            @if ($old_input)
                                                @php
                                                    $old_input_locale = $locales->find( $old_input->locale );
                                                    $old_input_list_locales = $locales->where('district_id', $old_input_locale->district_id);
                                                @endphp
                                                <select id="locale-filter-3" name="locale" data-search="true"
                                                    class="w-full form-control" tabindex="-1">
                                                    <option value="{{ $old_input_locale->id }}" selected="true"> {{ $old_input_locale->locale }} </option>
                                                @foreach ($old_input_list_districts as $old_input_list_district)
                                                    <option value="{{ $old_input_list_district->id }}" > {{ $old_input_list_district->locale }} </option>
                                                @endforeach
                                            @else
                                                @if ( old('locale') )
                                                    @php
                                                        $old_locale = $locales->find( old('locale') );
                                                        $old_list_locales = $locales->where('district_id', $old_locale->district_id);
                                                    @endphp
                                                    <select id="locale-filter-3" name="locale" data-search="true"
                                                        class="w-full form-control" tabindex="-1">
                                                        <option value="{{ $old_locale->id }}" selected="true"> {{ $old_locale->locale }} </option>
                                                    @foreach ($old_list_locales as $old_list_locale)
                                                        <option value="{{ $old_list_locale->id }}" > {{ $old_list_locale->locale }} </option>
                                                    @endforeach
                                                @else
                                                <select id="locale-filter-3" name="locale" data-search="true"
                                                    class="w-full form-control" tabindex="-1" disabled>
                                                    <option value="Select Locale" selected="true" disabled> Select Locale</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="startDate">Baptism Date</label>
                                        <input id="baptism-date" name="baptismDate"
                                            value="{{ old('baptismDate', $old_input->baptism_date ?? null) }}"
                                            class="form-control" type="date" />
                                        <span id="startDateSelected"></span>
                                    </div>
                                </div>
                                <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                    <div
                                        class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if ($old_input->picture)
                                                @php
                                                    $picture = $old_input->picture;
                                                @endphp
                                                <img class="rounded-md" alt="Client Image" id="placeholder"
                                                    src="{{ asset('storage/' . $picture) }}">
                                            @else
                                                <img class="rounded-md" alt="Client Image" id="placeholder"
                                                    src="{{ asset('dist/images/profile-1.jpg') }}">
                                            @endif
                                            <img id="preview" src="#" alt="Client Image" class="rounded-md"
                                                style="display:none;">
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                            <input type="file" name="picture"
                                                class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="previewImage(event)">
                                            <input type="hidden" name="pictureBackup"
                                                value="{{ $old_input ? $old_input->picture : null }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="update-profile-form-5" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control"
                                        placeholder="Street Address, Barangay, City, Province, Zip Code">{{ old('address', $old_input->address ?? null) }}</textarea>
                                </div>
                            </div>

                            {{-- Step 2 --}}
                            @php
                                $family_comps = session()->get('family_comp');
                            @endphp
                            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="font-medium text-base mb-5">Family Composition</div>
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>Name</th>
                                        <th>Relationship</th>
                                        <th>Educational Attainment</th>
                                        <th>Occupation</th>
                                        <th>Contact Number</th>
                                    </tr>
                                    @foreach ($family_comps as $index => $family_comp)
                                    <tr>
                                        <td><input type="text" name="famComp[{{ $index }}][name]" placeholder="Name"
                                                class="form-control" value="{{ $family_comp['name'] }}"/>
                                        </td>
                                        <td>
                                            <select id="relationship" name="famComp[{{ $index }}][relationship]" data-search="true"
                                                class="w-full form-control" tabindex="-1"
                                                onchange="relationshipOther(event)">
                                                <option value="{{ $family_comp['relationship'] }}" selected="true">
                                                    {{ $family_comp['educational'] }}
                                                </option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </td>
                                        <td><select id="update-profile-form-3" name="famComp[{{ $index }}][educational]"
                                                data-search="true" class="w-full form-control" tabindex="-1">
                                                <option value="{{ $family_comp['educational'] }}" selected="true">
                                                    {{ $family_comp['educational'] }}
                                                </option>
                                                <option value="College Graduate">College Graduate</option>
                                                <option value="High School Graduate">High School Graduate</option>
                                                <option value="Elementary Graduate">Elementary Graduate</option>
                                            </select>
                                        </td>
                                        <td><input id="input-wizard-5" name="famComp[{{ $index }}][occupation]" type="text"
                                                class="form-control" placeholder="Occupation" value="{{ $family_comp['occupation'] }}"></td>
                                        <td><input id="input-wizard-5" name="famComp[{{ $index }}][contact]" type="text"
                                                class="form-control" placeholder="09123456789" value="{{ $family_comp['contact'] }}"></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                            {{-- Step 3 --}}
                            @php
                                $medical_cons = session()->get('medical_con');
                            @endphp
                            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="font-medium text-base mb-5 ">Medical Condition</div>
                                <table class="table table-bordered" id="dynamicAddRemoveMedCon">
                                    <tr>
                                        <th>Illness or Disease</th>
                                        <th>Since When</th>
                                        <th>Medicine or Supplements</th>
                                        <th>Dosage</th>
                                        <th>Frequency</th>
                                        <th>Doctor</th>
                                        <th>Hospital</th>
                                    </tr>
                                    @foreach ($medical_cons as $index => $medical_con)
                                    @php
                                        $disease_info = $diseases->find($medical_con['disease']);
                                    @endphp
                                    <tr>
                                        <td><select id="disease" name="medicalCondition[{{ $index }}][disease]" data-search="true"
                                                class="w-full form-control" tabindex="-1">
                                                <option value="{{ $medical_con['disease'] }}" selected="true">
                                                    {{ $disease_info->disease }}
                                                </option>
                                                @foreach ($diseases as $disease)
                                                    <option value="{{ $disease->id }}">{{ $disease->disease }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="date" name="medicalCondition[{{ $index }}][when]"class="form-control" value="{{ $medical_con['when'] }}"/>
                                        </td>
                                        <td><input type="text" name="medicalCondition[{{ $index }}][medicine]"
                                                placeholder="Medicine/Supplement Name" class="form-control" value="{{ $medical_con['medicine'] }}"/>
                                        </td>
                                        <td><input type="text" name="medicalCondition[{{ $index }}][dosage]" placeholder="Dosage"
                                                class="form-control" value="{{ $medical_con['dosage'] }}"/>
                                        </td>
                                        <td><input id="input-wizard-5" name="medicalCondition[{{ $index }}][frequency]"
                                                type="text" class="form-control" placeholder="Frequency" value="{{ $medical_con['frequency'] }}">
                                        </td>
                                        <td><input type="text" name="medicalCondition[{{ $index }}][doctor]" placeholder="Doctor"
                                                class="form-control" value="{{ $medical_con['doctor'] }}"/>
                                        </td>
                                        <td><input type="text" name="medicalCondition[{{ $index }}][hospital]"
                                                placeholder="Hospital" class="form-control" value="{{ $medical_con['hospital'] }}"/>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                                @php
                                    $medical_ops = session()->get('medical_op');
                                @endphp
                                <div class="mt-10 font-medium text-base mb-5">Operations</div>
                                <table class="table table-bordered" id="dynamicAddRemoveOperation">
                                    <tr>
                                        <th>Operation</th>
                                        <th>Date</th>
                                    </tr>
                                    @foreach ($medical_ops as $index => $medical_op)
                                    <tr>
                                        <td><input type="text" name="medicalOperation[{{ $index }}][operation]"
                                                placeholder="Operation" class="form-control" value="{{ $medical_op['operation'] }}">
                                        </td>
                                        <td><input type="date" name="medicalOperation[{{ $index }}][date]"
                                                class="form-control" value="{{ $medical_op['date'] }}"/>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                                <div class="flex flex-col-reverse xl:flex-row flex-col">
                                    <div class="flex-1 mt-6 xl:mt-0">
                                        <div class="grid grid-cols-12 gap-x-5">
                                            <div class="col-span-6 2xl:col-span-3">
                                                <div class="mt-10 font-medium text-base mb-5">
                                                    <label for="update-profile-form-1" class="form-label">Do you have
                                                        a Phil-health Card?</label>
                                                    <select id="philhealth" name="philhealth" data-search="true"
                                                        class="w-full form-control" tabindex="-1">
                                                        @if ($old_input->philhealth_member)
                                                            <option value="{{ $old_input->philhealth_member }}" selected>{{ $old_input->philhealth_member }}</option>
                                                        @endif
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-span-6 2xl:col-span-3">
                                                <div class="mt-10 font-medium text-base mb-5">
                                                    <label for="update-profile-form-1" class="form-label">Do you have
                                                        other health cards?</label>
                                                    <input id="health-card" name="healthCard" type="text"
                                                        class="form-control"
                                                        placeholder=" If yes, please specify. If no, write 'No'"
                                                        value="{{ old('healthCard', $old_input->health_card ?? null) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Step 4 --}}
                            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="mt-5">
                                    <div class="font-medium text-base mb-5">Contact Persons</div>
                                    <table class="table table-bordered" id="dynamicAddRemoveOperation">
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Contact Number</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="contact-person1" name="contactPerson1" type="text"
                                                    class="form-control" placeholder="Name"
                                                    value="{{ old('contactPerson1', $old_input->contact_person1_name ?? null) }}">
                                            </td>
                                            <td>
                                                <input id="contact-person1-number" name="contactPerson1Number"
                                                    type="text" class="form-control" placeholder="09123456789"
                                                    value="{{ old('contactPerson2', $old_input->contact_person2_contact_number ?? null) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="contact-person2" name="contactPerson2" type="text"
                                                    class="form-control" placeholder="Name"
                                                    value="{{ old('contactPerson2', $old_input->contact_person2_name ?? null) }}">
                                            </td>
                                            <td>
                                                <input id="contact-person2-number" name="contactPerson2Number"
                                                    type="text" class="form-control" placeholder="09223456789"
                                                    value="{{ old('contactPerson2', $old_input->contact_person2_contact_number ?? null) }}">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            {{-- Step 5 --}}
                            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="mt-5">
                                    <label for="update-profile-form-5"
                                        class="font-medium text-base mb-5 form-label">Background
                                        Information (Kalagayan ng Pasyente, Pamilya, Finansya, Emosyonal, Physical)</label>
                                    <textarea id="background-info" name="backgroundInfo" class="form-control" placeholder="Input text here">{{ old('backgroundInfo', $old_input->background_info ?? null) }}</textarea>
                                </div>
                                <label for="update-profile-form-5" class="font-medium form-label m-3 mt-2">File Uploaded:</label>
                                @if ( !empty($old_input->background_info_attachment) )
                                    <input id="background-info-attachment" name="backgroundInfoAttachments" value="{{ $old_input->background_info_attachment }}" type="hidden"/>
                                    <a href="{{ asset('storage/'.$old_input->background_info_attachment) }}" target="_blank" class="btn btn-primary mt-2">
                                        View Attachment
                                    </a>
                                @else
                                    No Uploaded Attachment
                                @endif

                                <div class="m-3 mt-10">
                                    <label for="update-profile-form-5"
                                        class="font-medium text-base mb-5 form-label mt-10">Action
                                        Taken/ Services Rendered</label>
                                    <textarea id="action-taken" name="actionTaken" class="form-control" placeholder="Input text here">{{ old('actionTaken', $old_input->action_taken ?? null) }}</textarea>
                                </div>
                                <label for="update-profile-form-5" class="font-medium form-label m-3 mt-2">File Uploaded:</label>
                                @if ( !empty($old_input->action_taken_attachment) )
                                    <input id="background-info-attachment" name="actionTakenAttachments" value="{{ $old_input->action_taken_attachment }}" type="hidden"/>
                                    <a href="{{ asset('storage/'.$old_input->action_taken_attachment) }}" target="_blank" class="btn btn-primary mt-2">
                                        View Attachment
                                    </a>
                                @else
                                    No Uploaded Attachment
                                @endif

                                {{-- Button --}}
                                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mb-5">
                                    <a href="" class="btn btn-secondary w-24 ml-2">Previous</a>
                                    <button class="btn btn-primary w-24 ml-2" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END: Wizard Layout -->
            </div>
            <script type="text/javascript">
                function previewImage(event) {
                    var input = event.target;
                    var placeholder = document.getElementById('placeholder');
                    var preview = document.getElementById('preview');
                    var reader = new FileReader();

                    reader.onload = function() {
                        preview.src = reader.result;
                        placeholder.style.display = 'none';
                        preview.style.display = 'block';
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            </script>
        @endsection
