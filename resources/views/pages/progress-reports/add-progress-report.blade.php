@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->
    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Progress Report
            </h2>
            <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto" id="personal-info">
                            Personal Information
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label">First
                                                Name:<span class="ml-3">{{ $client_profile_info->first_name }}<span
                                                        class="ml-1">{{ $client_profile_info->middle_name }}<span
                                                            class="ml-1">{{ $client_profile_info->last_name }}</span></span></span></label>
                                        </div>

                                    </div>
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Gender:<span
                                                    class="ml-3">{{ $client_profile_info->gender }}</span></label>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-4" class="form-label">Age:<span
                                                    class="ml-3">{{ $client_profile_info->age }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">Contact
                                                Number: {{ $client_profile_info->contact_number }}</label>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Division:<span
                                                    class="ml-3">{{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }}</span></label>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">District:<span
                                                    class="ml-3">{{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}</span></label>
                                        </div>

                                        <div class="mt-3">
                                            <label for="update-profile-form-3-tomselected" class="form-label"
                                                id="update-profile-form-3-ts-label">Locale:<span
                                                    class="ml-3">{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}</span></label>
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate">Baptism Date:<span
                                                    class="ml-3">{{ $client_profile_info->baptism_date }}</span></label>
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate">Birthdate:<span
                                                    class="ml-3">{{ $client_profile_info->birth_date }}</span></label>
                                        </div>
                                    </div>
                                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6 mt-5">
                                        <div
                                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-md" alt="ADDFII"
                                                    src=" {{ asset('dist/images/profile-1.jpg') }}">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PERSONAL INFO -->
                        </div>
                        <!-- START FAMILY COMPOSITION -->
                        <div class="intro-y box lg:mt-5">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="bg-primary">
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">Means Of Contact</th>
                                        <th scope="col">Case Notes</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">Attachment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($family_compositions as $family_composition)
                                        <tr>
                                            <th scope="row">
                                                {{ $family_composition->getFullName($family_composition->id) }}
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
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        @endsection
