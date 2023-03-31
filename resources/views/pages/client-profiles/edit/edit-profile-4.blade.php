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
            <!-- BEGIN: Wizard Layout -->
            <form method="POST" action="{{ route('edit_profile_4_next') }}">
                @csrf
                <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                <div class="intro-y box lg:mt-5">
                    <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="font-medium text-base">Contact Persons</div>
                        <div class="">
                            @foreach ($errors->all() as $error)
                                <p style="color: red;">{{ $error }}</p>
                            @endforeach
                        </div>
                        <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                            <div class="mt-3 col-span-3 2xl:col-span-1">
                                <label for="update-profile-form-1" class="form-label">Name</label>
                                <input id="contact-person1" name="contactPerson1" type="text" class="form-control"
                                    placeholder="Full Name" value="{{ $client_profile_info->contact_person1_name }}">
                            </div>
                            <div class="mt-3 col-span-3 2xl:col-span-1">
                                <label for="update-profile-form-1" class="form-label">Contact Number</label>
                                <input id="contact-person1" name="contactPerson1Number" type="text" class="form-control"
                                    placeholder="Input here"
                                    value="{{ $client_profile_info->contact_person1_contact_number }}">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                            <div class="mt-3 col-span-3 2xl:col-span-1">
                                <label for="update-profile-form-1" class="form-label">Name</label>
                                <input id="contact-person2" name="contactPerson2" type="text" class="form-control"
                                    placeholder="Full Name" value="{{ $client_profile_info->contact_person2_name }}">
                            </div>
                            <div class="mt-3 col-span-3 2xl:col-span-1">
                                <label for="update-profile-form-1" class="form-label">Contact Number</label>
                                <input id="contact-person2" name="contactPerson2Number" type="text" class="form-control"
                                    placeholder="Input here"
                                    value="{{ $client_profile_info->contact_person2_contact_number }}">
                            </div>
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mb-5">
                                <a href="{{ route('edit_profile_3', [$user_info->id, $client_profile_info->id]) }}" class="btn btn-secondary w-24 ml-2">Previous</a>
                                <button type="submit" class="btn btn-primary w-24 ml-2">Next</button>
                            </div>
                        </div>
                    </div>
                    <!-- END: Wizard Layout -->
                </div>
        </div>
    </div>
    </form>
    <!-- END: Content -->
@endsection
