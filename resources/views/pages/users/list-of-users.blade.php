@extends('layout.master')

@section('content')
    <!-- BEGIN: Content -->
    <h2 class="intro-y text-lg font-medium mt-10">
        List Of Users
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('add_user', $user_info->id) }}">
                <button class="btn btn-primary shadow-md mr-2">Add New User</button>
            </a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Add
                                Group </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="message-circle"
                                    class="w-4 h-4 mr-2"></i> Send Message </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        </div>
        <!-- BEGIN: Users Layout -->
        @foreach ($users as $user)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src=" {{ asset('dist/images/profile-5.jpg') }}">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{ $user->getFullName($user->id) }}</a>
                            @if ($user->getSecurityLevel($user->role_id) == 1)
                                <div class="text-slate-500 text-xs mt-0.5">
                                    {{ $user->getLocaleName($user->locale_id) . ' - ' . $user->getRoleName($user->role_id) }}
                                </div>
                            @elseif ($user->getSecurityLevel($user->role_id) == 2)
                                <div class="text-slate-500 text-xs mt-0.5">
                                    {{ $user->getDistrictName($user->district_id) . ' - ' . $user->getRoleName($user->role_id) }}
                                </div>
                            @elseif ($user->getSecurityLevel($user->role_id) == 3)
                                <div class="text-slate-500 text-xs mt-0.5">
                                    {{ $user->getDivisionName($user->division_id) . ' - ' . $user->getRoleName($user->role_id) }}
                                </div>
                            @else
                                <div class="text-slate-500 text-xs mt-0.5">{{ $user->getRoleName($user->role_id) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <a href="{{ route('edit_user', [$user_info->id, $user->id]) }}">
                                <button class="btn btn-secondary py-1 px-2 mr-2">View</button>
                                <button class="btn btn-primary py-1 px-2 mr-2">Edit</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- BEGIN: Users Layout -->
        <!-- END: Pagination -->
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
@endsection
