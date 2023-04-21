@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->

        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto" id="personal-info">
                        Personal Information
                    </h2>
                </div>
                @foreach ($users as $user)
     
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label font-medium">First
                                            Name:</label><span  class="ml-3">{{ $client_profile_info->first_name }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label font-medium">Middle
                                            Name:</label><span class="ml-3">{{ $client_profile_info->middle_name }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label font-medium">Last
                                            Name:</label><span class="ml-3">{{ $client_profile_info->last_name }}</span></label>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label font-medium" for="startDate">Birthdate:</label><span class="ml-3">{{ $client_profile_info->dateFormatMdY($client_profile_info->birth_date) }}</span>
                                    </div>
                                </div>
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Gender:</label><span class="ml-3">{{ $client_profile_info->gender }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-4" class="form-label font-medium">Age:</label><span class="ml-3">{{ $client_profile_info->age }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Occupation:</label><span class="ml-3">{{ $client_profile_info->occupation }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label font-medium" for="startDate">Baptism Date:</label><span class="ml-3">{{ $client_profile_info->dateFormatMdY($client_profile_info->baptism_date) }}</span>
                                    </div>
                                </div>
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label font-medium">Contact
                                            Number:</label> {{ $client_profile_info->contact_number }}</label>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Division:</label><span class="ml-3">{{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">District:</label><span class="ml-3">{{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}</span>
                                    </div>

                                    <div class="mt-3">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Locale:</label><span class="ml-3">{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}</span>
                                    </div>
                                </div>
                                <div class="w-52 mx-auto xl:mr-0 xl:ml-6 mt-5">
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
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="update-profile-form-5" class="form-label font-medium">Address</label>
                                    <textarea id="update-profile-form-5" class="form-control" placeholder="Address" disabled>{{ $client_profile_info->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- END PERSONAL INFO -->
                        @endforeach
                    </div>
                    <!-- START FAMILY COMPOSITION -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto" id="family-comp">
                                Family Composition
                            </h2>
                        </div>
                        <table class="table">
                            <thead class="table-dark">
                                <tr class="bg-primary">
                                    <th scope="col">Name</th>
                                    <th scope="col">Relationship</th>
                                    <th scope="col">Educational Attainment</th>
                                    <th scope="col">Occupation</th>
                                    <th scope="col">Tel. Number</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($family_compositions as $family_composition)
                                    <tr>
                                        <th scope="row">{{ $family_composition->getFullName($family_composition->id) }}
                                        </th>
                                        <td>{{ $family_composition->relationship }}</td>
                                        <td>{{ $family_composition->educational_attainment }}</td>
                                        <td>{{ $family_composition->occupation }}</td>
                                        <td>{{ $family_composition->contact_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END FAMILY COMPOSITION -->
                    <!-- MEDICAL CONDITION -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto" id="medical-condition">
                                Medical Condition
                            </h2>
                        </div>
                        <table class="table">
                            <thead class="table-dark">
                                <tr class="bg-primary">
                                    <th scope="col">Ano Sakit?</th>
                                    <th scope="col">Kailan Pa?</th>
                                    <th scope="col">Gamot na Iniinom?</th>
                                    <th scope="col">Dosage?</th>
                                    <th scope="col">Gaano Kadalas Inumin?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medical_conditions as $medical_condition)
                                    <tr>
                                        <th scope="row">
                                            {{ $medical_condition->disease->getName($medical_condition->disease_id) }}</th>
                                        <th scope="row">
                                            {{ $medical_condition->dateFormatMdY($medical_condition->since_when) }}</th>
                                        <td>{{ $medical_condition->medicine_supplements }}</td>
                                        <td>{{ $medical_condition->dosage }}</td>
                                        <td>{{ $medical_condition->frequency }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="bg-primary">
                                        <th scope="col">Naging Operasyon</th>
                                        <th scope="col">Petsa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medical_conditions as $medical_condition)
                                        @php
                                            $matching_objects = $medical_operations->where('medical_condition_id', $medical_condition->id);
                                        @endphp

                                        @if($matching_objects->first())
                                            @foreach($matching_objects as $matching_object)
                                                <tr>
                                                    <td scope="row">{{ $matching_object->operation }}</td>
                                                    <td scope="row">{{ $medical_condition->dateFormatMdY($matching_object->date) }}</td>   
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <th scope="row">None</th>
                                                <th scope="row">None</th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3 ">
                        <table class="table">
                            <thead class="table-dark">
                                <tr class="bg-primary">
                                    <th scope="col">Hospital</th>
                                    <th scope="col">Doctor </th>
                                    <th scope="col">Do you have Phil-health Card? Please
                                        Specify </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medical_conditions as $medical_condition)
                                    <tr>
                                        <th scope="row">{{ $medical_condition->hospital }}</th>
                                        <td>{{ $medical_condition->doctor }}</td>
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                        <!-- END MEDICAL CONDITION -->
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <a class="btn btn-primary w-24 ml-2"
                                href="{{ route('view_profile_2', [$user_info->id, $client_profile_info->id]) }}"> Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    @endsection
