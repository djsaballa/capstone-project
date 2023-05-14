@extends('layout.master')

@section('content')
    <!-- START: CONTENT -->
    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('add_progress_report', [$user_info->id, $client_profile_info->id]) }}">
                <button class="btn btn-primary shadow-md mr-2">Add Report</button>
            </a>
        </div>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
                 @if (Session::has('status'))
                    <div class="alert alert-success text-center text-white">
                        <p>{{ Session::get('status') }}</p>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
                <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                    Progress Report
                </h2>
                @if (Session::has('status'))
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="check-circle-2" class="w-10 h-10 text-success mx-auto mt-3"></i>
                            <div class="modal-body text-success">
                                {{ Session::get('status') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-10 h-10 text-danger mx-auto mt-3"></i>
                            <div class="modal-body text-danger">
                                {{ Session::get('error') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
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
                                                <label for="update-profile-form-3-tomselected"
                                                    class="form-label font-medium"
                                                    id="update-profile-form-3-ts-label">Gender:</label>
                                                <span class="ml-3">{{ $client_profile_info->gender }}</span>
                                            </div>
                                            <div class="mt-3 ">
                                                <label for="update-profile-form-4"
                                                    class="form-label font-medium">Age:</label>
                                                <span class="ml-3">{{ $client_profile_info->age }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <label for="update-profile-form-4" class="form-label font-medium">Contact
                                                    Number: </label>
                                                <span class="ml-3">{{ $client_profile_info->contact_number }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <label for="startDate" class="form-label font-medium">Birth Date:</label>
                                                <span class="ml-3">{{ $client_profile_info->birth_date }}</span>
                                            </div>
                                        </div>

                                        <div class="col-span-6 2xl:col-span-3">
                                            <div class="mt-3 ">
                                                <label for="update-profile-form-3-tomselected"
                                                    class="form-label font-medium"
                                                    id="update-profile-form-3-ts-label">Division:</label>
                                                <span
                                                    class="ml-3">{{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }}</span>
                                            </div>
                                            <div class="mt-3 ">
                                                <label for="update-profile-form-3-tomselected"
                                                    class="form-label font-medium"
                                                    id="update-profile-form-3-ts-label">District:</label>
                                                <span
                                                    class="ml-3">{{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <label for="update-profile-form-3-tomselected"
                                                    class="form-label font-medium"
                                                    id="update-profile-form-3-ts-label">Locale:</label>
                                                <span
                                                    class="ml-3">{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <label for="startDate" class="form-label font-medium">Baptism Date:</label>
                                                <span class="ml-3">{{ $client_profile_info->baptism_date }}</span>
                                            </div>
                                        </div>

                                        @php
                                            $assigned_doctor_info = $client_profile_info->getAssignedDoctorInfo($client_profile_info->assigned_doctor_id);
                                        @endphp
                                        <div class="col-span-6 2xl:col-span-3">
                                            @if (!empty($assigned_doctor_info))
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
                                            @else
                                                <div class="mt-3">
                                                    <label for="update-profile-form-3-tomselected"
                                                        class="form-label font-medium"
                                                        id="update-profile-form-3-ts-label">Assigned Doctor:</label>
                                                    <span
                                                        class="ml-3">TBA</span>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="startDate" class="form-label font-medium">Assigned Doctor's Contact Number:</label>
                                                    <span class="ml-3">TBA</span>
                                                </div>
                                            @endif
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
                                    </div>
                                </div>
                                <!-- END PERSONAL INFO -->
                            </div>
                            <!-- START FAMILY COMPOSITION -->
                            <div class="intro-y box lg:mt-5">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="bg-primary">
                                            <th scope="col">Date</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Means Of Contact</th>
                                            <th scope="col">Case Notes</th>
                                            <th scope="col">Remarks</th>
                                            <th scope="col">Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($progress_reports->first())
                                            @foreach ($progress_reports as $progress_report)
                                            <tr>
                                                <th scope="row">{{ $progress_report->dateFormatMdY($progress_report->date) }}</th>
                                                <td>{{ $progress_report->name }}</td>
                                                <td>{{ $progress_report->contact_number }}</td>
                                                <td>{{ $progress_report->case_note }}</td>
                                                <td>{{ $progress_report->remarks }}</td>
                                                <td>
                                                    @if ( !empty($progress_report->attachment) )
                                                    <a href="{{ asset('storage/'.$progress_report->attachment) }}" target="_blank" >
                                                        <button class="btn btn-primary">
                                                            View Attachment
                                                        </button>
                                                    </a>
                                                    @else
                                                        No Uploaded Attachment
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <th>None</th>
                                                <th>None</th>
                                                <th>None</th>
                                                <th>None</th>
                                                <th>None</th>
                                                <th>None</th>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- END FAMILY COMPOSITION -->
                        </div>
                    </div>
                </div>
                <!-- END: Content -->
            @endsection
