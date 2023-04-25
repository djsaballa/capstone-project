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
                    </div>
                </a>
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
                <button class="w-10 h-10 rounded-full btn btn-primary ">2</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Family Composition</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>3</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Medical
                    Conditon</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>4</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Contact
                    Persons</div>
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

        <form method="POST" action="{{ route('add_client_profile_2_next') }}">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif



            @if (Session::has('success'))
                <div class="alert alert-success text-center">

                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                    <p>{{ Session::get('success') }}</p>

                </div>
            @endif
            <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base">Family Composition</div>
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Name</th>
                        <th>Relationship</th>
                        <th>Educational Attainment</th>
                        <th>Occupation</th>
                        <th>Contact Number</th>

                    </tr>
                    <tr>
                        <td><input type="text" name="addMoreInputFields[0][name]" placeholder="Name"
                                class="form-control" />
                        </td>
                        <td><select id="update-profile-form-3" name="addMoreInputFields[0][relationship]" data-search="true"
                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                <option value="" selected="true" disabled>Select Relationship</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Brother">Brother</option>
                                <option value="Sister">Sister</option>
                            </select></td>
                        <td><select id="update-profile-form-3" name="addMoreInputFields[0][educational]" data-search="true"
                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                <option value="Select Educational Attainment" selected="true" disabled>Select Educational
                                    Attainment</option>
                                <option value="College Graduate">College Graduate</option>
                                <option value="High School Graduate">High School Graduate</option>
                                <option value="Elementary Graduate">Elementary Graduate</option>
                            </select>
                        </td>

                        <td><select id="update-profile-form-3" name="addMoreInputFields[0][occupation]" data-search="true"
                                class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                <option value="1" selected="true">None</option>
                                <option value="2">None</option>
                                <option value="3">Vendor</option>

                            </select></td>
                        <td><input id="input-wizard-5" name="addMoreInputFields[0][contact]" type="text"
                                class="form-control" placeholder="09123456789"></td>
                        <td><button type="button" name="add" id="dynamic-ar"
                                class="btn btn-outline-primary">Add</button></td>
                    </tr>
                </table>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <a href="{{ route('add_client_profile_1', $user_info->id) }}"
                        class="btn btn-secondary w-24">Previous</a>
                    <button class="btn btn-primary w-24 ml-2">Next</button>
                </div>
            </div>
    </div>
    </div>
    </form>
    <!-- END: Wizard Layout -->
    </div>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' +
                i +
                '][name]" placeholder="Name" class="form-control" /></td><td><select id="update-profile-form-3" name="addMoreInputFields[' +
                i +
                '][relationship]"  data-search="true" class="tom-select w-full tomselected" tabindex="-1" hidden="hidden"><option value="" selected="true" disabled>Select Relationship</option><option value="Father">Father</option><option value="Mother">Mother</option><option value="Brother">Brother</option><option value="Sister">Sister</option></select></td><td><select id="update-profile-form-3" name="addMoreInputFields[' +
                i +
                '][educational]" data-search="true" class="tom-select w-full tomselected"tabindex="-1" hidden="hidden"><option value="Select Educational Attainment" selected="true" disabled>Select Educational Attainment</option><option value="College Graduate">College Graduate</option><option value="High School Graduate">High School Graduate</option><option value="Elementary Graduate">Elementary Graduate</option></select></td><td><select id="update-profile-form-3" name="addMoreInputFields[' +
                i +
                '][occupation]"   data-search="true" class="tom-select w-full tomselected"tabindex="-1" hidden="hidden"><option value="1" selected="true">None</option><option value="2">None</option><option value="3">Vendor</option></select></td><td><input id="input-wizard-5" name="addMoreInputFields[' +
                i +
                '][contact]"  type="text" class="form-control" placeholder="09123456789"></td><td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
