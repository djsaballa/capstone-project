@extends('layout.master')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit User
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Update User Profile
                    </h2>
                </div>
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
                <div class="p-5">
                <form method="POST" action="{{ route('edit_user_save') }}">
                        @csrf
                        <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                        <input id="employee-id" name="employeeId" value="{{ $employee_info->id }}" hidden>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-6 2xl:col-span-3">
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">First Name</label>
                                    <input id="first-name" name="firstName" type="text" class="form-control"
                                        placeholder="First Name" value="{{ $employee_info->first_name }}">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">Middle Name</label>
                                    <input id="middle-name" name="middleName" type="text" class="form-control"
                                        placeholder="Middle Name" value="{{ $employee_info->middle_name }}">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">Last Name</label>
                                    <input id="last-name" name="lastName" type="text" class="form-control"
                                        placeholder="Last Name" value="{{ $employee_info->last_name }}">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">Role</label>
                                    <select id="role" name="role" data-search="true" class="tom-select w-full tomselected"
                                        tabindex="-1" hidden="hidden">
                                        <option value="{{ $employee_info->role_id }}" selected="true"> {{ $employee_info->getRoleName($employee_info->role_id) }} </option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-6 2xl:col-span-3">
                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">Division</label>
                                    <select id="division"  name="division" data-search="true" class="tom-select w-full tomselected"
                                        tabindex="-1" hidden="hidden">
                                        @if( !empty($employee_info->division_id) )
                                            <option value="{{ $employee_info->division_id }}" selected="true"> {{ $employee_info->getDivisionName($employee_info->division_id) }} </option>
                                        @else
                                            <option value="Select Division" selected="true" disabled> Select Division</option>
                                        @endif
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">District</label>
                                    <select id="district"  name="district" data-search="true" class="tom-select w-full tomselected"
                                        tabindex="-1" hidden="hidden">
                                        @if( !empty($employee_info->district_id) )
                                            <option value="{{ $employee_info->district_id }}" selected="true"> {{ $employee_info->getDistrictName($employee_info->district_id) }} </option>
                                        @else
                                            <option value="Select District" selected="true" disabled> Select District</option>
                                        @endif
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" >{{ $district->district }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">Locale</label>
                                    <select id="locale"  name="locale" data-search="true" class="tom-select w-full tomselected"
                                        tabindex="-1" hidden="hidden">
                                        @if( !empty($employee_info->locale_id) )
                                            <option value="{{ $employee_info->locale_id }}" selected="true"> {{ $employee_info->getLocaleName($employee_info->locale_id) }} </option>
                                        @else
                                            <option value="Select Locale" selected="true" disabled> Select Locale</option>
                                        @endif
                                        @foreach ($locales as $locale)
                                            <option value="{{ $locale->id }}">
                                                {{ $locale->locale }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                    <input id="contact-number"  name="contactNumber" type="text" class="form-control"
                                        placeholder="09123456789" value="{{ $employee_info->contact_number }}">
                                </div>
                            </div>
                            <div class="col-span-6 2xl:col-span-3">
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">Username</label>
                                    <input id="username" name="username" type="text" class="form-control"
                                        placeholder="Username" value="{{ $employee_info->username }}">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">Password</label>
                                    <input id="password" name="password" type="text" class="form-control"
                                        placeholder="Password" value="{{ $employee_info->password }}">
                                </div>
                            </div>
                            <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                <div
                                    class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img class="rounded-md" alt="Midone - HTML Admin Template"
                                            src="{{ asset('dist/images/profile-6.jpg') }}">
                                        <div
                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" icon-name="x"
                                                data-lucide="x" class="lucide lucide-x w-4 h-4">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <button class="btn btn-primary w-24 ml-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END: Change Password -->
        </div>
    </div>
    </div>
    <!-- END: Content -->
@endsection
