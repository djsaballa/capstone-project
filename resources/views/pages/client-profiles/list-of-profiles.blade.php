@extends('layout.master')

@section('content')
    @if (Session::has('status'))
        <div class="alert alert-success text-center text-white">
            <p>{{ Session::get('status') }}</p>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">
        List of Client Profiles
    </h2>
    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        @if ($user_info->role_id == 1 || $user_info->role_id == 10 || $user_info->role_id == 11)
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('add_client_profile_privacy', $user_info->id) }}">
                <button class="btn btn-primary shadow-md mr-2">Add New Profiles</button>
            </a>
        </div>
        @endif
        <!-- START DROPDOWN -->
        @php
            use App\Models\District;
            use App\Models\Locale;
            
            $districts = District::all();
            $districts_json = $districts->toJson();
            
            $locales = Locale::all();
            $locales_json = $locales->toJson();

            $security_level = $user_info->getSecurityLevel($user_info->role_id);
        @endphp
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-5">
        @if ($security_level  >= 4)
            <label for="regular-form-1" class="form-label">List of Division</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="division-filter-3"
                    name="division-filter-3" onchange="loadDistricts3( {{ $districts_json }} )">
                    <option value="" selected disabled hidden>Select Division</option>
                    @foreach ($security_divisions as $security_division)
                        <option value="{{ $security_division->id }}">{{ $security_division->division }}</option>
                    @endforeach
                </select>
            </div>
            <label for="regular-form-1" class="form-label">List of District</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="district-filter-3"
                    name="district-filter-3" disabled="true" onchange="loadLocales3( {{ $locales_json }} )">
                    <option value="" selected disabled hidden>Select District</option>
                </select>
            </div>
            <label for="regular-form-1" class="form-label">List of Locale</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="locale-filter-3" name="locale-filter-3"
                    disabled="true">
                    <option value="" selected disabled hidden>Select Locale</option>
                </select>
            </div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0 text-slate-500">
                <button class="btn btn-primary w-24 ml-2" onclick="filter3Profiles( {{ $user_info->id }} )">Go</button>
                <a class="btn btn-secondary w-24 ml-2"
                href="{{ route('list_of_client_profiles', $user_info->id) }}">Reset</a>
            </div>
        @endif

        @if ($security_level  == 3)
            <label for="regular-form-1" class="form-label">List of District</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="district-filter-2"
                    name="district-filter-2" onchange="loadLocales2( {{ $locales_json }} )">
                    <option value="" selected disabled hidden>Select District</option>
                    @foreach ($security_districts as $security_district)
                        <option value="{{ $security_district->id }}">{{ $security_district->district }}</option>
                    @endforeach
                </select>
            </div>
            <label for="regular-form-1" class="form-label">List of Locale</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="locale-filter-2" name="locale-filter-2"
                    disabled="true">
                    <option value="" selected disabled hidden>Select Locale</option>
                </select>
            </div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0 text-slate-500">
                <button class="btn btn-primary w-24 ml-2" onclick="filter2Profiles( {{ $user_info->id }} )">Go</button>
                <a class="btn btn-secondary w-24 ml-2"
                href="{{ route('list_of_client_profiles', $user_info->id) }}">Reset</a>
            </div>
        @endif
        
        @if ($security_level  == 2)
            <label for="regular-form-1" class="form-label">List of Locale</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2" id="locale-filter-1" name="locale-filter">
                    <option value="" selected disabled hidden>Select Locale</option>
                    @foreach ($security_locales as $security_locale)
                        <option value="{{ $security_locale->id }}">{{ $security_locale->locale }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0 text-slate-500">
                <button class="btn btn-primary w-24 ml-2" onclick="filter1Profiles( {{ $user_info->id }} )">Go</button>
                <a class="btn btn-secondary w-24 ml-2"
                href="{{ route('list_of_client_profiles', $user_info->id) }}">Reset</a>
            </div>
        @endif
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
                        <th class="text-center whitespace-nowrap">Locale</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($client_profiles as $client_profile)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        @if ( !empty($client_profile->picture) )
                                            <img alt="Client Image" class="tooltip rounded-full"
                                                src="{{ asset('storage/'.$client_profile->picture) }}"
                                                title="{{ $client_profile->created_at }}">
                                        @else
                                            <img alt="Client Image" class="tooltip rounded-full"
                                                src="{{ asset('dist/images/profile-1.jpg') }}"
                                                title="{{ $client_profile->created_at }}">
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('view_client_profile_1', [$user_info->id, $client_profile->id]) }}"
                                    class="font-medium whitespace-nowrap">{{ $client_profile->getFullName($client_profile->id) }}</a>
                            </td>
                            <td class="text-center">{{ $client_profile->gender }}</td>
                            <td class="w-40">
                                <div class="flex items-center justify-center ">{{ $client_profile->contact_number }}</div>
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center ">
                                    {{ $client_profile->locale->getLocaleName($client_profile->locale_id) }}</div>
                            </td>
                            <td class="table-report__action w-400">
                                <div class="flex justify-center items-center">
                                    @if ($user_info->role_id == 1 || $user_info->role_id == 6 || $user_info->role_id == 10 || $user_info->role_id == 11)
                                    <a class="flex items-center mr-3 text-primary"
                                        href="{{ route('edit_client_profile_1', [$user_info->id, $client_profile->id]) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    @endif
                                    <a class="flex items-center mr-3 text-success"
                                        href="{{ route('view_client_profile_1', [$user_info->id, $client_profile->id]) }}">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                                    <a class="flex items-center mr-3 text-dark"
                                        href="{{ route('view_progress_report', [$user_info->id, $client_profile->id]) }}">
                                        <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
                                    @if (
                                            $user_info->role_id == 2 ||
                                            $user_info->role_id == 4 ||
                                            $user_info->role_id == 5 ||
                                            $user_info->role_id == 6 ||
                                            $user_info->role_id == 7 ||
                                            $user_info->role_id == 10 ||
                                            $user_info->role_id == 11
                                        )
                                        <a class="flex items-center mr-3 text-danger"
                                        onclick="getProfileId( {{ $client_profile->id }} )" data-tw-toggle="modal"
                                        data-tw-target="#archive-confirmation-modal"> <i data-lucide="trash-2"
                                            class="w-4 h-4 mr-1"></i> Archive </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Pagination -->
        <div class="intro-y p-5 text-slate-500 grid justify-center">
            @if ($client_profiles->firstItem())
                <div class="flex justify-center">
                    Showing {{ $client_profiles->firstItem() }} to {{ $client_profiles->lastItem() }} of
                    {{ $client_profiles->total() }} items
                </div>
                <div class="flex justify-center">
                    {{ $client_profiles->links() }}
                </div>
            @else
                <div class="flex justify-center">
                    Showing {{ $client_profiles->total() }} items
                </div>
            @endif
        </div>
        <!-- END: Pagination -->
        <!-- BEGIN: Archive Confirmation Modal -->
        <div id="archive-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="modal-body">
                                Do you really want to archive this client profile? If yes, please choose below the reason for archiving this client profile.
                            </div>
                        </div>
                        <input type="hidden" id="client-profile-id">
                        <div class="px-5 pb-8 text-center">
                            <button type="button" id="archive-client-profile" data-tw-toggle="modal"
                                onclick="archiveProfile( {{ $user_info->id }}, 'Terminated' )"
                                class="btn btn-danger w-24">Terminated</button>
                            <button type="button" id="archive-client-profile" data-tw-toggle="modal"
                                onclick="archiveProfile( {{ $user_info->id }}, 'Closed' )"
                                class="btn btn-warning w-24">Closed</button>
                            <button type="button" id="archive-client-profile" data-tw-toggle="modal"
                                onclick="archiveProfile( {{ $user_info->id }}, 'Expired' )"
                                class="btn btn-dark w-24">Expired</button>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1"
                            data-tw-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END: Delete Confirmation Modal -->
    </div>
    <script>
        function getProfileId(id) {
            $("#client-profile-id").val(id);
        }

        function archiveProfile(user_id, reason) {
            var client_profile_id = $("#client-profile-id").val();
            window.location.href = "/archive-profile/" + user_id + "/" + client_profile_id + "/" + reason;
        }
    </script>
@endsection
