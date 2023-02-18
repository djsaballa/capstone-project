<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
    <div class="flex mt-[4.7rem] md:mt-0">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                <span class="hidden xl:block text-white text-lg ml-3"> ADDFI </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="/" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title">
                            Dashboard
                            <div class="side-menu__sub-icon transform rotate-180"> </i> </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/list-of-profiles" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="side-menu__title">
                            List of Profiles
                            <div class="side-menu__sub-icon "> </i> </div>
                        </div>
                    </a>
                </li>
                </li>
                <li>
                    <a href="list-of-users" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="side-menu__title">
                            List of Users
                            <div class="side-menu__sub-icon "> </i> </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="inbox" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title">
                            Inbox
                            <div class="side-menu__sub-icon "> </i> </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="audit-logs" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
                        <div class="side-menu__title">
                            Audit Logs
                            <div class="side-menu__sub-icon "></i> </div>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="archive" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="archive"></i> </div>
                        <div class="side-menu__title">
                            Archive
                            <div class="side-menu__sub-icon "></i> </div>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-auto sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell"
                            class="notification__icon dark:text-slate-500"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-7.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Kevin Spacey</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text
                                        of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-2.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-5.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of
                                        passages of Lorem Ipsum available, but the majority have suffered alteration in
                                        some form, by injected humour, or randomi</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-9.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Morgan Freeman</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-1.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">03:20 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-5.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary text-white">
                            <li class="p-2">
                                <div class="font-medium">Kevin Spacey</div>
                                <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Software Engineer</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                        class="w-4 h-4 mr-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit"
                                        class="w-4 h-4 mr-2"></i> Add Account </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock"
                                        class="w-4 h-4 mr-2"></i> Reset Password </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle"
                                        class="w-4 h-4 mr-2"></i> Help </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right"
                                        class="w-4 h-4 mr-2"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            <div class="grid grid-cols-12 gap-6">
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
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="user" class="report-box__icon text-success"></i>
                                                
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">500</div>
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
                                            <div class="text-3xl font-medium leading-8 mt-6">380</div>
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
                                            <div class="text-3xl font-medium leading-8 mt-6">120</div>
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
                                            <div class="text-3xl font-medium leading-8 mt-6">120</div>
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
                                <!-- BEGIN: Profiling Report -->
                                <div class="col-span-12 lg:col-span-6 mt-8">
                                    <div class="intro-y block sm:flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Profiling
                                        </h2>
                                        <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                                            <i data-lucide="calendar"
                                                class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                            <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                                        </div>
                                    </div>
                                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                                        <div class="flex flex-col md:flex-row md:items-center">
                                            <div class="flex">
                                                <div>
                                                    <div
                                                        class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                                        500</div>
                                                    <div class="mt-0.5 text-slate-500">This Month</div>
                                                </div>
                                                <div
                                                    class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                                </div>
                                                <div>
                                                    <div class="text-slate-500 text-lg xl:text-xl font-medium">300
                                                    </div>
                                                    <div class="mt-0.5 text-slate-500">Last Month</div>
                                                </div>
                                            </div>
                                            <div class="dropdown md:ml-auto mt-5 md:mt-0">
                                                <button class="dropdown-toggle btn btn-outline-secondary font-normal"
                                                    aria-expanded="false" data-tw-toggle="dropdown"> Filter by Category
                                                    <i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                                                <div class="dropdown-menu w-40">
                                                    <ul class="dropdown-content overflow-y-auto h-32">
                                                        <li><a href="" class="dropdown-item">All Profiles</a></li>
                                                        <li><a href="" class="dropdown-item">Brethren</a></li>
                                                        <li><a href="" class="dropdown-item">Non-Brethren</a></li>
                                                        <li><a href="" class="dropdown-item">On-Going Cases</a></li>
                                                        <li><a href="" class="dropdown-item">Terminated Cases</a></li>
                                                        <li><a href="" class="dropdown-item">Closed Cases</a></li>
                                                        <li><a href="" class="dropdown-item">Expired Cases</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="report-chart">
                                            <div class="h-[275px]">
                                                <canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Profiling Report -->
                                <!-- BEGIN: Client Ages -->
                                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Client Ages
                                        </h2>
                                        <a href="" class="ml-auto text-primary truncate">Show More</a>
                                    </div>
                                    <div class="intro-y box p-5 mt-5">
                                        <div class="mt-3">
                                            <div class="h-[213px]">
                                                <canvas id="report-pie-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="w-52 sm:w-auto mx-auto mt-8">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                <span class="truncate">17 - 30 Years old</span> <span
                                                    class="font-medium ml-auto">62%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                <span class="truncate">31 - 50 Years old</span> <span
                                                    class="font-medium ml-auto">33%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                <span class="truncate">>= 50 Years old</span> <span
                                                    class="font-medium ml-auto">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Client Ages -->
                                <!-- BEGIN: Diseases per Category-->
                                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Diseases per Category
                                        </h2>
                                        <a href="" class="ml-auto text-primary truncate">Show More</a>
                                    </div>
                                    <div class="intro-y box p-5 mt-5">
                                        <div class="mt-3">
                                            <div class="h-[213px]">
                                                <canvas id="report-donut-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="w-52 sm:w-auto mx-auto mt-8">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                <span class="truncate">Terminal</span> <span
                                                    class="font-medium ml-auto">62%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                <span class="truncate">Cronic</span> <span
                                                    class="font-medium ml-auto">33%</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                <span class="truncate">Terminal</span> <span
                                                    class="font-medium ml-auto">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Diseases per Categorys -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
    </div>

    <!-- BEGIN: JS Assets-->
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>