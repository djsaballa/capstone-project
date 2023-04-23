@extends('layout.master')

@section('content')
    <!-- BEGIN: Content -->
    <h2 class="intro-y text-lg font-medium mt-10">
        List of Users
    </h2>
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
                            @elseif ($user->getSecurityLevel($user->role_id) == 4 || 5)
                                <div class="text-slate-500 text-xs mt-0.5">{{ $user->getRoleName($user->role_id) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            
                            <a href="{{ route('edit_user', [$user_info->id, $user->id]) }}">
                                <button class="btn btn-primary py-1 px-2 mr-2">Edit</button>
                            </a>
                            <a href="{{ route('view_user', [$user_info->id, $user->id]) }}">
                                <button class="btn btn-secondary py-1 px-2 mr-2">View</button>
                            </a>
                            <a href="javascript:;">
                                <button class="btn btn-danger py-1 px-2 mr-2"
                                    onclick="getUserId( {{ $user->id }} )"
                                    data-tw-toggle="modal" data-tw-target="#archive-confirmation-modal">
                                    Archive</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 p-5 text-slate-500 grid justify-center">
            <div class="flex justify-center">
                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} items
            </div>
            <div class="flex justify-center">
                {{ $users->links() }}
            </div>
        </div>
        <!-- END: Pagination -->
        <div id="archive-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="modal-body">
                                Do you really want to archive this User?
                            </div>
                        </div>
                        <input type="hidden" id="user-id">
                        <div class="px-5 pb-8 text-center">
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1"
                                data-tw-dismiss="modal">Cancel</button>
                            <button type="button" id="archive-client-profile"
                                onclick="archiveUser( {{ $user_info->id }} )"
                                class="btn btn-danger w-24">Archive</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function getUserId(id) {
                $("#user-id").val(id);
                console.log($("#user-id").val());
            }

            function archiveUser(user_id) {
                var employee_id = $("#user-id").val();
                window.location.href = "/archive-user/" + user_id + "/" + employee_id;
            }
        </script>
@endsection
