@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Add Profile Module
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
                <div class="">
                    @foreach ($errors->all() as $error)
                        <p style="color: red;">{{ $error }}</p>
                    @endforeach
                </div>
                <div class="p-5">
                    <form method="POST" action="{{ route('edit_profile_1_next') }}">
                        @csrf
                        <input id="employee-id" name="employeeId" value="{{ $employee_info->id }}" hidden>
                        <input id="client-profile-id" name="clientProfileId" value="{{ $client_profile_info->id }}" hidden>
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-6 2xl:col-span-3">

                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label">First
                                                Name</label>
                                            <input id="first-name" name="firstName" type="text" class="form-control"
                                                placeholder="First Name" value="{{ $client_profile_info->first_name }}">
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label">Middle
                                                Name</label>
                                            <input id="middle-name" name="middleName" type="text" class="form-control"
                                                placeholder="Middle Name" value="{{ $client_profile_info->middle_name }}">
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label">Last
                                                Name</label>
                                            <input id="last-name" name="lastName" type="text" class="form-control"
                                                placeholder="Last Name" value="{{ $client_profile_info->last_name }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate">Birthdate</label>
                                            <input id="birth-date" name="birthDate" class="form-control" type="date"
                                                value="{{ $client_profile_info->birth_date }}" />
                                            <span id="startDateSelected"></span>
                                        </div>

                                    </div>
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Gender</label>
                                            <select id="gender" name="gender" data-search="true"
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
                                            <input id="age" name="age" type="text" class="form-control"
                                                placeholder="Input text" value="{{ $client_profile_info->age }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Occupation</label>
                                            <input id="occupation" name="occupation" type="text" class="form-control"
                                                placeholder="Occupation" value="{{ $client_profile_info->occupation }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate">Baptism Date</label>
                                            <input id="baptism-date" name="baptismDate" class="form-control"
                                                type="date" value="{{ $client_profile_info->baptism_date }}" />
                                            <span id="startDateSelected"></span>
                                        </div>

                                    </div>
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Division</label>
                                            <select id="division" name="division" data-search="true"
                                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                                <option value="{{ $client_profile_info->locale->division->getId() }}"
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
                                            <select id="district" name="district" data-search="true"
                                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                                <option value="{{ $client_profile_info->locale->district->getId() }}"
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
                                            <select id="locale" name="locale" data-search="true"
                                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                                <option value="{{ $client_profile_info->locale->getId() }}"
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
                                            <input id="contact-number" name="contactNumber" type="text"
                                                class="form-control" placeholder="Input text"
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
                                        <textarea id="address" name="address" class="form-control" placeholder="Address">{{ $client_profile_info->address }}</textarea>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="flex items-center mr-3 text-danger" href="javascript:;"
                                        data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i
                                            data-lucide="trash" class="w-4 h-4 mr-1"></i>
                                        Archive Profile </a>
                                </div>
                                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                    <button class="btn btn-primary w-24 ml-2">Next</button>
                                </div>
                            </div>
                            <!-- END: Wizard Layout -->
                            <div class="intro-y box py-10 sm:py-20">
                                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <h2 class="font-medium text-base mr-auto" id="family-comp">
                                        Family Composition
                                    </h2>
                                </div>
                                <div class="">
                                    @foreach ($errors->all() as $error)
                                        <p style="color: red;">{{ $error }}</p>
                                    @endforeach
                                    @if (\Session::has('status'))
                                        <div style="color: green;">
                                            <ul>
                                                <li>{!! \Session::get('status') !!}</li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="px-5 sm:px-20 mt-5 pt-5">
                                    <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                                        <!-- START FAMILY COMPOSITION -->
                                        <div class="intro-y box lg:mt-5">

                                            <table class="table">
                                                <thead class="table-dark">
                                                    <tr class="bg-primary">
                                                        <th scope="col">First Name</th>
                                                        <th scope="col">Middle Name</th>
                                                        <th scope="col">Last Name</th>
                                                        <th scope="col">Relationship</th>
                                                        <th scope="col">Educational Attainment</th>
                                                        <th scope="col">Occupation</th>
                                                        <th scope="col">Tel. Number</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($family_compositions as $family_composition)
                                                        <tr>
                                                            <input id="employee-id" name="employeeId"
                                                                value="{{ $employee_info->id }}" hidden>
                                                            <input id="client-profile-id" name="clientProfileId"
                                                                value="{{ $client_profile_info->id }}" hidden>
                                                            <input id="fam-comp-id" name="famCompId"
                                                                value="{{ $family_composition->id }}" hidden>
                                                            <td>
                                                                <input id="family-first-name" name="familyFirstName"
                                                                    value="{{ $family_composition->first_name }}"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input id="family-middle-name" name="familyMiddleName"
                                                                    value="{{ $family_composition->middle_name }}"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input id="family-last-name" name="familyLastName"
                                                                    value="{{ $family_composition->last_name }}"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <select id="family-relationship" name="familyRelationship"
                                                                    data-search="true"
                                                                    class="tom-select w-full tomselected" tabindex="-1"
                                                                    hidden="hidden">
                                                                    <option
                                                                        value="{{ $family_composition->relationship }}"
                                                                        selected="true">
                                                                        {{ $family_composition->relationship }}
                                                                    </option>
                                                                    <option value="Father">Father</option>
                                                                    <option value="Mother">Mother</option>
                                                                    <option value="Brother">Brother</option>
                                                                    <option value="Sister">Sister</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select id="family-educ" name="familyEduc"
                                                                    data-search="true"
                                                                    class="tom-select w-full tomselected" tabindex="-1"
                                                                    hidden="hidden">
                                                                    <option
                                                                        value="{{ $family_composition->educational_attainment }}"
                                                                        selected="true">
                                                                        {{ $family_composition->educational_attainment }}
                                                                    </option>
                                                                    <option value="College Graduate">College Graduate
                                                                    </option>
                                                                    <option value="High School Graduate">High School
                                                                        Graduate</option>
                                                                    <option value="Elementary Graduate">Elementary
                                                                        Graduate</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input id="family-occupation" name="familyOccupation"
                                                                    value="{{ $family_composition->occupation }}"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input id="family-contact-number"
                                                                    name="familyContactNumber"
                                                                    value="{{ $family_composition->contact_number }}"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary flex items-center mr-3 "
                                                                    type="submit">
                                                                    <i data-lucide="save" class="w-4 h-4 mr-1"></i>
                                                                    Save </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END FAMILY COMPOSITION -->
                                        <!-- MEDICAL CONDITION -->
                                        <div class="intro-y box lg:mt-5">
                                            <div
                                                class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                                <h2 class="font-medium text-base mr-auto" id="medical-condition">
                                                    Medical Condition
                                                </h2>
                                            </div>
                                            <div class="">
                                                @foreach ($errors->all() as $error)
                                                    <p style="color: red;">{{ $error }}</p>
                                                @endforeach
                                                @if (\Session::has('status'))
                                                    <div style="color: green;">
                                                        <ul>
                                                            <li>{!! \Session::get('status') !!}</li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="px-5 sm:px-20 mt-5 pt-5">
                                                <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                                                    <div class="intro-y box lg:mt-5">
                                                        <table class="table">
                                                            <thead class="table-dark">
                                                                <tr class="bg-primary">
                                                                    <th scope="col">Ano Sakit?</th>
                                                                    <th scope="col">Kailan Pa?</th>
                                                                    <th scope="col">Gamot na Iniinom?</th>
                                                                    <th scope="col">Dosage?</th>
                                                                    <th scope="col">Gaano Kadalas Inumin?</th>
                                                                    <th scope="col">Hospital</th>
                                                                    <th scope="col">Doctor </th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($medical_conditions as $medical_condition)
                                                                    <input id="employee-id" name="employeeId"
                                                                        value="{{ $employee_info->id }}" hidden>
                                                                    <input id="client-profile-id" name="clientProfileId"
                                                                        value="{{ $client_profile_info->id }}" hidden>
                                                                    <input id="med-con-id" name="medConId"
                                                                        value="{{ $medical_condition->id }}" hidden>
                                                                    <td scope="row">
                                                                        <select id="medical-condition-name"
                                                                            name="medicalConditionName" data-search="true"
                                                                            class="tom-select w-full tomselected"
                                                                            tabindex="-1" hidden="hidden">
                                                                            <option
                                                                                value="{{ $medical_condition->disease_id }}"
                                                                                selected="true">
                                                                                {{ $medical_condition->disease->getName($medical_condition->disease_id) }}
                                                                            </option>
                                                                            @foreach ($diseases as $disease)
                                                                                <option value="{{ $disease->id }}">
                                                                                    {{ $disease->disease }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input id="medical-condition-date"
                                                                            name="medicalConditionDate"
                                                                            value="{{ $medical_condition->since_when }}"
                                                                            class="form-control" type="date">
                                                                    </td>
                                                                    <td>
                                                                        <input id="medical-condition-medicine-supplement"
                                                                            name="medicalConditionMedicineSupplement"
                                                                            value=" {{ $medical_condition->medicine_supplements }}"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input id="medical-condition-dosage"
                                                                            name="medicalConditionDosage"
                                                                            value=" {{ $medical_condition->dosage }}"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input id="medical-condition-frequency"
                                                                            name="medicalConditionFrequency"
                                                                            value=" {{ $medical_condition->frequency }}"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input id="medical-condition-hospital"
                                                                            name="medicalConditionHospital"
                                                                            value="{{ $medical_condition->hospital }}"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input id="medical-doctor" name="medicalDoctor"
                                                                            value="{{ $medical_condition->doctor }}"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary flex items-center mr-3 "
                                                                            type="submit">
                                                                            <i data-lucide="save"
                                                                                class="w-4 h-4 mr-1"></i> Save
                                                                        </button>
                                                                    </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-5 sm:px-20 mt-5 pt-1">
                                                <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                                                    <div class="intro-y box lg:mt-5">
                                                        <table class="table">
                                                            <thead class="table-dark">
                                                                <tr class="bg-primary">
                                                                    <th scope="col">Naging Operasyon</th>
                                                                    <th scope="col">Petsa</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($medical_conditions as $medical_condition)
                                                                    @php
                                                                        $matching_objects = $medical_operations->where('medical_condition_id', $medical_condition->id);
                                                                    @endphp

                                                                    @if ($matching_objects->first())
                                                                        @foreach ($matching_objects as $matching_object)
                                                                            <tr>
                                                                                <input id="employee-id" name="employeeId"
                                                                                    value="{{ $employee_info->id }}"
                                                                                    hidden>
                                                                                <input id="client-profile-id"
                                                                                    name="clientProfileId"
                                                                                    value="{{ $client_profile_info->id }}"
                                                                                    hidden>
                                                                                <input id="operation-id"
                                                                                    name="operationId"
                                                                                    value="{{ $matching_object->id }}"
                                                                                    hidden>
                                                                                <td>
                                                                                    <input id="operation" name="operation"
                                                                                        value="{{ $matching_object->operation }}"
                                                                                        class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <input id="operation-date"
                                                                                        name="operationDate"
                                                                                        value="{{ $matching_object->date }}"
                                                                                        class="form-control"
                                                                                        type="date" />
                                                                                </td>
                                                                                <td>
                                                                                    <button
                                                                                        class="btn btn-primary flex items-center mr-3 "
                                                                                        type="submit">
                                                                                        <i data-lucide="save"
                                                                                            class="w-4 h-4 mr-1"></i>
                                                                                        Save </button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>None</td>
                                                                            <td>None</td>
                                                                            <td>None</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-5 sm:px-20 mt-5 pt-1">
                                                <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                                                    <div class="intro-y lg:mt-5">
                                                        <input id="employee-id" name="employeeId"
                                                            value="{{ $employee_info->id }}" hidden>
                                                        <input id="client-profile-id" name="clientProfileId"
                                                            value="{{ $client_profile_info->id }}" hidden>
                                                        <div class="mt-3">
                                                            <div class="col-span-6 2xl:col-span-3">
                                                                <label for="update-profile-form-1" class="form-label">
                                                                    Are you a Philhealth Member?
                                                                </label>
                                                                <select id="philhealth_member" name="philhealthMember"
                                                                    data-search="true"
                                                                    class="tom-select w-full tomselected" tabindex="-1"
                                                                    hidden="hidden">
                                                                    <option
                                                                        value="{{ $client_profile_info->philhealth_member }}"
                                                                        selected="true">
                                                                        {{ $client_profile_info->philhealth_member }}
                                                                    </option>
                                                                    @if ($client_profile_info->philhealth_member == 'Yes')
                                                                        <option value="No"> No </option>
                                                                    @elseif($client_profile_info->philhealth_member == 'No')
                                                                        <option value="Yes"> Yes </option>
                                                                    @endif
                                                                </select>
                                                                <label for="update-profile-form-1" class="form-label">
                                                                    Other health card, please specify:
                                                                </label>
                                                                <input id="health_card" name="healthCard" type="text"
                                                                    class="form-control" placeholder="Specify Here"
                                                                    value="{{ $client_profile_info->health_card }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MEDICAL CONDITION -->
                                        <!-- BEGIN: Wizard Layout -->
                                            <input id="employee-id" name="employeeId" value="{{ $employee_info->id }}"
                                                hidden>
                                            <input id="client-profile-id" name="clientProfileId"
                                                value="{{ $client_profile_info->id }}" hidden>
                                            <div class="intro-y box lg:mt-5">
                                                <div
                                                    class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                                                    <div class="font-medium text-base">Contact Persons</div>
                                                    <div class="">
                                                        @foreach ($errors->all() as $error)
                                                            <p style="color: red;">{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                                                        <div class="mt-3 col-span-3 2xl:col-span-1">
                                                            <label for="update-profile-form-1"
                                                                class="form-label">Name</label>
                                                            <input id="contact-person1" name="contactPerson1"
                                                                type="text" class="form-control"
                                                                placeholder="Full Name"
                                                                value="{{ $client_profile_info->contact_person1_name }}">
                                                        </div>
                                                        <div class="mt-3 col-span-3 2xl:col-span-1">
                                                            <label for="update-profile-form-1" class="form-label">Contact
                                                                Number</label>
                                                            <input id="contact-person1" name="contactPerson1Number"
                                                                type="text" class="form-control"
                                                                placeholder="Input here"
                                                                value="{{ $client_profile_info->contact_person1_contact_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                                                        <div class="mt-3 col-span-3 2xl:col-span-1">
                                                            <label for="update-profile-form-1"
                                                                class="form-label">Name</label>
                                                            <input id="contact-person2" name="contactPerson2"
                                                                type="text" class="form-control"
                                                                placeholder="Full Name"
                                                                value="{{ $client_profile_info->contact_person2_name }}">
                                                        </div>
                                                        <div class="mt-3 col-span-3 2xl:col-span-1">
                                                            <label for="update-profile-form-1" class="form-label">Contact
                                                                Number</label>
                                                            <input id="contact-person2" name="contactPerson2Number"
                                                                type="text" class="form-control"
                                                                placeholder="Input here"
                                                                value="{{ $client_profile_info->contact_person2_contact_number }}">
                                                        </div>
                                                        <div
                                                            class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mb-5">
                                                            <a href="{{ route('edit_profile_3', [$employee_info->id, $client_profile_info->id]) }}"
                                                                class="btn btn-secondary w-24 ml-2">Previous</a>
                                                            <button type="submit"
                                                                class="btn btn-primary w-24 ml-2">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END: Wizard Layout -->
                                            </div>
                                    </div>
                                </div>
                    <!-- END: Content -->
                    <input id="employee-id" name="employeeId" value="{{ $employee_info->id }}" hidden>
                <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box lg:mt-5">
                    <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">

                        <div class="font-medium text-base">Background Information</div>
                        <div class="mt-3">
                            <label for="update-profile-form-5" class="form-label">BACKGROUND INFO (KALAGAYAN NG
                                PASYENTE,
                                PAMILYA, FINANSYAL, EMOSYONAL, PHYSICAL)</label>
                            <textarea id="background-info" name="backgroundInfo" class="form-control" placeholder="Input text here">{{ $client_profile_info->background_info }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                        <form data-single="true" action="/file-upload" class="dropzone">
                            <div class="fallback"> <input name="file" type="file" /> </div>
                            <div class="dz-message" data-dz-message>
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                        class="font-medium">not</span> actually uploaded. </div>
                            </div>
                        </form>
                        <div class="mt-3">
                            <label for="update-profile-form-5" class="form-label">ACTION TAKEN/ SERVICES
                                RENDERED</label>
                            <textarea id="action-taken" name="actionTaken" class="form-control" placeholder="Input text here">{{ $client_profile_info->action_taken }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                        <form data-single="true" action="/file-upload" class="dropzone">
                            <div class="fallback"> <input name="file" type="file" /> </div>
                            <div class="dz-message" data-dz-message>
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                        class="font-medium">not</span> actually uploaded. </div>
                            </div>
                        </form>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <a class="btn btn-secondary w-24 ml-2"
                                href="{{ route('edit_profile_4', [$employee_info->id, $client_profile_info->id]) }}">Previous</a>
                            <button type="submit" class="btn btn-primary w-24 ml-2">Finish</button>
                        </div>
                        <!-- END: Wizard Layout -->
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- END: Content -->
@endsection
