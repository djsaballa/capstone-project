@extends('layout.master')

@section('content')
    <!-- BEGIN: Content -->
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
                @php
                    $brethren = $client_profiles->whereNotNull('baptism_date');
                    $non_brethren = $client_profiles->whereNull('baptism_date');
                    $ongoing = $client_profiles->where('status', 'Active');
                @endphp
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="users" class="report-box__icon text-success"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($client_profiles) }}</div>
                                <div class="text-base text-slate-500 mt-1">Total Profiles</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user-check" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($brethren) }}</div>
                                <div class="text-base text-slate-500 mt-1">Brethren</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user-x" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($non_brethren) }}</div>
                                <div class="text-base text-slate-500 mt-1">Non-Brethren</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="refresh-cw" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($ongoing) }}</div>
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
                                            <i data-lucide="file-x" class="report-box__icon text-success"></i>

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
                                            <i data-lucide="x-circle" class="report-box__icon text-success"></i>

                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">120</div>
                                        <div class="text-base text-slate-500 mt-1">Closed Cases</div>
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
                                <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                            </div>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <div class="flex">
                                    <div>
                                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
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
                                    <span class="truncate">Terminal</span> <span class="font-medium ml-auto">62%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                    <span class="truncate">Cronic</span> <span class="font-medium ml-auto">33%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                    <span class="truncate">Terminal</span> <span class="font-medium ml-auto">10%</span>
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
@endsection
