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
                </a>
            </div>
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
            <button class="w-10 h-10 rounded-full btn btn-primary">3</button>
            <div class="g:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Setup Medical Conditon</div>
        </div>
        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
            <button
                class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                disabled>4</button>
            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Contact Persons
            </div>
        </div>
        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
            <button
                class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                disabled>5</button>
            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Background
                Information</div>
        </div>
        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
            <button
                class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                disabled>6</button>
            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Review</div>
        </div>

    </div>
    <form method="POST" action="{{ route('add_client_profile_3_next') }}">
        @csrf
        <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('status'))
            <div class="alert alert-success text-center text-white">
                <p>{{ Session::get('status') }}</p>
            </div>
        @endif
        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-medium text-base">Medical Condition</div>
            <table class="table table-bordered" id="dynamicAddRemoveMedCon">
                <tr>
                    <th>Illness or Disease</th>
                    <th>Medicine or Supplements</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Doctor</th>
                    <th>Hospital</th>
                </tr>
                <tr>
                    <td><select id="disease" name="medicalCondition[0][disease]" data-search="true"
                        class="w-full form-control" tabindex="-1">
                            <option value="" selected="true" disabled>Select Illness/Disease</option>
                            @foreach ($diseases as $disease)
                                <option value="{{ $disease->id }}">{{ $disease->disease }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="medicalCondition[0][medicine]" placeholder="Medicine/Supplement Name"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="medicalCondition[0][dosage]" placeholder="Dosage"
                            class="form-control" />
                    </td>
                    <td><input id="input-wizard-5" name="medicalCondition[0][frequency]" type="text"
                    class="form-control" placeholder="Frequency">
                    </td>
                    <td><input type="text" name="medicalCondition[0][doctor]" placeholder="Doctor"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="medicalCondition[0][hospital]" placeholder="Hospital"
                            class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar-med-con"
                            class="btn btn-outline-primary">Add Row</button></td>
                </tr>
            </table>

            <div class="mt-10 font-medium text-base">Operations</div>
            <table class="table table-bordered" id="dynamicAddRemoveOperation">
                <tr>
                    <th>Operation</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td><input type="text" name="medicalOperation[0][operation]" placeholder="Operation"
                            class="form-control" />
                    </td>
                    <td><input type="date" name="medicalOperation[0][date]"
                            class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar-operation"
                            class="btn btn-outline-primary">Add Row</button></td>
                </tr>
            </table>
            
            <div class="flex flex-col-reverse xl:flex-row flex-col">
                <div class="flex-1 mt-6 xl:mt-0">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-10 font-medium text-base">
                                <label for="update-profile-form-1" class="form-label">Do you have a Phil-health Card?</label>
                                <select id="philhealth" name="philhealth" data-search="true"
                                    class="w-full form-control" tabindex="-1">
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-10 font-medium text-base">
                                <label for="update-profile-form-1" class="form-label">Do you have other health cards?</label>
                                <input id="health-card" name="healthCard" type="text" class="form-control"
                                    placeholder=" If yes, please specify. If no, write 'No'" value="{{ old('healthCard', $old_input->health_card ?? null) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                <a href="{{ route('add_client_profile_1', $user_info->id) }}"
                    class="btn btn-secondary w-24">Previous</a>
                <button class="btn btn-primary w-24 ml-2">Next</button>
            </div>
        </div>
    </form>
    <!-- END: Wizard Layout -->
    </div>
    <script type="text/javascript">
        $("#dynamic-ar-med-con").click(function() {
            var j = 0;
            ++j;
            var table = document.getElementById('dynamicAddRemoveMedCon');
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            cell1.innerHTML = '<select id="disease" name="medicalCondition[' + j + '][disease]" data-search="true" class="w-full form-control" tabindex="-1"> <option value="" selected="true" disabled>Select Illness/Disease</option> @foreach ($diseases as $disease) <option value="{{ $disease->id }}">{{ $disease->disease }}</option> @endforeach </select>';
            cell2.innerHTML = '<input type="text" name="medicalCondition[' + j + '][medicine]" placeholder="Medicine/Supplement Name" class="form-control" />';
            cell3.innerHTML = '<input type="text" name="medicalCondition[' + j + '][dosage]" placeholder="Dosage" class="form-control" />';
            cell4.innerHTML = '<input id="input-wizard-5" name="medicalCondition[' + j + '][frequency]" type="text" class="form-control" placeholder="Frequency"></td>';
            cell5.innerHTML = '<input id="input-wizard-5" name="medicalCondition[' + j + '][doctor]" type="text" class="form-control" placeholder="Doctor"></td>';
            cell6.innerHTML = '<input id="input-wizard-5" name="medicalCondition[' + j + '][hospital]" type="text" class="form-control" placeholder="Hospital"></td>';
            cell7.innerHTML = '<button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>';
        });

        $("#dynamic-ar-operation").click(function() {
            var k = 0;
            ++k;
            var table = document.getElementById('dynamicAddRemoveOperation');
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = '<input type="text" name="medicalOperation[' + k + '][operation]" placeholder="Operation" class="form-control"/>';
            cell2.innerHTML = '<input type="date" name="medicalOperation['+ k +'][date]" class="form-control" />';
            cell3.innerHTML = '<button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>';
        });
    
        $(document).on('click', '.remove-input-field', function() {
            $(this).closest('tr').remove();
        });
    </script>
@endsection
