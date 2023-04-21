@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Add Client Profile
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div
            class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">
            <div class="intr o-x lg:text-center flex items-center lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_privacy', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"><i
                            data-lucide="shield"></i></button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Privacy Notice
                    </div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_1', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">1</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Personal
                        Information</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>2</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Family
                    Composition</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>3</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Medical
                    Conditon</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>4</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Contact
                    Persons</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>5</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Background
                    Information</div>
            </div>
            
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary ">6</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Review</div>
            </div>
        </div>

        <form method="POST" action="{{ route('add_client_profile_2_next') }}">
            @csrf
            <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base">Family Composition</div>
                <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                    <div class="col-span-2 2xl:col-span-1">
                        <label for="input-wizard-1" class="form-label">Name</label>
                        <input id="input-wizard-1" type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-span-2 2xl:col-span-1">
                        <label for="update-profile-form-3-tomselected" class="form-label"
                            id="update-profile-form-3-ts-label">Relationship</label>
                        <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                            tabindex="-1" hidden="hidden">
                            <option value="" selected="true" disabled>Select Relationship</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                        </select>
                    </div>
                    <div class="col-span-2 2xl:col-span-1">
                        <label for="update-profile-form-3-tomselected" class="form-label"
                            id="update-profile-form-3-ts-label">Educational Attainment</label>
                        <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                            tabindex="-1" hidden="hidden">
                            <option value="Select Educational Attainment" selected="true" disabled>Select Educational Attainment</option>
                            <option value="College Graduate">College Graduate</option>
                            <option value="High School Graduate">High School Graduate</option>
                            <option value="Elementary Graduate">Elementary Graduate</option>
                        </select>
                    </div>
                    <div class="col-span-2 2xl:col-span-1">
                        <label for="update-profile-form-3-tomselected" class="form-label"
                            id="update-profile-form-3-ts-label">Occupation</label>
                        <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                            tabindex="-1" hidden="hidden">
                            <option value="1" selected="true">None</option>
                            <option value="2">None</option>
                            <option value="3">Vendor</option>

                        </select>
                    </div>
                    <div class="col-span-2 2xl:col-span-1">
                        <label for="input-wizard-5" class="form-label">Contact Number</label>
                        <input id="input-wizard-5" type="text" class="form-control" placeholder="09123456789">
                    </div>
                    <div class="intro-y flex items-center justify-center mt-5">
                        <button class="btn btn-primary w-50 ml-2">Add Response</button>
                    </div>

                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <a href="{{ route('add_client_profile_1', $user_info->id) }}" class="btn btn-secondary w-24">Previous</a>
                        <button class="btn btn-primary w-24 ml-2">Next</button>
                    </div>
                </div>
            </div>
    </div>
    </form>
    <!-- END: Wizard Layout -->
    </div>
@endsection
