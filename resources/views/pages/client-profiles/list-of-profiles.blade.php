@extends('layout.master')

@section('content')
    @if (Session::has('status'))
        <div class="mt-10" style="color: green;">
            <ul>
                <li>{{ Session::get('status') }}</li>
            </ul>
        </div>
    @endif
    @if (Session::has('status!'))
        <div class="mt-10" style="color: green;">
            <ul>
                <li>{{ Session::get('status') }}</li>
            </ul>
        </div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">
        List of Profiles
    </h2>
    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('add_profile_privacy', $user_info->id) }}">
                <button class="btn btn-primary shadow-md mr-2">Add New Profiles</button>
            </a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                                Print </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to Excel </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        </div>
        <!-- START DROPDOWN -->
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-5">
            <label for="regular-form-1" class="form-label">List of Division</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="list-of-profile-division-filter" name="list-of-profile-division-filter">
                    <option selected disabled hidden>Select Division</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->division }}</option>
                    @endforeach
                </select>
            </div>
            <label for="regular-form-1" class="form-label">List of District</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="list-of-profile-district-filter" name="list-of-profile-district-filter" disabled>
                    <option selected disabled hidden>Select District</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->district }}</option>
                    @endforeach
                </select>
            </div>
            <label for="regular-form-1" class="form-label">List of Locale</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="list-of-profile-locale-filter" name="list-of-profile-locale-filter"disabled>
                    <option selected disabled hidden>Select Locale</option>
                    @foreach ($locales as $locale)
                        <option>{{ $locale->locale }}</option>
                    @endforeach
                </select>
            </div>
            <label for="regular-form-1" class="form-label">Status</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2 ">
                    <option>Status 1</option>
                    <option>Status 2</option>
                    <option>Status 3</option>
                    <option>Status 4</option>
                    <option>Status 5</option>
                </select>
            </div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0 text-slate-500">
                <button class="btn btn-primary w-24 ml-2">Go</button>
                <button class="btn btn-secondary w-24 ml-2">Reset</button>
            </div>
        </div>
        <!-- END DROPDOWN -->
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible mt-5">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap"> </th>
                        <th class="whitespace-nowrap">Client's Name</th>
                        <th class="text-center whitespace-nowrap">Gender</th>
                        <th class="text-center whitespace-nowrap">Contact Number</th>
                        <th class="text-center whitespace-nowrap">Last Interaction</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($client_profiles as $client_profile)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                            src=" {{ asset('dist/images/preview-4.jpg') }}"
                                            title="Uploaded at 18 April 2021">
                                    </div>
                            </td>
                            <td>
                                <a href=""
                                    class="font-medium whitespace-nowrap">{{ $client_profile->getFullName($client_profile->id) }}</a>
                            </td>
                            <td class="text-center">{{ $client_profile->gender }}</td>
                            <td class="w-40">
                                <div class="flex items-center justify-center ">{{ $client_profile->contact_number }}</div>
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center "> KNP </div>
                            </td>
                            <td class="table-report__action w-400">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 "
                                        href="{{ route('view_profile_1', [$user_info->id, $client_profile->id]) }}"> <i
                                            data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                                    <a class="flex items-center mr-3"
                                        href="{{ route('edit_profile_1', [$user_info->id, $client_profile->id]) }}"> <i
                                            data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                            class="w-4 h-4 mr-1"></i> Archive </a>
                                    <a class="flex items-center mr-3"
                                        href="{{ route('view_progress_report', [$user_info->id, $client_profile->id]) }}">
                                        <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Pagination -->
        <div class="intro-y p-5 text-slate-500 grid justify-center">
            <div class="flex justify-center">
                Showing {{ $client_profiles->firstItem() }} to {{ $client_profiles->lastItem() }} of {{ $client_profiles->total() }} items
            </div>
            <div class="flex justify-center">
                {{ $client_profiles->links() }}
            </div>
        </div>
        <!-- END: Pagination -->
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete this client profile?
                                <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <a href="{{ route('delete_profile', [$user_info->id, $client_profile->id]) }}" class="btn btn-danger w-24">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
    </div>
    <script>
        $(document).ready(function() {
            $('#list-of-profile-division-filter').on('change', function() {
                var division_id = $(this).val();
                console.log(division_id)
                if(division_id) {
                    $.ajax({
                        url: '/get-district-options/' + division_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#list-of-profile-district-filter').empty();
                            $.each(data, function(key, value) {
                                $('#list-of-profile-district-filter').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                            console.log(key, value);
                            $('#list-of-profile-district-filter').prop('disabled', false);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                } else {
                    $('#list-of-profile-district-filter').prop('disabled', true);
                    $('#list-of-profile-district-filter').empty();
                }
            });
        });
    </script>
@endsection
