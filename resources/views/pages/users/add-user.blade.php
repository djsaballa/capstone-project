@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Add User
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Create User Profile
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
                                    placeholder="username@gmail.com" value="username@gmail.com">
                            </div>
                            <div class="mt-3">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control mt-2" id="exampleInputPassword1"
                                    placeholder="Password" value="Password">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Role</label>
                                <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                    tabindex="-1" hidden="hidden">
                                    <option value="1" selected="true">Division 1</option>
                                    <option value="2">Social Worker</option>
                                    <option value="3">Doctor-Coordinator</option>
                                    <option value="4">Doctor</option>
                                    <option value="5">...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">First Name</label>
                                <input id="update-profile-form-1" type="text" class="form-control"
                                    placeholder="First Name" value="First Name">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">Middle Name</label>
                                <input id="update-profile-form-1" type="text" class="form-control"
                                    placeholder="Middle Name" value="Middle Name">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">Last Name</label>
                                <input id="update-profile-form-1" type="text" class="form-control"
                                    placeholder="Last Namem" value="Last Name">
                            </div>

                        </div>
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Division</label>
                                <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                    tabindex="-1" hidden="hidden">
                                    <option value="1" selected="true">Division 1</option>
                                    <option value="2">Division 1</option>
                                    <option value="3">Division 2</option>

                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">District</label>
                                <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                    tabindex="-1" hidden="hidden">
                                    <option value="1" selected="true">District 1</option>
                                    <option value="2">District 1</option>
                                    <option value="3">District 2</option>

                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Locale</label>
                                <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                    tabindex="-1" hidden="hidden">
                                    <option value="1" selected="true">Locale 1</option>
                                    <option value="2">Locale 1</option>
                                    <option value="3">Locale 2</option>

                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                <input id="update-profile-form-4" type="text" class="form-control"
                                    placeholder="Input text" value="09123456789">
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
            </div>
            <!-- END: Wizard Layout -->
        </div>
    @endsection
