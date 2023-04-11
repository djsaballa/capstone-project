@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            View User
        </h2>
        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
            <a href="{{ route('edit_user', [$user_info->id, $employee_info->id]) }}" class="btn btn-primary w-24 ml-2">Edit</a>
        </div>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                View User Profile
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
                <div class="flex-1 mt-6 xl:mt-0">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">Username</label>
                                <input id="update-profile-form-1" type="text" class="form-control"
                                    placeholder="" value="{{ $employee_info->username }}" disabled>
                            </div>
                            <div class="mt-3">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="text" class="form-control mt-2" id="exampleInputPassword1"
                                placeholder="" value="{{ $employee_info->password }}" disabled>
                            </div>
                        </div>
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
                                @endif                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Locale</label>
                                @if ( !empty($employee_info->locale_id) )
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="{{ $employee_info->getLocaleName($employee_info->locale_id)}}" disabled>
                                @else
                                    <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                        value="" disabled>
                                @endif                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Role</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder=""
                                    value="{{ $employee_info->getRoleName($employee_info->role_id) }}" disabled>
                            </div>
                        </div>
                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                            <div
                                class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" alt="Midone - HTML Admin Template"
                                        src="dist/images/profile-6.jpg">
                                    <div
                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x"
                                            class="lucide lucide-x w-4 h-4">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg> </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <a href="{{ route('list_of_users', [$user_info->id, $employee_info->id]) }}" class="btn btn-primary w-24 ml-2">Return</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Wizard Layout -->
        </div>
    @endsection
