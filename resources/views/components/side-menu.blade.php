<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="ADDFII" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> ADDFII </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    @php
        use Illuminate\Support\Facades\Route;
        
        $current_route = Route::currentRouteName();
    @endphp
    <ul>
        <li>
            @if (preg_match('(dashboard)', $current_route))
                <a href="{{ route('dashboard', $user_info->id) }}" class="side-menu side-menu--active">
            @else
                <a href="{{ route('dashboard', $user_info->id) }}" class="side-menu">
            @endif
            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
            <div class="side-menu__title">
                Dashboard
                <div class="side-menu__sub-icon transform rotate-180"> </i> </div>
            </div>
            </a>
        </li>

        <li>
            @if (preg_match('(client_profile|progress)', $current_route))
                <a href="{{ route('list_of_client_profiles', $user_info->id) }}" class="side-menu side-menu--active">
            @else
                <a href="{{ route('list_of_client_profiles', $user_info->id) }}" class="side-menu">
            @endif
            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
            <div class="side-menu__title">
                List of Client Profiles
                <div class="side-menu__sub-icon "> </i> </div>
            </div>
            </a>
        </li>
        
        @if ($user_info->role_id >= 6)
        <li>
            @if (preg_match('(list_of_users|edit_user|add_user|view_user)', $current_route))
                <a href="{{ route('list_of_users', $user_info->id) }}" class="side-menu side-menu--active">
            @else
                <a href="{{ route('list_of_users', $user_info->id) }}" class="side-menu">
            @endif
            <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
            <div class="side-menu__title">
                List of Users
                <div class="side-menu__sub-icon "> </i> </div>
            </div>
            </a>
        </li>
        @endif

        <li>
            @if (preg_match('(inbox)', $current_route))
                <a href="{{ route('inbox', $user_info->id) }}" class="side-menu side-menu--active">
            @else
                <a href="{{ route('inbox', $user_info->id) }}" class="side-menu">
            @endif
            <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
            <div class="side-menu__title">
                Inbox
                <div class="side-menu__sub-icon "> </i> </div>
            </div>
            </a>
        </li>

        @if ($user_info->role_id >= 6)
        <li>
            @if (preg_match('(audit_logs)', $current_route))
                <a href="{{ route('audit_logs', $user_info->id) }}" class="side-menu side-menu--active">
            @else
                <a href="{{ route('audit_logs', $user_info->id) }}" class="side-menu">
            @endif
            <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
            <div class="side-menu__title">
                Audit Logs
                <div class="side-menu__sub-icon "></i> </div>
            </div>
            </a>
        </li>
        @endif

        @if ($user_info->role_id == 6 || $user_info->role_id == 10 || $user_info->role_id == 11)
        <li>
            @if (preg_match('(archive)', $current_route))
                <a href="javascript:;.html" class="side-menu side-menu--active">
            @else
                <a href="javascript:;.html" class="side-menu">
            @endif
                <div class="side-menu__icon"> <i data-lucide="archive"></i> </div>
                <div class="side-menu__title">
                    Archive
                    <div class="side-menu__sub-icon "><i data-lucide="chevron-down" ></i> </div>
                </div>
            </a>
            <ul class="menu__sub-open">
                    <li>
                    @if (preg_match('(archive_profile|archive_report)', $current_route))
                        <a href="{{ route('list_of_archive_profiles', $user_info->id) }}" class="side-menu side-menu--active">
                    @else
                        <a href="{{ route('list_of_archive_profiles', $user_info->id) }}" class="side-menu">
                    @endif
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title"> Client Profiles </div>
                        </a>
                    </li>
                @if ($user_info->role_id == 10 || $user_info->role_id == 11)
                <li>
                    @if (preg_match('(archive_user)', $current_route, ))
                        <a href="{{ route('list_of_archive_users', $user_info->id) }}" class="side-menu side-menu--active">
                    @else
                        <a href="{{ route('list_of_archive_users', $user_info->id) }}" class="side-menu">
                    @endif
                        <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="side-menu__title"> Users </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
    </ul>
</nav>
