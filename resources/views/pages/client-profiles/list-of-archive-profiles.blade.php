@extends('layout.master')

@section('content')
    @if (Session::has('status'))
        <div class="mt-10" style="color: green;">
            <ul>
                <li>{{ Session::get('status') }}</li>
            </ul>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="mt-10" style="color: red;">
            <ul>
                <li>{{ Session::get('error') }}</li>
            </ul>
        </div>
    @endif
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report for Archived Client Profiles
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                @php
                    $brethren = $client_profiles_total->whereNotNull('baptism_date');
                    $non_brethren = $client_profiles_total->whereNull('baptism_date');
                    $terminated = $client_profiles_total->where('status', 'Terminated');
                    $expired = $client_profiles_total->where('status', 'Expired');
                    $closed = $client_profiles_total->where('status', 'Closed');
                @endphp
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($client_profiles_total) }}</div>
                                <div class="text-base text-slate-500 mt-1">Total Profiles</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">
                                    {{ count($brethren) }}</div>
                                <div class="text-base text-slate-500 mt-1">Brethren</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($non_brethren) }}</div>
                                <div class="text-base text-slate-500 mt-1">Non-Brethren</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 mt-8">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($terminated) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Terminated Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($expired) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Expired Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($closed) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Closed Cases</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
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
                            <button class="btn btn-primary w-24 ml-2" onclick="filter3ProfilesArchive( {{ $user_info->id }} )">Go</button>
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
                            <button class="btn btn-primary w-24 ml-2" onclick="filter2ProfilesArchive( {{ $user_info->id }} )">Go</button>
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
                            <button class="btn btn-primary w-24 ml-2" onclick="filter1ProfilesArchive( {{ $user_info->id }} )">Go</button>
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
                                    <th class="whitespace-nowrap">CLIENT'S NAME</th>
                                    <th class="text-center whitespace-nowrap">GENDER</th>
                                    <th class="text-center whitespace-nowrap">CONTACT NUMBER</th>
                                    <th class="text-center whitespace-nowrap">LOCALE</th>
                                    <th class="text-center whitespace-nowrap">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client_profiles as $client_profile)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    @if ( !empty($client_profile->picture) )
                                                        <img src="{{ asset('storage/'.$client_profile->picture) }}" class="rounded-full" alt="Client Image">
                                                    @else
                                                        <img alt="Client Image" class="rounded-full" src=" {{ asset('dist/images/profile-1.jpg')}}">
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href=""
                                                class="font-medium whitespace-nowrap">{{ $client_profile->getFullName($client_profile->id) }}</a>
                                        </td>
                                        <td class="text-center">{{ $client_profile->gender }}</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center ">
                                                {{ $client_profile->contact_number }}</div>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center ">
                                                {{ $client_profile->locale->getLocaleName($client_profile->locale_id) }}
                                            </div>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center ">
                                                {{ $client_profile->status }}
                                            </div>
                                        </td>
                                        <td class="table-report__action w-400">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 text-success"
                                                    href="{{ route('view_archive_profile_1', [$user_info->id, $client_profile->id]) }}">
                                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View </a>
                                                <a class="flex items-center mr-3 text-dark"
                                                    href="{{ route('view_archive_report', [$user_info->id, $client_profile->id]) }}">
                                                    <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report
                                                </a>
                                                @if ($user_info->role_id == 6 || $user_info->role_id >= 10)
                                                <a class="flex items-center mr-3 text-primary" href="javascript:;"
                                                    onclick="getProfileId( {{ $client_profile->id }} )"
                                                    data-tw-toggle="modal" data-tw-target="#restore-confirmation-modal">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4 mr-1"></i> Restore </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y col-span-12 p-5 text-slate-500 grid justify-center">
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
                    <div id="restore-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="rotate-ccw" class="w-16 h-16 text-primary mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="modal-body">
                                            Do you really want to restore this client profile?
                                        </div>
                                    </div>
                                    <input type="hidden" id="client-profile-id">
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" class="btn btn-outline-secondary w-24 mr-1"
                                            data-tw-dismiss="modal">Cancel</button>
                                        <button type="button" id="archive-client-profile"
                                            onclick="restoreProfile( {{ $user_info->id }} )"
                                            class="btn btn-primary w-24">Restore</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function getProfileId(id) {
                    $("#client-profile-id").val(id);
                }

                function restoreProfile(user_id) {
                    var client_profile_id = $("#client-profile-id").val();
                    window.location.href = "/restore-profile/" + user_id + "/" + client_profile_id;
                }
            </script>
        @endsection
