@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                View Client Profile
            </h2>
            
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="#personal-info" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                    <a href="#family-comp" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="users"></i> Family Composition </a>
                    <a href="#medical-condition" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i
                            class="w-4 h-4 mr-2" data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="{{ route('view_client_profile_2', [$user_info->id, $client_profile_info->id]) }}#contact-persons"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Persons </a>
                    <a href="{{ route('view_client_profile_2', [$user_info->id, $client_profile_info->id]) }}#background-info"
                        class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="file-text"></i> Background Information </a>
                </div>
            </div>
            @include('components.doctor-remarks')
            @include('components.remarks')
            <!-- END: File Manager Menu -->
        </div>

        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Wizard Layout -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    <pack>{{ Session::get('error') }}</pack>
                </div>
            @endif
            @if (Session::has('status'))
                <div class="alert alert-success text-center text-white">
                    <p>{{ Session::get('status') }}</p>
                </div>
            @endif
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto" id="personal-info">
                        Personal Information
                    </h2>
                    <form action="{{route('view_pdf',[$user_info->id, $client_profile_info->id]) }}" method="post" target="__black">
                        @csrf
                        <button class="btn btn-primary shadow-md mr-2"> <i class="w-4 h-4 mr-2" data-lucide="file"></i> Export
                            to PDF</button>
                    </form>
                </div>
                    
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label font-medium">First
                                            Name:</label><span  class="ml-3">{{ $client_profile_info->first_name }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label font-medium">Middle
                                            Name:</label><span class="ml-3">{{ $client_profile_info->middle_name }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-1" class="form-label font-medium">Last
                                            Name:</label><span class="ml-3">{{ $client_profile_info->last_name }}</span></label>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label font-medium" for="startDate">Birthdate:</label><span class="ml-3">{{ $client_profile_info->dateFormatMdY($client_profile_info->birth_date) }}</span>
                                    </div>
                                </div>
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Gender:</label><span class="ml-3">{{ $client_profile_info->gender }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-4" class="form-label font-medium">Age:</label><span class="ml-3">{{ $client_profile_info->age }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Occupation:</label><span class="ml-3">{{ $client_profile_info->occupation }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label font-medium" for="startDate">Baptism Date:</label><span class="ml-3">{{ $client_profile_info->dateFormatMdY($client_profile_info->baptism_date) }}</span>
                                    </div>
                                </div>
                                <div class="col-span-6 2xl:col-span-3">
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label font-medium">Contact
                                            Number:</label> {{ $client_profile_info->contact_number }}</label>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Division:</label><span class="ml-3">{{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }}</span>
                                    </div>
                                    <div class="mt-3 ">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">District:</label><span class="ml-3">{{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}</span>
                                    </div>

                                    <div class="mt-3">
                                        <label for="update-profile-form-3-tomselected" class="form-label font-medium"
                                            id="update-profile-form-3-ts-label">Locale:</label><span class="ml-3">{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}</span>
                                    </div>
                                </div>
                                <div class="w-52 mx-auto xl:mr-0 xl:ml-6 mt-5">
                                    <div
                                        class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        @if ( !empty($client_profile_info->picture) )
                                            <img src="{{ asset('storage/'.$client_profile_info->picture) }}" class="rounded-md" alt="Client Image">
                                        @else
                                            <img alt="Client Image" class="rounded-md" src=" {{ asset('dist/images/profile-1.jpg')}}">
                                        @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="update-profile-form-5" class="form-label font-medium">Address</label>
                                    <textarea id="update-profile-form-5" class="form-control" placeholder="Address" disabled>{{ $client_profile_info->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- END PERSONAL INFO -->
                    </div>
                    <!-- START FAMILY COMPOSITION -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto" id="family-comp">
                                Family Composition
                            </h2>
                        </div>
                        <table class="table">
                            <thead class="table-dark">
                                <tr class="bg-primary">
                                    <th scope="col">Name</th>
                                    <th scope="col">Relationship</th>
                                    <th scope="col">Educational Attainment</th>
                                    <th scope="col">Occupation</th>
                                    <th scope="col">Tel. Number</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($medical_conditions->first())
                                @foreach ($family_compositions as $family_composition)
                                    <tr>
                                        <th scope="row">{{ $family_composition->getFullName($family_composition->id) }}
                                        </th>
                                        <td>{{ $family_composition->relationship }}</td>
                                        <td>{{ $family_composition->educational_attainment }}</td>
                                        <td>{{ $family_composition->occupation }}</td>
                                        <td>{{ $family_composition->contact_number }}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <th>None</th>
                                        <th>None</th>
                                        <th>None</th>
                                        <th>None</th>
                                        <th>None</th>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- END FAMILY COMPOSITION -->
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
                            @if($medical_conditions->first())
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
                            @else
                                    <tr>
                                        <th>None</th>
                                        <th>None</th>
                                        <th>None</th>
                                        <th>None</th>
                                        <th>None</th>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="bg-primary">
                                        <th scope="col">Naging Operasyon</th>
                                        <th scope="col">Petsa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($medical_operations->first())
                                        @foreach ($medical_operations as $medical_operation)
                                        <tr>
                                            <td>{{ $medical_operation->operation }}</td>
                                            <td>{{ $medical_operation->dateFormatMdY($medical_operation->date) }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th>None</th>
                                            <th>None</th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3 ">
                        <table class="table">
                            <thead class="table-dark">
                                <tr class="bg-primary">
                                    <th scope="col">Doctor </th>
                                    <th scope="col">Hospital</th>
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
                        <div class="mt-6 ml-3">
                            <label for="update-profile-form-1" class="form-label font-medium">Philhealth Member:</label>
                                <span  class="ml-3">{{ $client_profile_info->philhealth_member }}</span>
                        </div>
                        <div class="mt-2 ml-3">
                            <label for="update-profile-form-1" class="form-label font-medium">Other Health Cards:</label>
                                <span  class="ml-3">{{ $client_profile_info->health_card }}</span>
                        </div>
                    </div>
                        <!-- END MEDICAL CONDITION -->
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <a class="btn btn-primary w-24 ml-2"
                            href="{{ route('view_client_profile_2', [$user_info->id, $client_profile_info->id]) }}"> Next
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    @endsection
