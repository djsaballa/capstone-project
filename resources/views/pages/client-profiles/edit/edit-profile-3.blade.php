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
                    <a href="{{ route('edit_profile_1', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium">
                        <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                    <a href="{{ route('edit_profile_2', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="users"></i> Family Composition </a>
                    <a href="{{ route('edit_profile_3', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="{{ route('edit_profile_4', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Information </a>
                    <a href="{{ route('edit_profile_5', [$employee_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
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
                    <!-- MEDICAL CONDITION -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto" id="medical-condition">
                                Medical Condition
                            </h2>
                        </div>
                        <table class="table">
                            <thead class="table-dark">
                                <tr class="bg-primary">
                                    <th scope="col">Ano Sakit?</th>
                                    <th scope="col">Kailan Pa?</th>
                                    <th scope="col">Gamot na Iniinom?</th>
                                    <th scope="col">Dosage?</th>
                                    <th scope="col">Gaano Kadalas Inumin?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medical_conditions as $medical_condition)
                                    <tr>
                                        <th scope="row">
                                            {{ $medical_condition->disease->getName($medical_condition->disease_id) }}</th>
                                        <th scope="row">
                                            {{ $medical_condition->dateFormatMdY($medical_condition->since_when) }}</th>
                                        <td>{{ $medical_condition->medicine_supplements }}</td>
                                        <td>{{ $medical_condition->dosage }}</td>
                                        <td>{{ $medical_condition->frequency }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="bg-primary">
                                        <th scope="col">Naging Operasyon</th>
                                        <th scope="col">Petsa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medical_conditions as $medical_condition)
                                        @php
                                            $matching_objects = $medical_operations->where('medical_condition_id', $medical_condition->id);
                                        @endphp

                                        @if ($matching_objects->first())
                                            @foreach ($matching_objects as $matching_object)
                                                <tr>
                                                    <td scope="row">{{ $matching_object->operation }}</td>
                                                    <td scope="row">
                                                        {{ $medical_condition->dateFormatMdY($matching_object->date) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <th scope="row">None</th>
                                                <th scope="row">None</th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <table class="table">
                            <thead class="table-dark">
                                <tr class="bg-primary">
                                    <th scope="col">Hospital</th>
                                    <th scope="col">Doctor </th>
                                    <th scope="col">Do you have Phil-health Card? Please
                                        Specify </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medical_conditions as $medical_condition)
                                    <tr>
                                        <th scope="row">{{ $medical_condition->hospital }}</th>
                                        <td>{{ $medical_condition->doctor }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end m-5">
                            <a class="btn btn-secondary w-24 ml-2"
                                href="{{ route('edit_profile_2', [$employee_info->id, $client_profile_info->id]) }}">Previous</a>
                            <a class="btn btn-primary w-24 ml-2"
                                href="{{ route('edit_profile_4', [$employee_info->id, $client_profile_info->id]) }}">Next</a>
                        </div>
                    </div>
                    
                    <!-- END MEDICAL CONDITION -->
                    
                </div>
        </div>
        <!-- END: Wizard Layout -->
    </form>
    <!-- END: Content -->
@endsection
