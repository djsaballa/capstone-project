@extends('layout.master')

@section('content')
    <!-- BEGIN: Content -->
    <h2 class="intro-y text-lg font-medium mt-10">
        List of Users
    </h2>
    @if (Session::has('status'))
        <div class="alert alert-success text-center text-white">
            <p>{{ Session::get('status') }}</p>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            <pack>{{ Session::get('error') }}</pack>
        </div>
    @endif
    <div class="grid grid-cols-12 gap-6 mt-5">
        @if ($user_info->role_id == 10 || $user_info->role_id == 11)
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('add_user', $user_info->id) }}">
                <button class="btn btn-primary shadow-md mr-2">Add New User</button>
            </a>
        </div>
        @endif
        <!-- BEGIN: Users Layout -->
        @foreach ($users as $user)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        @if ( !empty($user->picture) )
                            <img src="{{ asset('storage/'.$user->picture) }}" class="rounded-full" alt="User Image">
                        @else
                            <img alt="User Image" class="rounded-full" src=" {{ asset('dist/images/profile-1.jpg')}}">
                        @endif
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="{{ route('view_user', [$user_info->id, $user->id]) }}" class="font-medium">{{ $user->getFullName($user->id) }}</a>
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
                            @if ($user_info->role_id == 10 || $user_info->role_id == 11)
                            <a href="{{ route('edit_user', [$user_info->id, $user->id]) }}">
                                <button class="btn btn-primary py-1 px-2 mr-2">Edit</button>
                            </a>
                            @endif
                            <a href="{{ route('view_user', [$user_info->id, $user->id]) }}">
                                <button class="btn btn-secondary py-1 px-2 mr-2">View</button>
                            </a>
                            <a href="javascript:;">
                                <button class="btn btn-danger py-1 px-2 mr-2"
                                    onclick="getUserId( {{ $user->id }} )"
                                    data-tw-toggle="modal" data-tw-target="#archive-confirmation-modal">
                                    Archive</button>
                            </a>
                            @if ($user_info->role_id == 10 || $user_info->role_id == 11)
                            <a href="{{ route('change_password', [$user_info->id, $user->id]) }}">
                                <button class="btn btn-warning py-1 px-2 mr-2">Change Password</button>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 p-5 text-slate-500 grid justify-center">
            @if ($users->firstItem())
                <div class="flex justify-center">
                    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} items
                </div>
                <div class="flex justify-center">
                    {{ $users->links() }}
                </div>
            @else
                <div class="flex justify-center">
                    Showing {{ $users->total() }} items
                </div>
            @endif
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
