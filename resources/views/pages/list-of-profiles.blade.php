@extends('layout.master')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        List of Profiles
    </h2>
    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('add_profile_privacy') }}">
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
                <select class="form-select box ml-2">
                    <option selected disabled hidden>Select Division</option>
                    @foreach($divisions as $division)
                        <option>{{ $division->division }}</option>
                    @endforeach
                </select>
            </div>
            <label for="regular-form-1" class="form-label">List of District</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2">
                    <option selected disabled hidden>Select District</option>
                    @foreach($districts as $district)
                        <option>{{ $district->district }}</option>
                    @endforeach
                </select>
            </div>
            <label for="regular-form-1" class="form-label">List of Locale</label>
            <div class="flex w-full sm:w-auto mr-2">
                <select class="form-select box ml-2">
                    <option selected disabled hidden>Select Locale</option>
                    @foreach($locales as $locale)
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
                    <th class="text-center whitespace-nowrap">LAST INTERACTION</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($client_profiles as $client_profile)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                        src="dist/images/preview-4.jpg" title="Uploaded at 18 April 2021">
                                </div>

                            </div>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $client_profile->getFullName($client_profile->id) }}</a>
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
                                <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square"
                                        class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                        class="w-4 h-4 mr-1"></i> Archive </a>
                                <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye"
                                        class="w-4 h-4 mr-1"></i> View</a>
                                <a class="flex items-center mr-3" href="{{ route('view_profile_1', [$employee_info->id, $client_profile->id]) }}"> <i data-lucide="file-check-2"
                                        class="w-4 h-4 mr-1"></i> View Report </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                </li>
            </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
    </div>
@endsection
