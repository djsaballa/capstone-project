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
                        class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium"> <i class="w-4 h-4 mr-2"
                            data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="{{ route('edit_client_profile_4', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Information </a>
                    <a href="{{ route('edit_client_profile_5', [$user_info->id, $client_profile_info->id]) }}"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="file-text"></i> Background Information </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>

        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box lg:mt-5">
                <!-- MEDICAL CONDITION -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto" id="medical-condition">
                            Medical Condition
                        </h2>
                    </div>
                    @if (Session::has('status'))
                        <div class="alert alert-success text-center text-white">
                            <p>{{ Session::get('status') }}</p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="px-5 sm:px-20 mt-5 pt-5">
                        <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                            <div class="intro-y box lg:mt-5">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="bg-primary">
                                            <th scope="col">Ano Sakit?</th>
                                            <th scope="col">Kailan Pa?</th>
                                            <th scope="col">Gamot na Iniinom?</th>
                                            <th scope="col">Dosage?</th>
                                            <th scope="col">Gaano Kadalas Inumin?</th>
                                            <th scope="col">Hospital</th>
                                            <th scope="col">Doctor </th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medical_conditions as $medical_condition)
                                            <form></form>
                                            <form method="POST" action="{{ route('edit_client_profile_3_medcon_next') }}">
                                                @csrf
                                                <tr>
                                                    <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                                                    <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                                                    <input id="med-con-id" name="medConId" value="{{$medical_condition->id }}" hidden>
                                                    <td scope="row">
                                                        <select id="medical-condition-name" name="medicalConditionName" data-search="true" class="tom-select w-full tomselected"
                                                            tabindex="-1" hidden="hidden">
                                                            <option value="{{ $medical_condition->disease_id }}" selected="true"> {{ $medical_condition->disease->getName($medical_condition->disease_id) }} </option>
                                                            @foreach ($diseases as $disease)
                                                                <option value="{{ $disease->id }}">{{ $disease->disease }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="medical-condition-date" name="medicalConditionDate" value="{{ $medical_condition->since_when }}" class="form-control" type="date">
                                                    </td>
                                                    <td>
                                                        <input id="medical-condition-medicine-supplement"
                                                            name="medicalConditionMedicineSupplement"
                                                            value=" {{ $medical_condition->medicine_supplements }}"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input id="medical-condition-dosage" name="medicalConditionDosage"
                                                            value=" {{ $medical_condition->dosage }}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input id="medical-condition-frequency" name="medicalConditionFrequency"
                                                            value=" {{ $medical_condition->frequency }}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input id="medical-condition-hospital" name="medicalConditionHospital" value="{{ $medical_condition->hospital }}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input id="medical-doctor" name="medicalDoctor" value="{{ $medical_condition->doctor }}" class="form-control">
                                                    </td>
                                                    <td> 
                                                        <button class="btn btn-primary flex items-center mr-3 " type="submit">
                                                        <i data-lucide="save" class="w-4 h-4 mr-1"></i> Save </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 sm:px-20 mt-5 pt-1">
                        <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                            <div class="intro-y box lg:mt-5">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="bg-primary">
                                            <th scope="col">Naging Operasyon</th>
                                            <th scope="col">Petsa</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medical_conditions as $medical_condition)
                                            @php
                                                $matching_objects = $medical_operations->where('medical_condition_id', $medical_condition->id);
                                            @endphp
        
                                            @if ($matching_objects->first())
                                                @foreach ($matching_objects as $matching_object)
                                                    <form> </form>
                                                    <form method="POST" action="{{ route('edit_client_profile_3_operation_next') }}">
                                                    @csrf
                                                        <tr>
                                                            <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                                                            <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                                                            <input id="operation-id" name="operationId" value="{{$matching_object->id }}" hidden>
                                                            <td>
                                                                <input id="operation" name="operation" value="{{ $matching_object->operation }}" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input id="operation-date" name="operationDate" value="{{ $matching_object->date }}" class="form-control" type="date" />
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary flex items-center mr-3 " type="submit">
                                                                <i data-lucide="save" class="w-4 h-4 mr-1"></i> Save </button>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>None</td>
                                                    <td>None</td>
                                                    <td>None</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 sm:px-20 mt-5 pt-1">
                        <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                            <div class="intro-y lg:mt-5">
                                <form method="POST" action="{{ route('edit_client_profile_3_philhealth_next') }}">
                                    @csrf
                                    <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                                    <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                                    <div class="mt-3">
                                        <div class="col-span-6 2xl:col-span-3">
                                            <label for="update-profile-form-1" class="form-label">
                                                Are you a Philhealth Member?
                                            </label>
                                            <select id="philhealth_member" name="philhealthMember" data-search="true" class="tom-select w-full tomselected"
                                                tabindex="-1" hidden="hidden">
                                                <option value="{{ $client_profile_info->philhealth_member }}" selected="true" > {{ $client_profile_info->philhealth_member }} </option>
                                                @if( $client_profile_info->philhealth_member == 'Yes')
                                                <option value="No"> No </option>
                                                @elseif( $client_profile_info->philhealth_member == 'No')
                                                <option value="Yes"> Yes </option>
                                                @endif
                                            </select>
                                            <label for="update-profile-form-1" class="form-label">
                                                Other health card, please specify:
                                            </label>
                                            <input id="health_card" name="healthCard" type="text" class="form-control" placeholder="Specify Here" value="{{ $client_profile_info->health_card }}">
                                        </div>
                                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end m-5">
                                            <a class="btn btn-secondary w-24 ml-2"
                                                href="{{ route('edit_client_profile_2', [$user_info->id, $client_profile_info->id]) }}">Previous</a>
                                            <button class="btn btn-primary w-24 ml-2" type="submit">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MEDICAL CONDITION -->
            </div>
        </div>
        <!-- END: Wizard Layout -->
    <!-- END: Content -->
@endsection
