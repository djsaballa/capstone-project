<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
            aria-expanded="false" data-tw-toggle="dropdown">
            @if ( !empty($user_info->picture) )
                <img src="{{ asset('storage/'.$user_info->picture) }}" alt="User Image">
            @else
                <img class="rounded-md" alt="ADDFII"
                src="{{ asset('dist/images/profile-1.jpg') }}">
            @endif
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ $user_info->getFullName($user_info->id) }}</div>
                    @if ($user_info->getSecurityLevel($user_info->role_id) == 1)
                        <div class="text-xs text-white/70 mt-0.5 dark:divtext-slate-500">
                            {{ $user_info->getLocaleName($user_info->locale_id) . ' - ' . $user_info->getRoleName($user_info->role_id) }}
                        </div>
                    @elseif ($user_info->getSecurityLevel($user_info->role_id) == 2)
                        <div class="text-xs text-white/70 mt-0.5 dark:divtext-slate-500">
                            {{ $user_info->getDistrictName($user_info->district_id) . ' - ' . $user_info->getRoleName($user_info->role_id) }}
                        </div>
                    @elseif ($user_info->getSecurityLevel($user_info->role_id) == 3)
                        <div class="text-xs text-white/70 mt-0.5 dark:divtext-slate-500">
                            {{ $user_info->getDivisionName($user_info->division_id) . ' - ' . $user_info->getRoleName($user_info->role_id) }}
                        </div>
                    @elseif ($user_info->getSecurityLevel($user_info->role_id) == 4 || 5)
                        <div class="text-xs text-white/70 mt-0.5 dark:divtext-slate-500">{{ $user_info->getRoleName($user_info->role_id) }}
                        </div>
                    @endif
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="{{ route('view_user', [$user_info->id, $user_info->id]) }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                            class="w-4 h-4 mr-2"></i> Profile </a>
                </li>
                <li>
                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle"
                            class="w-4 h-4 mr-2"></i> Help </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right"
                            class="w-4 h-4 mr-2"></i> Logout </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
