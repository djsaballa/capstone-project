@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Edit Profile
            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="{{ route('edit_profile_1', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium">
                        <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                    <a href="{{ route('edit_profile_2', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="users"></i> Family Composition </a>
                    <a href="{{ route('edit_profile_3', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="{{ route('edit_profile_4', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Information </a>
                    <a href="{{ route('edit_profile_5', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="file-text"></i> Background Information </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>

        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Personal Information
                    </h2>
                </div>
                <div class="p-5">
                    <form method="GET" action="">
                        @csrf
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-6 2xl:col-span-3">

                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label">First
                                                Name</label>
                                            <input id="update-profile-form-1" type="text" class="form-control"
                                                placeholder="First Name" value="{{ $client_profile_info->first_name }}">
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label">Middle
                                                Name</label>
                                            <input id="update-profile-form-1" type="text" class="form-control"
                                                placeholder="Middle Name" value="{{ $client_profile_info->middle_name }}">
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label">Last
                                                Name</label>
                                            <input id="update-profile-form-1" type="text" class="form-control"
                                                placeholder="Last Name" value="{{ $client_profile_info->last_name }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate">Birthdate</label>
                                            <input id="startDate" class="form-control" type="date"
                                                value="{{ $client_profile_info->birth_date }}" />
                                            <span id="startDateSelected"></span>
                                        </div>

                                    </div>
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Gender</label>
                                            <select id="update-profile-form-3" data-search="true"
                                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                                <option value="{{ $client_profile_info->gender }}" selected="true">
                                                    {{ $client_profile_info->gender }}</option>
                                                @if ($client_profile_info->gender == 'Male')
                                                    <option value="Female">Female</option>
                                                @else
                                                    <option value="Male">Male</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-4" class="form-label">Age</label>
                                            <input id="update-profile-form-4" type="text" class="form-control"
                                                placeholder="Input text" value="{{ $client_profile_info->age }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Occupation</label>
                                            <input id="update-profile-form-1" type="text" class="form-control"
                                                placeholder="Occupation" value="{{ $client_profile_info->occupation }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate">Baptism Date</label>
                                            <input id="startDate" class="form-control" type="date"
                                                value="{{ $client_profile_info->baptism_date }}" />
                                            <span id="startDateSelected"></span>
                                        </div>

                                    </div>
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Division</label>
                                            <select id="update-profile-form-3" data-search="true"
                                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                                <option
                                                    value="{{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }})"
                                                    selected="true">
                                                    {{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }}
                                                </option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->division }}">{{ $division->division }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">District</label>
                                            <select id="update-profile-form-3" data-search="true"
                                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                                <option
                                                    value="{{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}"
                                                    selected="true">
                                                    {{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}
                                                </option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->district }}">{{ $district->district }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mt-3">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Locale</label>
                                            <select id="update-profile-form-3" data-search="true"
                                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                                <option
                                                    value="{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}"
                                                    selected="true">
                                                    {{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}
                                                </option>
                                                @foreach ($locales as $locale)
                                                    <option value="{{ $locale->locale }}">{{ $locale->locale }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">Phone
                                                Number</label>
                                            <input id="update-profile-form-4" type="text" class="form-control"
                                                placeholder="Input text"
                                                value="{{ $client_profile_info->contact_number }}">
                                        </div>
                                    </div>

                                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                        <div
                                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                    src=" {{ asset('dist/images/profile-6.jpg') }}">
                                                <div
                                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        icon-name="x" data-lucide="x" class="lucide lucide-x w-4 h-4">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18">
                                                        </line>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Change
                                                    Photo</button>
                                                <input type="file"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="mt-3">
                                        <label for="update-profile-form-5" class="form-label">Address</label>
                                        <textarea id="update-profile-form-5" class="form-control" placeholder="Address">{{ $client_profile_info->address }}</textarea>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="flex items-center mr-3 text-danger" href="javascript:;"
                                        data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i
                                            data-lucide="trash" class="w-4 h-4 mr-1"></i>
                                        Archive Profile </a>
                                </div>
                                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                    <a class="btn btn-primary w-24 ml-2"
                                        href="{{ route('edit_profile_2', [$employee_info->id, $client_profile_info->id]) }}">Next</a>
                                </div>
                            </div>
                            <!-- END: Wizard Layout -->
                        </div>
                    </div>
                </div>
            </form>
            <!-- END: Content -->
        @endsection
