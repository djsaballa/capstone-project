@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->
    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Add Progress Report
            </h2>
            <div class="p-5">
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto" id="personal-info">
                            Client Personal Information
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-1" class="form-label font-medium">
                                                Name:</label>
                                            <span
                                                class="ml-3">{{ $client_profile_info->getFullName($client_profile_info->id) }}</span>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                                id="update-profile-form-3-ts-label">Gender:</label>
                                            <span class="ml-3">{{ $client_profile_info->gender }}</span>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-4" class="form-label font-medium">Age:</label>
                                            <span class="ml-3">{{ $client_profile_info->age }}</span>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label font-medium">Contact
                                                Number: </label>
                                            <span class="ml-3">{{ $client_profile_info->contact_number }}</span>
                                        </div>
                                    </div>

                                    <div class="col-span-6 2xl:col-span-3">

                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                                id="update-profile-form-3-ts-label">Division:</label>
                                            <span
                                                class="ml-3">{{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }}</span>
                                        </div>
                                        <div class="mt-3 ">
                                            <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                                id="update-profile-form-3-ts-label">District:</label>
                                            <span
                                                class="ml-3">{{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}</span>
                                        </div>

                                        <div class="mt-3">
                                            <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                                id="update-profile-form-3-ts-label">Locale:</label>
                                            <span
                                                class="ml-3">{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}</span>
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate" class="form-label font-medium">Baptism Date:</label>
                                            <span class="ml-3">{{ $client_profile_info->baptism_date }}</span>
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate" class="form-label font-medium">Birth Date:</label>
                                            <span class="ml-3">{{ $client_profile_info->birth_date }}</span>
                                        </div>
                                    </div>
                                    @php
                                        $assigned_doctor_info = $client_profile_info->getAssignedDoctorInfo($client_profile_info->assigned_doctor_id);
                                    @endphp
                                    <div class="col-span-6 2xl:col-span-3">
                                        <div class="mt-3">
                                            <label for="update-profile-form-3-tomselected"
                                                class="form-label font-medium"
                                                id="update-profile-form-3-ts-label">Assigned Doctor:</label>
                                            <span
                                                class="ml-3">{{ $assigned_doctor_info->getFullName($assigned_doctor_info->id) }}</span>
                                        </div>
                                        <div class="mt-3">
                                            <label for="startDate" class="form-label font-medium">Assigned Doctor's Contact Number:</label>
                                            <span class="ml-3">{{ $assigned_doctor_info->contact_number }}</span>
                                        </div>
                                    </div>

                                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6 mt-5">
                                        <div
                                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                @if (!empty($client_profile_info->picture))
                                                    <img src="{{ asset('storage/' . $client_profile_info->picture) }}"
                                                        class="rounded-md" alt="Client Image">
                                                @else
                                                    <img alt="Client Image" class="rounded-md"
                                                        src=" {{ asset('dist/images/profile-1.jpg') }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="intro-y col-span-12 lg:col-span-8 mt-5">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('save_progress_report') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $user_info->id }}" name="userId">
                                            <input type="hidden" value="{{ $client_profile_info->id }}" name="clientProfileId">
                                            <div>
                                                <label for="regular-form-1" class="form-label font-medium">Date</label><input
                                                    type="text" class="datepicker form-control block mx-auto"
                                                    data-single-mode="true" name="date" value="{{ old('date') ?: null }}" >
                                            </div>
                                            <div class="mt-3"> <label for="regular-form-2"
                                                    class="form-label font-medium">Name of Respondent</label>
                                                <input id="regular-form-2" type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name') ?: null }}">
                                            </div>
                                            <div class="mt-3"> <label for="regular-form-3"
                                                    class="form-label font-medium">Contact Number</label>
                                                    <input id="regular-form-3" type="text" class="form-control" placeholder="09123456789" name="contactNumber" value="{{ old('contactNumber') ?: null }}">
                                            </div>
                                            <div class="mt-3"> <label for="regular-form-4" class="form-label font-medium">Case
                                                    Notes</label>
                                                <textarea class="form-control" placeholder="Type Case Notes Here" name="notes">{{ old('notes') ?: '' }}</textarea>
                                            </div>
                                            <div class="mt-3"> <label for="regular-form-5"
                                                    class="form-label font-medium">Remarks</label>
                                                    <textarea class="form-control" placeholder="Type Remarks Here" name="remarks">{{ old('remarks') ?: '' }}</textarea>
                                            </div>
                                            <div class="mt-3"> <label for="regular-form-5"
                                                    class="form-label font-medium">Attachment</label>
                                                <input class="form-control" type="file" id="formFileMultiple" name="attachment" multiple />
                                            </div>
                                            <div class="mt-5">
                                                <a href="{{ route('view_progress_report', [$user_info->id, $client_profile_info->id]) }}" class="btn btn-secodary w-24 ml-2">
                                                    Cancel
                                                </a>
                                                <button class="btn btn-primary w-24 ml-2" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END PERSONAL INFO -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        @endsection
