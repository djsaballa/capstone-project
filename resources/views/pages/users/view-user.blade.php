@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            View User
        </h2>
        @if ($user_info->role_id == 10 || $user_info->role_id == 11)
            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                <a href="{{ route('edit_user', [$user_info->id, $employee_info->id]) }}" class="btn btn-primary w-24 ml-2">Edit</a>
            </div>
        @endif
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                View User Profile
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row">
                <div class="flex-1 mt-6 xl:mt-0">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">First Name</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                    value="{{ $employee_info->first_name }}" disabled>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">Middle Name</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                    value="{{ $employee_info->middle_name }}" disabled>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">Last Name</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                    value="{{ $employee_info->last_name }}" disabled>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                <input id="update-profile-form-4" type="text" class="form-control"
                                    placeholder="" value="{{ $employee_info->contact_number }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Division</label>
                                @if ( !empty($employee_info->division_id) )
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="{{ $employee_info->getDivisionName($employee_info->division_id)}}" disabled>
                                @else
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="" disabled>
                                @endif
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">District</label>
                                @if ( !empty($employee_info->district_id) )
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="{{ $employee_info->getDistrictName($employee_info->district_id)}}" disabled>
                                @else
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="" disabled>
                                @endif
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Locale</label>
                                @if ( !empty($employee_info->locale_id) )
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="{{ $employee_info->getLocaleName($employee_info->locale_id)}}" disabled>
                                @else
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="" disabled>
                                @endif
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Role</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                    value="{{ $employee_info->getRoleName($employee_info->role_id) }}" disabled>
                            </div>
                        </div>
                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                            <div class="mt-3">
                                <label for="update-profile-form-4" class="form-label">Username</label>
                                <input id="update-profile-form-4" type="text" class="form-control"
                                    placeholder="" value="{{ $employee_info->username }}" disabled>
                            </div>
                            <div
                                class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-8">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    @if ( !empty($employee_info->picture) )
                                    <img src="{{ asset('storage/'.$employee_info->picture) }}" alt="User Image">
                                    @else
                                        <img class="rounded-md" alt="ADDFII"
                                        src="{{ asset('dist/images/profile-1.jpg') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        @php
                            $previous_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
                        @endphp
                        @if ($previous_route == "view_inbox")
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <a href="{{ route('inbox', [$user_info->id]) }}" class="btn btn-primary w-24 ml-2">Return</a>
                            </div>
                        @else
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <a href="{{ route($previous_route, [$user_info->id]) }}" class="btn btn-primary w-24 ml-2">Return</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- END: Wizard Layout -->
        </div>
    @endsection
