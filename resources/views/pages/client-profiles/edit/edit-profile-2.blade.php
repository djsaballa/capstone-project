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
                <a href="{{ route('edit_profile_1', [$employee_info->id, $client_profile_info->id]) }}" class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium">
                    <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                <a href="{{ route('edit_profile_2', [$employee_info->id, $client_profile_info->id]) }}" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                        data-lucide="users"></i> Family Composition </a>
                <a href="{{ route('edit_profile_3', [$employee_info->id, $client_profile_info->id]) }}" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                        data-lucide="thermometer"></i> Medical Condition </a>
                <a href="{{ route('edit_profile_4', [$employee_info->id, $client_profile_info->id]) }}" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                        data-lucide="phone"></i> Contact Information </a>
                <a href="{{ route('edit_profile_5', [$employee_info->id, $client_profile_info->id]) }}" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                        data-lucide="file-text"></i> Background Information </a>
            </div>
        </div>
        <!-- END: File Manager Menu -->
    </div>
    <form method="GET" action="">
    @csrf
    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
        <!-- BEGIN: Wizard Layout -->
        <div class="intro-y box py-10 sm:py-20 mt-5">
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base">Family Composition</div>
                <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                    @foreach ($family_compositions as $family_composition)
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="input-wizard-1" class="form-label">Name</label>
                            <input id="input-wizard-1" type="text" class="form-control" placeholder="Full Name" value="{{ $family_composition->getFullName($family_composition->id) }}">
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Relationship</label>
                            <select id="update-profile-form-3" data-search="true"
                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                <option value="{{ $family_composition->relationship }}" selected="true">{{ $family_composition->relationship }}</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Brother">Brother</option>
                                <option value="Sister">Sister</option>
                            </select>
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Educational Attainment</label>
                            <select id="update-profile-form-3" data-search="true"
                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                <option value="{{ $family_composition->educational_attainment }}" selected="true">{{ $family_composition->educational_attainment }}</option>
                                <option value="College Graduate">College Graduate</option>
                                <option value="High School Graduate">High School Graduate</option>
                                <option value="Elementary Graduate">Elementary Graduate</option>

                            </select>
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Occupation</label>
                            <input id="input-wizard-4" type="text" class="form-control" placeholder="Occupation" value="{{ $family_composition->occupation }}">
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="input-wizard-5" class="form-label">Contact Number</label>
                            <input id="input-wizard-5" type="text" class="form-control" placeholder="09123456789" value="{{ $family_composition->contact_number }}">
                        </div>
                    @endforeach
                    <div class="intro-y flex items-center justify-center mt-5">
                        <button class="btn btn-primary w-50 ml-2">Add Response</button>
                    </div>

                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <a class="btn btn-secondary w-24" href="{{ route('edit_profile_1', [$employee_info->id, $client_profile_info->id]) }}">Previous</a>
                        <a class="btn btn-primary w-24 ml-2" href="{{ route('edit_profile_3', [$employee_info->id, $client_profile_info->id]) }}">Next</a>
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