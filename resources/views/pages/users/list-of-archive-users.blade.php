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
                        List of Archived Users
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Users Layout -->
            @foreach ($users as $user)
                <div class="intro-y col-span-12 md:col-span-6 mt-5">
                    <div class="box">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                <img alt="ADDFII" class="rounded-full"
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
                                    <div class="text-slate-500 text-xs mt-0.5">
                                        {{ $user->getRoleName($user->role_id) }}
                                    </div>
                                @endif
                            </div>
                            <div class="flex mt-4 lg:mt-0">
                                <a href="{{ route('view_user', [$user_info->id, $user->id]) }}">
                                    <button class="btn btn-secondary py-1 px-2 mr-2">View</button>
                                </a>
                                <a class="btn btn-primary py-1 px-2 mr-2" href="javascript:;"
                                    onclick="getUserId( {{ $user->id }} )"
                                    data-tw-toggle="modal" data-tw-target="#restore-confirmation-modal">
                                    Restore </a>
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
            <div id="restore-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <i data-lucide="rotate-ccw" class="w-16 h-16 text-primary mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="modal-body">
                                    Do you really want to restore this User?
                                </div>
                            </div>
                            <input type="hidden" id="user-id">
                            <div class="px-5 pb-8 text-center">
                                <button type="button" class="btn btn-outline-secondary w-24 mr-1"
                                    data-tw-dismiss="modal">Cancel</button>
                                <button type="button" id="archive-client-profile"
                                    onclick="restoreUser( {{ $user_info->id }} )"
                                    class="btn btn-primary w-24">Restore</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function getUserId(id) {
                $("#user-id").val(id);
            }

            function restoreUser(user_id) {
                var employee_id = $("#user-id").val();
                window.location.href = "/restore-user/" + user_id + "/" + employee_id;
            }
        </script>
@endsection
