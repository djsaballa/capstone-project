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
                    <a href="list-of-profiles.html" class="side-menu side-menu--active">
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
                    <a href="inbox.html" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title">
                            Inbox
                            <div class="side-menu__sub-icon "> </i> </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="audit-logs.html" class="side-menu">
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
                        <li class="breadcrumb-item"><a href="#">List of Profiles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Profile</li>
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
                                        src="dist/images/profile-5.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Christian Bale</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text
                                        of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-11.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Keanu Reeves</a>
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
                                        src="dist/images/profile-3.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Nicolas Cage</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of
                                        passages of Lorem Ipsum available, but the majority have suffered alteration in
                                        some form, by injected humour, or randomi</div>
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
                                        <a href="javascript:;" class="font-medium truncate mr-5">John Travolta</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
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
                                        <a href="javascript:;" class="font-medium truncate mr-5">Brad Pitt</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
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
                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-15.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary text-white">
                            <li class="p-2">
                                <div class="font-medium">Christian Bale</div>
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
            <div class="flex items-center mt-8">
                <h2 class="intro-y text-lg font-medium mr-auto">
                    Add Profile
                </h2>
            </div>
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box py-10 sm:py-20 mt-5">
                <div
                    class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">
                    <div class="intr o-x lg:text-center flex items-center lg:block flex-1 z-10">
                        <button
                            class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"><i
                                data-lucide="shield"></i></button>
                        <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">
                            Privacy Notice</div>
                    </div>
                    <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                        <button
                            class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 ">1</button>
                        <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup
                            Personal Information</div>
                    </div>
                    <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                        <button class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">2</button>
                        <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Family Composition
                        </div>
                    </div>
                    <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                        <button
                            class="w-10 h-10 rounded-full btn btn-primary">3</button>
                        <div class="g:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Setup
                            Medical Conditon</div>
                    </div>
                    <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                        <button
                            class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">4</button>
                        <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup
                            Contact Persons</div>
                    </div>
                    <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                        <button
                            class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">5</button>
                        <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup
                            Background Information</div>
                    </div>

                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-base">Medical Condition</div>
                    <div class="grid grid-cols-10 gap-4 gap-y-5 mt-5">
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Ano Sakit?</label>
                            <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                tabindex="-1" hidden="hidden">
                                <option value="1" selected="true">Option</option>
                                <option value="2">Option 1</option>
                                <option value="3">Option 2</option>
                                <option value="2">Option 3</option>
                                <option value="3">Option 4</option>

                            </select>
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Gamot na Iniinom?</label>
                            <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                tabindex="-1" hidden="hidden">
                                <option value="1" selected="true">Option</option>
                                <option value="2">Option 1</option>
                                <option value="3">Option 2</option>
                                <option value="2">Option 3</option>
                                <option value="3">Option 4</option>

                            </select>
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Dosage </label>
                            <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                tabindex="-1" hidden="hidden">
                                <option value="1" selected="true">College</option>
                                <option value="2">College</option>
                                <option value="3">High School</option>
                                <option value="3">Elementary</option>

                            </select>
                        </div>
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Occupation</label>
                            <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                tabindex="-1" hidden="hidden">
                                <option value="1" selected="true">None</option>
                                <option value="2">None</option>
                                <option value="3">Vendor</option>

                            </select>
                        </div>
                        <div
                            class="intro-y flex items-center justify-center sm:justify-end mt-5 col-span-2 2xl:col-span-1">
                            <button class="btn btn-primary w-50 ml-2">Add Response</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-10 gap-4 gap-y-5 mt-5">
                        <div class="col-span-2 2xl:col-span-1">
                            <label for="update-profile-form-3-tomselected" class="form-label"
                                id="update-profile-form-3-ts-label">Mga naging Operasyon?</label>
                            <select id="update-profile-form-3" data-search="true" class="tom-select w-full tomselected"
                                tabindex="-1" hidden="hidden">
                                <option value="1" selected="true">Option</option>
                                <option value="2">Option 1</option>
                                <option value="3">Option 2</option>
                                <option value="2">Option 3</option>
                                <option value="3">Option 4</option>
                            </select>
                        </div>
                        <div class="col-span-2 2xl:col-span-1 mt-3">
                            <label for="startDate">Petsa ng Operation</label>
                            <input id="startDate" class="form-control" type="date" />
                            <span id="startDateSelected"></span>
                        </div>
                        <div
                            class="intro-y flex items-center justify-center sm:justify-end mt-5 col-span-2 2xl:col-span-1">
                            <button class="btn btn-primary w-50 ml-2">Add Response</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                        <div class="mt-3 col-span-3 2xl:col-span-1">
                            <label for="update-profile-form-1" class="form-label">Hospital</label>
                            <input id="update-profile-form-1" type="text" class="form-control" placeholder="Hospital"
                                value="Hospital">
                        </div>
                        <div class="mt-3  col-span-3 2xl:col-span-1">
                            <label for="update-profile-form-1" class="form-label">Doctor</label>
                            <input id="update-profile-form-1" type="text" class="form-control" placeholder="Doctor"
                                value="Doctor">
                        </div>
                        <div class="mt-3 col-span-3 2xl:col-span-1">
                            <label for="update-profile-form-1" class="form-label">Do you have Phil-health Card? Please Specify</label>
                            <input id="update-profile-form-1" type="text" class="form-control" placeholder="Input here"
                                value="Phil-health Card">
                        </div>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <button class="btn btn-secondary w-24 ml-2">Previous</button>
                            <button class="btn btn-primary w-24 ml-2">Next</button>
                        </div>
                    </div>
                </div>
                <!-- END: Wizard Layout -->
            </div>
            <!-- END: Content -->
        </div>

        <!-- BEGIN: JS Assets-->
        <script
            src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
</body>

</html>