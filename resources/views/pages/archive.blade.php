@extends('layout.master')

@section('content')
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                @php
                    $non_brethren = $client_profiles_total->whereNull('baptism_date');
                    $ongoing = $client_profiles_total->where('status', 'Active');
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
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($client_profiles_total) - count($non_brethren) }}</div>
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
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($ongoing) }}</div>
                                <div class="text-base text-slate-500 mt-1">On-Going Cases</div>
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
                                        <div class="text-3xl font-medium leading-8 mt-6">120</div>
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
                                        <div class="text-3xl font-medium leading-8 mt-6">120</div>
                                        <div class="text-base text-slate-500 mt-1">Closed Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">120</div>
                                        <div class="text-base text-slate-500 mt-1">Expired Cases</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
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
                                    <th class="whitespace-nowrap">CLIENT'S NAME</th>
                                    <th class="text-center whitespace-nowrap">GENDER</th>
                                    <th class="text-center whitespace-nowrap">CONTACT NUMBER</th>
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client_profiles_archives as $client_profiles_archive)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                                        src=" {{ asset('dist/images/preview-4.jpg') }}"
                                                        title="Uploaded at 18 April 2021">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href=""
                                                class="font-medium whitespace-nowrap">{{ $client_profiles_archive->getFullName($client_profiles_archive->id) }}</a>
                                        </td>
                                        <td class="text-center">{{ $client_profiles_archive->gender }}</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center ">{{ $client_profiles_archive->contact_number }}</div>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center "> KNP </div>
                                        </td>
                                        <td class="table-report__action w-400">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3" href="javascript:;"> <i
                                                        data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                <a class="flex items-center mr-3 text-danger" href="javascript:;"
                                                    data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i
                                                        data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->

                </div>
            </div>
        @endsection
