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
                    <a href="index.html" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title">
                            Dashboard
                            <div class="side-menu__sub-icon transform rotate-180"> </i> </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="list-of-profiles.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="side-menu__title">
                            List of Profiles
                            <div class="side-menu__sub-icon "> </i> </div>
                        </div>
                    </a>
                </li>
                </li>
                <li>
                    <a href="list-of-users.html" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="side-menu__title">
                            List of Users
                            <div class="side-menu__sub-icon "> </i> </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="inbox.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title">
                            Inbox
                            <div class="side-menu__sub-icon "> </i> </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="audit-logs.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
                        <div class="side-menu__title">
                            Audit Logs
                            <div class="side-menu__sub-icon "></i> </div>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="archive.html" class="side-menu">
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
                            <li class="breadcrumb-item active" aria-current="page">Audit Logs</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <div class="intro-x relative mr-3 sm:mr-6">
                        <div class="search hidden sm:block">
                            <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                            <i data-lucide="search" class="search__icon dark:text-slate-500"></i> 
                        </div>
                        <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                        <div class="search-result">
                            <div class="search-result__content">
                                <div class="search-result__content__title">Pages</div>
                                <div class="mb-5">
                                    <a href="" class="flex items-center">
                                        <div class="w-8 h-8 bg-success/20 dark:bg-success/10  flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                                        <div class="ml-3">Mail Settings</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="users"></i> </div>
                                        <div class="ml-3">Users & Permissions</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                                        <div class="ml-3">Transactions Report</div>
                                    </a>
                                </div>
                                <div class="search-result__content__title">Users</div>
                                <div class="mb-5">
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                        </div>
                                        <div class="ml-3">Johnny Depp</div>
                                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">johnnydepp@left4code.com</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                                        </div>
                                        <div class="ml-3">Robert De Niro</div>
                                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">robertdeniro@left4code.com</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
                                        </div>
                                        <div class="ml-3">Morgan Freeman</div>
                                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">morganfreeman@left4code.com</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                                        </div>
                                        <div class="ml-3">Christian Bale</div>
                                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">christianbale@left4code.com</div>
                                    </a>
                                </div>
                                <div class="search-result__content__title">Products</div>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-9.jpg">
                                    </div>
                                    <div class="ml-3">Nike Tanjun</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp; Outdoor</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-9.jpg">
                                    </div>
                                    <div class="ml-3">Nike Tanjun</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp; Outdoor</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                                    </div>
                                    <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Smartphone &amp; Tablet</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                                    </div>
                                    <div class="ml-3">Nike Air Max 270</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp; Outdoor</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                        <div class="notification-content pt-2 dropdown-menu">
                            <div class="notification-content__box dropdown-content">
                                <div class="notification-content__title">Notifications</div>
                                <div class="cursor-pointer relative flex items-center ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a> 
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Robert De Niro</a> 
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Morgan Freeman</a> 
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">03:20 PM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Christian Bale</a> 
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a> 
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            <img alt="Midone - HTML Admin Template" src="dist/images/profile-8.jpg">
                        </div>
                        <div class="dropdown-menu w-56">
                            <ul class="dropdown-content bg-primary text-white">
                                <li class="p-2">
                                    <div class="font-medium">Johnny Depp</div>
                                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Frontend Engineer</div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <h2 class="intro-y text-lg font-medium mt-10">
                    Audit Logs
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                        
                        <div class="hidden xl:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                        <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                        </div>
                    </div>
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">
                                        <input class="form-check-input" type="checkbox">
                                    </th>
                                    <th class="whitespace-nowrap">PROFILE EDITED/ARCHIVED </th>
                                    <th class="whitespace-nowrap">USER THAT EDITED/ARCHIVED</th>
                                    <th class="text-center whitespace-nowrap">ACTION TAKEN</th>
                                    <th class="whitespace-nowrap">CHANGE HISTORY</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Russell Crowe</a> 
                                        
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit </div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                                    </td>
                                  
                                    
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Al Pacino</a> 
                                        
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit </div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                                    </td>
                                    
                                    
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Russell Crowe</a> 
                                        
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit </div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                                    </td>
                                    
                                    
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Al Pacino</a> 
                                       
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit </div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                                    </td>
                                    
                                    
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Angelina Jolie</a> 
                                        
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit </div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                                    </td>
                                    
                                    
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Johnny Depp</a> 
                                        
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit </div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                                    </td>
                                    
                                    
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Leonardo DiCaprio</a> 
                                        
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit</div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                                    </td>
                                   
                                    
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="w-40 !py-4"> <a href="" class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">Kevin Spacey</a> 
                                        
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center whitespace-nowrap text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Archive </div>
                                    </td>
                                    <td>
                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">30 March, 11:00</div>
                                    </td>
                                    
                                    
                                </tr>
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
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    <button type="button" class="btn btn-danger w-24">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Delete Confirmation Modal -->
            </div>
            <!-- END: Content -->
        </div>
        
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>