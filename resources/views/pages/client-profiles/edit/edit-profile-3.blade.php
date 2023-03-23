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
    
    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
        <!-- BEGIN: Wizard Layout -->
        <form method="GET" action="">
            @csrf
        <div class="intro-y box lg:mt-5">
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base">Medical Condition</div>
                <div class="grid grid-cols-10 gap-4 gap-y-5 mt-5">
                    @foreach ($medical_conditions as $medical_condition)
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Ano Sakit?</label>
                            <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                tabindex="-1" hidden="hidden">
                                <option value="{{ $medical_condition->disease->getName($medical_condition->disease_id) }}" selected="true">{{ $medical_condition->disease->getName($medical_condition->disease_id) }}</option>
                                @foreach ($diseases as $disease)
                                    <option value="{{ $disease->disease }}">{{ $disease->disease }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Gamot na Iniinom?</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder="Medicine/Supplements" value="{{ $medical_condition->medicine_supplements }}">
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Dosage </label>
                            <input id="update-profile-form-1" type="text" class="form-control" placeholder="Dosage" value="{{ $medical_condition->dosage }}">
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Frequency</label>
                            <input id="update-profile-form-1" type="text" class="form-control" placeholder="Frequency" value="{{ $medical_condition->frequency }}">
                        </div>
                    @endforeach
                    <div
                        class="intro-y flex items-center justify-center sm:justify-end mt-5 col-span-2 2xl:col-span-1">
                        <button class="btn btn-primary w-50 ml-2">Add Response</button>
                    </div>
                </div>

                <div class="grid grid-cols-10 gap-4 gap-y-5 mt-5">
                    @foreach ($medical_conditions as $medical_condition)
                        @php
                            $matching_objects = $medical_operations->where('medical_condition_id', $medical_condition->id);
                        @endphp

                        @if($matching_objects->first())
                            @foreach ($matching_objects as $matching_object)
                            <div class="col-span-2 2xl:col-span-1">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Mga naging Operasyon?</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder="Operation" value="{{ $matching_object->operation }}">
                            </div>
                            <div class="col-span-2 2xl:col-span-1 mt-3">
                                <label for="startDate">Petsa ng Operation</label>
                                <input id="startDate" class="form-control" type="date" value="{{ $medical_condition->dateFormatMdY($matching_object->date) }}"/>
                                <span id="startDateSelected"></span>
                            </div>
                            @endforeach
                        @else
                            <div class="col-span-2 2xl:col-span-1">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Mga naging Operasyon?</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder="Operation" value="">
                            </div>
                            <div class="col-span-2 2xl:col-span-1 mt-3">
                                <label for="startDate">Petsa ng Operation</label>
                                <input id="startDate" class="form-control" type="date" value=""/>
                                <span id="startDateSelected"></span>
                            </div>
                        @endif
                    @endforeach
                    <div
                        class="intro-y flex items-center justify-center sm:justify-end mt-5 col-span-2 2xl:col-span-1">
                        <button class="btn btn-primary w-50 ml-2">Add Response</button>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    @foreach ($medical_conditions as $medical_condition)
                        <div class="mt-3 col-span-3 2xl:col-span-1">
                            <label for="update-profile-form-1" class="form-label">Hospital</label>
                            <input id="update-profile-form-1" type="text" class="form-control" placeholder="Hospital"
                                value="{{ $medical_condition->hospital }}">
                        </div>
                        <div class="mt-3  col-span-3 2xl:col-span-1">
                            <label for="update-profile-form-1" class="form-label">Doctor</label>
                            <input id="update-profile-form-1" type="text" class="form-control" placeholder="Doctor"
                                value="{{ $medical_condition->doctor }}">
                        </div>
                    @endforeach
                    <div class="mt-3 col-span-3 2xl:col-span-1">
                        <label for="update-profile-form-1" class="form-label">Do you have Phil-health Card?</label>
                        <input id="update-profile-form-1" type="text" class="form-control" placeholder="Input here"
                            value="Phil-health Card">
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mb-5">
                        <a class="btn btn-secondary w-24 ml-2" href="{{ route('edit_profile_2', [$employee_info->id, $client_profile_info->id]) }}">Previous</a>
                        <a class="btn btn-primary w-24 ml-2" href="{{ route('edit_profile_4', [$employee_info->id, $client_profile_info->id]) }}">Next</a>
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