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
                <button class="w-10 h-10 rounded-full btn btn-primary ">1</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Setup Personal Information</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>2</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Family
                    Composition</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>3</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Medical
                    Conditon</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>4</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Contact
                    Persons</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>5</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Background
                    Information</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>6</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Review</div>
            </div>


        </div>
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Personal Information
                </h2>
            </div>
            <div class="">
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
            <div class="p-5">
                <form method="POST" action="{{ route('add_client_profile_1_next') }}" enctype="multipart/form-data">
                    @csrf
                    @php
                        use App\Models\TempClientProfile;

                        $tempCP = TempClientProfile::all();
                        $old_input = $tempCP->where('user_encoder_id', $user_info->id)->last();
                    @endphp
                    <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label">First Name</label>
                                        <input id="first-name" name="firstName" type="text" class="form-control"
                                            placeholder="First Name" value="{{ old('firstName', $old_input->first_name ?? null) }}">
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label">Middle Name</label>
                                        <input iid="middle-name" name="middleName" type="text" class="form-control"
                                            placeholder="Middle Name" value="{{ old('middleName', $old_input->middle_name ?? null) }}">
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label">Last Name</label>
                                        <input id="last-name" name="lastName" type="text" class="form-control"
                                            placeholder="Last Name" value="{{ old('lastName', $old_input->last_name ?? null) }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="startDate">Birthdate</label>
                                        <input id="birth-date" name="birthDate" value="{{ old('birthDate', $old_input->birth_date ?? null)}}" class="form-control" type="date" />
                                        <span id="startDateSelected"></span>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                        <input id="contact-number" name="contactNumber" type="text" class="form-control"
                                            placeholder="09123456789" value="{{ old('contactNumber', $old_input->contact_number ?? null) }}">
                                    </div>
                                </div>
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label"
                                            id="update-profile-form-3-ts-label">Gender</label>
                                        <select id="gender" name="gender" data-search="true"
                                            class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                            @if ($old_input)
                                                @if ($old_input->gender == "Male")
                                                    <option value="{{ $old_input->gender }}">{{ $old_input->gender }}</option>
                                                    <option value="Female">Female</option>
                                                @else
                                                    <option value="{{ $old_input->gender }}" selected="true">{{ $old_input->gender }}</option>
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
                                            placeholder="Occupation" value="{{ old('occupation', $old_input->occupation ?? null) }}">
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
                                        <select id="division-filter" name="division" data-search="true"
                                            class="w-full form-control" tabindex="-1" onchange="loadDistricts( {{ $districts_json }} )">
                                            @if ($old_input)
                                                @php
                                                    $old_input_division = $divisions->find( $old_input->division );
                                                @endphp
                                                <option value="{{ $old_input_division->id }}" selected="true"> {{ $old_input_division->division }} </option>
                                            @else
                                                @if ( old('division') )
                                                    @php
                                                        $old_division = $divisions->find( old('division') );
                                                    @endphp
                                                    <option value="{{ $old_division->id }}" selected="true"> {{ $old_division->division }} </option>
                                                @else
                                                    <option value="Select Division" selected="true" disabled> Select Division</option>
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
                                        <select id="district-filter" name="district" data-search="true"
                                            class="w-full form-control" tabindex="-1" onchange="loadLocales( {{ $locales_json }} )" disabled>
                                            @if ($old_input)
                                                @php
                                                    $old_input_district = $districts->find( $old_input->district );
                                                @endphp
                                                <option value="{{ $old_input_district->id }}" selected="true"> {{ $old_input_district->district }} </option>
                                            @else
                                                @if ( old('district') )
                                                    @php
                                                        $old_district = $districts->find( old('district') );
                                                    @endphp
                                                    <option value="{{ $old_district->id }}" selected="true"> {{ $old_district->district }} </option>
                                                @else
                                                    <option value="Select District" selected="true" disabled> Select District</option>
                                                @endif
                                            @endif
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label for="update-profile-form-3-tomselected" class="form-label"
                                            id="update-profile-form-3-ts-label">Locale</label>
                                        <select id="locale-filter" name="locale" data-search="true"
                                            class="w-full form-control" tabindex="-1" disabled>
                                            @if ($old_input)
                                                @php
                                                    $old_input_locale = $locales->find( $old_input->locale );
                                                @endphp
                                                <option value="{{ $old_input_locale->id }}" selected="true"> {{ $old_input_locale->locale }} </option>
                                            @else
                                                @if ( old('locale') )
                                                    @php
                                                        $old_locale = $locales->find( old('locale') );
                                                    @endphp
                                                    <option value="{{ $old_locale->id }}" selected="true"> {{ $old_locale->locale }} </option>
                                                @else
                                                    <option value="Select Locale" selected="true" disabled> Select Locale</option>
                                                @endif
                                            @endif
                                            @foreach ($locales as $locale)
                                                <option value="{{ $locale->id }}">
                                                    {{ $locale->locale }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="startDate">Baptism Date</label>
                                        <input id="baptism-date" name="baptismDate" value="{{ old('baptismDate', $old_input->baptism_date ?? null) }}" class="form-control" type="date" />
                                        <span id="startDateSelected"></span>
                                    </div>
                                </div>
                                <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                    <div
                                        class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if ($old_input)
                                                @php
                                                    $picture = $old_input->picture;
                                                @endphp
                                                <img class="rounded-md" alt="Client Image" id="placeholder"
                                                src="{{ asset('storage/'.$picture) }}">
                                            @else
                                                <img class="rounded-md" alt="Client Image" id="placeholder"
                                                src="{{ asset('dist/images/profile-1.jpg') }}">
                                            @endif
                                            <img id="preview" src="#" alt="Client Image" class="rounded-md" style="display:none;">
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                            <input type="file" name="picture" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImage(event)">
                                            <input type="hidden" name="pictureBackup" value="{{ $old_input ? $old_input->picture : null }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="update-profile-form-5" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Street Address, Barangay, City, Province, Zip Code">{{ old('address', $old_input->address ?? null) }}</textarea>
                                </div>
                            </div>
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <a href="{{ route('add_client_profile_privacy', $user_info->id) }}"
                                    class="btn btn-secondary w-24 ml-2">Previous</a>
                                <button class="btn btn-primary w-24 ml-2" type="submit">Next</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END: Wizard Layout -->
            </div>
            <script>
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
