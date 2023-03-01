@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Add Profile
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div
            class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">
            <div class="intr o-x lg:text-center flex items-center lg:block flex-1 z-10">
                <a href="{{ route('add_profile_privacy') }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400" ><i
                            data-lucide="shield"></i></button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Privacy Notice
                </a>
                </div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_profile_1') }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400" >1</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Personal Information</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_profile_2') }}"> 
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">2</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Family Composition</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary">3</button>
                <div class="g:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Setup Medical Conditon</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400" disabled>4</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Contact Persons</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400" disabled>5</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Background Information</div>
            </div>

        </div>
        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-medium text-base">Medical Condition</div>
            <div class="grid grid-cols-10 gap-4 gap-y-5 mt-5">
                <div class="col-span-2 2xl:col-span-1">
                    <label for="update-profile-form-3-tomselected" class="form-label"
                        id="update-profile-form-3-ts-label">Ano Sakit?</label>
                    <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                        tabindex="-1" hidden="hidden">
                        <option value="1" selected="true">Option</option>
                        <option value="2">Option 1</option>
                        <option value="3">Option 2</option>
                        <option value="2">Option 3</option>
                        <option value="3">Option 4</option>

                    </select>
                </div>
                <div class="col-span-2 2xl:col-span-1">
                    <label for="update-profile-form-3-tomselected" class="form-label"
                        id="update-profile-form-3-ts-label">Gamot na Iniinom?</label>
                    <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                        tabindex="-1" hidden="hidden">
                        <option value="1" selected="true">Option</option>
                        <option value="2">Option 1</option>
                        <option value="3">Option 2</option>
                        <option value="2">Option 3</option>
                        <option value="3">Option 4</option>

                    </select>
                </div>
                <div class="col-span-2 2xl:col-span-1">
                    <label for="update-profile-form-3-tomselected" class="form-label"
                        id="update-profile-form-3-ts-label">Dosage </label>
                    <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                        tabindex="-1" hidden="hidden">
                        <option value="1" selected="true">College</option>
                        <option value="2">College</option>
                        <option value="3">High School</option>
                        <option value="3">Elementary</option>

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
                <div class="intro-y flex items-center justify-center sm:justify-end mt-5 col-span-2 2xl:col-span-1">
                    <button class="btn btn-primary w-50 ml-2">Add Response</button>
                </div>
            </div>
            <div class="grid grid-cols-10 gap-4 gap-y-5 mt-5">
                <div class="col-span-2 2xl:col-span-1">
                    <label for="update-profile-form-3-tomselected" class="form-label"
                        id="update-profile-form-3-ts-label">Mga naging Operasyon?</label>
                    <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                        tabindex="-1" hidden="hidden">
                        <option value="1" selected="true">Option</option>
                        <option value="2">Option 1</option>
                        <option value="3">Option 2</option>
                        <option value="2">Option 3</option>
                        <option value="3">Option 4</option>
                    </select>
                </div>
                <div class="col-span-2 2xl:col-span-1 mt-3">
                    <label for="startDate">Petsa ng Operation</label>
                    <input id="startDate" class="form-control" type="date" />
                    <span id="startDateSelected"></span>
                </div>
                <div class="intro-y flex items-center justify-center sm:justify-end mt-5 col-span-2 2xl:col-span-1">
                    <button class="btn btn-primary w-50 ml-2">Add Response</button>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                <div class="mt-3 col-span-3 2xl:col-span-1">
                    <label for="update-profile-form-1" class="form-label">Hospital</label>
                    <input id="update-profile-form-1" type="text" class="form-control" placeholder="Hospital"
                        value="Hospital">
                </div>
                <div class="mt-3  col-span-3 2xl:col-span-1">
                    <label for="update-profile-form-1" class="form-label">Doctor</label>
                    <input id="update-profile-form-1" type="text" class="form-control" placeholder="Doctor"
                        value="Doctor">
                </div>
                <div class="mt-3 col-span-3 2xl:col-span-1">
                    <label for="update-profile-form-1" class="form-label">Do you have Phil-health Card? Please
                        Specify</label>
                    <input id="update-profile-form-1" type="text" class="form-control" placeholder="Input here"
                        value="Phil-health Card">
                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <a href="{{ route('add_profile_2') }}"> 
                        <button class="btn btn-secondary w-24 ml-2">Previous</button>
                    </a>
                    <a href="{{ route('add_profile_4') }}"> 
                        <button class="btn btn-primary w-24 ml-2">Next</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Wizard Layout -->
    </div>
@endsection
