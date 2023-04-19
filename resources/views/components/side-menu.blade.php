<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> ADDFI </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    @php
        use Illuminate\Support\Facades\Route;

        $current_route = Route::currentRouteName();
    @endphp
    <ul>
        <li>
            @if ( str_contains($current_route, 'dashboard') )
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
            @if ( str_contains($current_route, 'profile') )
            <a href="{{ route('list_of_profiles', $user_info->id) }}" class="side-menu side-menu--active">
            @elseif ( str_contains($current_route, 'progress') )
            <a href="{{ route('list_of_profiles', $user_info->id) }}" class="side-menu side-menu--active">
            @else
            <a href="{{ route('list_of_profiles', $user_info->id) }}" class="side-menu">
            @endif
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    List of Profiles
                    <div class="side-menu__sub-icon "> </i> </div>
                </div>
            </a>
        </li>
        </li>
        <li>
            @if ( str_contains($current_route, 'user') )
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
        <li>
            @if ( str_contains($current_route, 'inbox') )
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
        <li>
            @if ( str_contains($current_route, 'audit_logs') )
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

        <li>
            @if ( str_contains($current_route, 'archive') )
            <a href="{{ route('archive', $user_info->id) }}" class="side-menu side-menu--active">
            @else
            <a href="{{ route('archive', $user_info->id) }}" class="side-menu">
            @endif
                <div class="side-menu__icon"> <i data-lucide="archive"></i> </div>
                <div class="side-menu__title">
                    Archive
                    <div class="side-menu__sub-icon "></i> </div>
                </div>
            </a>
        </li>
    </ul>
</nav>
