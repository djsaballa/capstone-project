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
                <div class="intro-y box py-10 sm:py-20">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto" id="family-comp">
                            Family Composition
                        </h2>
                    </div>
                    <div class="">
                        @foreach ($errors->all() as $error)
                            <p style="color: red;">{{ $error }}</p>
                        @endforeach
                    </div>
                    <div class="px-5 sm:px-20 mt-5 pt-5">
                        <div class="grid grid-cols-20 gap-4 gap-y-5 mt-5">
                            <!-- START FAMILY COMPOSITION -->
                            <div class="intro-y box lg:mt-5">

                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="bg-primary">
                                            <th scope="col">First Name</th>
                                            <th scope="col">Middle Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Relationship</th>
                                            <th scope="col">Educational Attainment</th>
                                            <th scope="col">Occupation</th>
                                            <th scope="col">Tel. Number</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($family_compositions as $family_composition)
                                            <form method="POST" action="{{ route('edit_profile_2_next') }}">
                                                @csrf
                                                <input id="employee-id" name="employeeId" value="{{ $employee_info->id }}" hidden>
                                                <input id="client-profile-id" name="clientProfileId" value="{{$client_profile_info->id }}" hidden>
                                                <input id="fam-comp-id" name="famCompId" value="{{$family_composition->id }}" hidden>
                                                <tr>
                                                    <td scope="row">
                                                        <input id="family-first-name" name="familyFirstName" value="{{ $family_composition->first_name }}" class="">
                                                    </td>
                                                    <td scope="row">
                                                        <input id="family-middle-name" name="familyMiddleName" value="{{ $family_composition->middle_name }}" class="">
                                                    </td>
                                                    <td scope="row">
                                                        <input id="family-last-name" name="familyLastName" value="{{ $family_composition->last_name }}" class="">
                                                    </td>
                                                    <td> 
                                                        <input id="family-relationship" name="familyRelationship" value="{{ $family_composition->relationship }}" class="" >
                                                    </td>
                                                    <td> 
                                                        <input id="family-educ" name="familyEduc" value="{{ $family_composition->educational_attainment }}" class="" >
                                                    </td>
                                                    <td> 
                                                        <input id="family-occupation" name="familyOccupation" value="{{ $family_composition->occupation }}" class="" >
                                                    </td>
                                                    <td> 
                                                        <input id="family-contact-number" name="familyContactNumber" value="{{ $family_composition->contact_number }}" class="" >
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
                            <!-- END FAMILY COMPOSITION -->
                        </div>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mb-5">
                            <a class="btn btn-secondary w-24 ml-2"
                                href="{{ route('edit_profile_1', [$employee_info->id, $client_profile_info->id]) }}">Previous</a>
                            <a class="btn btn-primary w-24 ml-2"
                                href="{{ route('edit_profile_3', [$employee_info->id, $client_profile_info->id]) }}">Next</a>
                        </div>
                    </div>
                    <!-- END: Wizard Layout -->
                </div>
        </div>
    </div>
    </form>

    <!-- END: Content -->
@endsection
