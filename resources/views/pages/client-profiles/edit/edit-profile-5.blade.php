@extends('layout.master')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Edit Client Profile
            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="{{ route('edit_client_profile_1', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                    <a href="{{ route('edit_client_profile_2', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="users"></i> Family Composition </a>
                    <a href="{{ route('edit_client_profile_3', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="{{ route('edit_client_profile_4', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Information </a>
                    <a href="{{ route('edit_client_profile_5', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium"> <i class="w-4 h-4 mr-2"
                            data-lucide="file-text"></i> Background Information </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>

        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <form method="POST" action="{{ route('edit_client_profile_5_next') }}" enctype="multipart/form-data">
                @csrf
                <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box lg:mt-5">
                    <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">

                        <div class="font-medium text-base">Background Information</div>
                        <div class="mt-3">
                            <label for="update-profile-form-5" class="font-medium text-base form-label">Background Information (Kalagayan ng Pasyente, Pamilya, Finansya, Emosyonal, Physical)</label>
                            <textarea id="background-info" name="backgroundInfo" class="form-control" placeholder="Input text here">{{ $client_profile_info->background_info }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="font-medium form-label m-3 mt-2">File Uploaded:</label>
                        <div class="w-52 m-3">
                            <div
                                class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                                <div class="h-40 relative image-fit mx-auto">
                                    @if ( !empty($client_profile_info->background_info_attachment) )
                                        <img src="{{ asset('storage/'.$client_profile_info->background_info_attachment) }}" id="currentPictureBG" alt="Background Info File" style="display:block;">
                                    @else
                                        <p class="text-center font-medium pt-20" alt="Background Info File" id="currentPictureBG" style="display:block;">No File Uploaded</p>
                                    @endif
                                    <img id="previewBG" src="#" alt="Background Info File" class="rounded-md" style="display:none;">
                                </div>
                                <div class="mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="btn btn-primary w-full">Change File</button>
                                    <input type="file" name="pictureBG" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImage1(event)">
                                    <input type="hidden" name="pictureBGBackup" value="{{ $client_profile_info->picture ?? null }}">
                                </div>
                            </div>
                        </div>

                        <div class="m-3 mt-10">
                            <label for="update-profile-form-5" class="font-medium text-base form-label mt-10">Action Taken/ Services Rendered</label>
                            <textarea id="action-taken" name="actionTaken" class="form-control" placeholder="Input text here">{{ $client_profile_info->action_taken }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="font-medium form-label m-3 mt-2">File Uploaded:</label>
                        <div class="w-52 m-3">
                            <div
                                class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                                <div class="h-40 relative image-fit mx-auto">
                                    @if ( !empty($client_profile_info->action_taken_attachment) )
                                        <img src="{{ asset('storage/'.$client_profile_info->action_taken_attachment) }}" id="currentPictureBG" alt="Action Taken File" style="display:block;">
                                    @else
                                        <p class="text-center font-medium pt-20" alt="Action Taken File" id="currentPictureAT" style="display:block;">No File Uploaded</p>
                                    @endif
                                    <img id="previewAT" src="#" alt="Action Taken File" class="rounded-md" style="display:none;">
                                </div>
                                <div class="mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="btn btn-primary w-full">Change File</button>
                                    <input type="file" name="pictureAT" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImage2(event)">
                                    <input type="hidden" name="pictureATBackup" value="{{ $client_profile_info->picture ?? null }}">
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 pb-5">
                            <a class="btn btn-secondary w-24 ml-2"
                                href="{{ route('edit_client_profile_4', [$user_info->id, $client_profile_info->id]) }}">Previous</a>
                            <button type="submit" class="btn btn-primary w-24 ml-2">Finish</button>
                        </div>
                        <!-- END: Wizard Layout -->
                    </div>
                </div>
        </div>
    </div>
    </form>
    <script>
        function previewImage1(event) {
            var input = event.target;
            var placeholder = document.getElementById('currentPictureBG');
            var preview = document.getElementById('previewBG');
            var reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
                placeholder.style.display = 'none';
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
        function previewImage2(event) {
            var input = event.target;
            var placeholder = document.getElementById('currentPictureAT');
            var preview = document.getElementById('previewAT');
            var reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
                placeholder.style.display = 'none';
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    </script>
    <!-- END: Content -->
@endsection
