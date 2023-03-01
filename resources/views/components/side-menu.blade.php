<nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
            <span class="hidden xl:block text-white text-lg ml-3"> ADDFI </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="{{ route('dashboard') }}" class="side-menu side-menu--active">
                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="side-menu__title">
                        Dashboard
                        <div class="side-menu__sub-icon transform rotate-180"> </i> </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('list_of_profiles') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="side-menu__title">
                        List of Profiles
                        <div class="side-menu__sub-icon "> </i> </div>
                    </div>
                </a>
            </li>
            </li>
            <li>
                <a href="{{ route('list_of_users') }}" class="side-menu ">
                    <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                    <div class="side-menu__title">
                        List of Users
                        <div class="side-menu__sub-icon "> </i> </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('inbox') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                    <div class="side-menu__title">
                        Inbox
                        <div class="side-menu__sub-icon "> </i> </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('audit_logs') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
                    <div class="side-menu__title">
                        Audit Logs
                        <div class="side-menu__sub-icon "></i> </div>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('archive') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-lucide="archive"></i> </div>
                    <div class="side-menu__title">
                        Archive
                        <div class="side-menu__sub-icon "></i> </div>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
