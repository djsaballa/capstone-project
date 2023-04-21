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
                <a href="{{ route('add_client_profile_2', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">2</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Family
                        Composition</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_3', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">3</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Medical
                        Conditon</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_4', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">4</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Contact
                        Persons</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary">5</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Setup Background Information</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>5</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Review</div>
            </div>
        </div>
        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="">
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
            <form method="POST" action="{{ route('add_client_profile_5_next') }}">
                @csrf
                @php
                    $old_input = session('client_profile_add');
                @endphp
                <div class="mt-3">
                    <label for="update-profile-form-5" class="font-medium text-base form-label">Background Information (Kalagayan ng Pasyente, Pamilya, Finansya, Emosyonal, Physical)</label>
                    <textarea id="background-info" name="backgroundInfo" class="form-control" placeholder="Input text here">{{ old('backgroundInfo', $old_input['background_info'] ?? null) }}</textarea>
                </div>
                <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                <div data-single="true" action="/file-upload" class="dropzone">
                    <div class="fallback"> <input id="background-info-attachment" name="backgroundInfoAttachment" type="file" /> </div>
                    <div class="dz-message" data-dz-message>
                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                        <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                class="font-medium">not</span> actually uploaded. </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="update-profile-form-5" class="font-medium text-base form-label mt-10">Action Taken/ Services Rendered</label>
                    <textarea id="action-taken" name="actionTaken" class="form-control" placeholder="Input text here">{{ old('actionTaken', $old_input['action_taken'] ?? null) }}</textarea>
                </div>
                <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                <div data-single="true" action="/file-upload" class="dropzone">
                    <div class="fallback"> <input id="action-taken-attachment" name="actionTakenAttachment" type="file" /> </div>
                    <div class="dz-message" data-dz-message>
                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                        <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                class="font-medium">not</span> actually uploaded. </div>
                    </div>
                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <a href="{{ route('add_client_profile_4', $user_info->id) }}" class="btn btn-secondary w-24 ml-2">Previous</a>
                    <button class="btn btn-primary w-24 ml-2" type="submit">Finish</button>
                </div>
            </form>
                <!-- END: Wizard Layout -->
        </div>
        <!-- END: Content -->
    </div>
@endsection
