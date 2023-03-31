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
            <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary"><i data-lucide="shield"></i></button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Privacy Notice</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>1</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Personal
                    Information</div>
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

        </div>
        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-large text-base">Privacy Notice</div>
            <div class="intro-y col-span-12 sm:col-span-6">
                <p>In compliance with data privacy laws, We ADD Foundation International Incorporated, collect and process
                    your personal information for ADDFII Profiling Registration, keeping them securely and with
                    confidentiality using technical, organizational and physical security measures, and retain them in
                    accordance with our Retention Policy. We don’t share them to any external group without your consent,
                    unless otherwise stated in our Privacy Notice. You have right to be informed, to object, to access, to
                    rectify, to erase or to block the processing of your personal information. As well as your right to data
                    portability, to file a complaint and be entitled to damages for violation of your rights. </p>
            </div>
            <div class="form-check form-switch mt-5">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">I Accept</label>
            </div>
            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                <a href="{{ route('list_of_profiles', $user_info->id) }}">
                    <button class="btn btn-secondary w-24 ml-2">Cancel</button>
                </a>
                <a href="{{ route('add_profile_1', $user_info->id) }}">
                    <button class="btn btn-primary w-24 ml-2">Next</button>
                </a>
            </div>

        </div>
    </div>
    <!-- END: Wizard Layout -->
    </div>
@endsection
