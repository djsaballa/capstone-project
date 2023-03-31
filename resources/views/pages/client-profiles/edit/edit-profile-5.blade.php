@extends('layout.master')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Edit Profile
            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="{{ route('edit_profile_1', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium">
                        <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                    <a href="{{ route('edit_profile_2', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="users"></i> Family Composition </a>
                    <a href="{{ route('edit_profile_3', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="{{ route('edit_profile_4', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Information </a>
                    <a href="{{ route('edit_profile_5', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="file-text"></i> Background Information </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>

        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <form method="POST" action="{{ route('edit_profile_5_next') }}">
                @csrf
                <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box lg:mt-5">
                    <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">

                        <div class="font-medium text-base">Background Information</div>
                        <div class="mt-3">
                            <label for="update-profile-form-5" class="form-label">BACKGROUND INFO (KALAGAYAN NG
                                PASYENTE,
                                PAMILYA, FINANSYAL, EMOSYONAL, PHYSICAL)</label>
                            <textarea id="background-info" name="backgroundInfo" class="form-control" placeholder="Input text here">{{ $client_profile_info->background_info }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                        <form data-single="true" action="/file-upload" class="dropzone">
                            <div class="fallback"> <input name="file" type="file" /> </div>
                            <div class="dz-message" data-dz-message>
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                        class="font-medium">not</span> actually uploaded. </div>
                            </div>
                        </form>
                        <div class="mt-3">
                            <label for="update-profile-form-5" class="form-label">ACTION TAKEN/ SERVICES
                                RENDERED</label>
                            <textarea id="action-taken" name="actionTaken" class="form-control" placeholder="Input text here">{{ $client_profile_info->action_taken }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                        <form data-single="true" action="/file-upload" class="dropzone">
                            <div class="fallback"> <input name="file" type="file" /> </div>
                            <div class="dz-message" data-dz-message>
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                        class="font-medium">not</span> actually uploaded. </div>
                            </div>
                        </form>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <a class="btn btn-secondary w-24 ml-2"
                                href="{{ route('edit_profile_4', [$user_info->id, $client_profile_info->id]) }}">Previous</a>
                            <button type="submit" class="btn btn-primary w-24 ml-2">Finish</button>
                        </div>
                        <!-- END: Wizard Layout -->
                    </div>
                </div>
        </div>
    </div>
    </form>
    <!-- END: Content -->
@endsection
