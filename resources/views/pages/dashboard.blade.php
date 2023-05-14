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
                    use Carbon\Carbon;
                    
                    $archived = $client_profiles->whereIn('status', ['Terminated', 'Closed', 'Expired']);
                    $brethren = $client_profiles->whereNotNull('baptism_date');
                    $non_brethren = $client_profiles->whereNull('baptism_date');
                    $ongoing = $client_profiles->where('status', 'Active');
                    $terminated = $client_profiles->where('status', 'Terminated');
                    $expired = $client_profiles->where('status', 'Expired');
                    $closed = $client_profiles->where('status', 'Closed');
                    
                    foreach ($client_profiles as $client_profile) {
                        $dates[] = Carbon::parse($client_profile->created_at)->format('Ym');
                    }
                    foreach ($client_profiles as $client_profile) {
                        $ages[] = Carbon::parse($client_profile->birth_date)->age;
                    }
                    foreach ($client_profiles as $client_profile) {
                        $categories[] = $client_profile->medical_category_id;
                    }
                    foreach ($client_profiles as $client_profile) {
                        $age_genders[] = ['age' => Carbon::parse($client_profile->birth_date)->age, 'gender' => $client_profile->gender];
                    }
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
                                    <i data-lucide="archive" class="report-box__icon text-success"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ count($archived) }}</div>
                                <div class="text-base text-slate-500 mt-1">Total Archived Profiles</div>
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
                    <div class="col-span-12 mt-8">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="refresh-cw" class="report-box__icon text-primary"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($ongoing) }}</div>
                                        <div class="text-base text-slate-500 mt-1">On-Going Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="file-x" class="report-box__icon text-pending"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($terminated) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Terminated Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="skull" class="report-box__icon text-warning"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($expired) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Expired Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="x-circle" class="report-box__icon text-danger"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($closed) }}</div>
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
                                Client Profiles Chart
                            </h2>
                            @php
                                $thisMonthProfiles = count(
                                    array_filter($dates, function ($date) {
                                        $now = Carbon::now();
                                        $thisMonth = $now->format('Ym');
                                        return $date == $thisMonth;
                                    }),
                                );

                                $now = Carbon::now('Asia/Manila');
                                $thisYear = $now->format('Y');
                                $thisMonth = $now->format('m');
                                $daysInMonth = Carbon::createFromDate($thisYear, $thisMonth)->daysInMonth;

                                foreach ($client_profiles as $client_profile) {
                                    $times[] = Carbon::parse($client_profile->created_at)->format("Y-m-d");
                                };

                                for ($day = 1; $day <= $daysInMonth; $day++) {
                                    $date = sprintf('%s-%02d-%02d', $thisYear, $thisMonth, $day);
                                    $rowsByDay[$day] = count(
                                        array_filter($times, function ($time) use ($date) {
                                            return $time == $date;
                                        })
                                    );
                                };

                                $sanitizedString = htmlspecialchars(implode(', ', $rowsByDay));
                            @endphp
                            <input id="days" value="{{ $daysInMonth }}" hidden>
                            <input id="rowsByDay" value="{{ $sanitizedString }}" hidden>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <div class="flex">
                                    <div>
                                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                            {{ $thisMonthProfiles }}
                                        </div>
                                        <div class="mt-0.5 text-slate-500">This Month</div>
                                    </div>
                                    <div
                                        class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                    </div>
                                    <div>
                                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">Month of {{ $now->monthName; }}</div>
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
                    <!-- BEGIN: By Age Group -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Profiles by Age Group
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            @php
                                $data1 = count(
                                    array_filter($ages, function ($age) {
                                        return $age < 13;
                                    }),
                                );
                                $data2 = count(
                                    array_filter($ages, function ($age) {
                                        return $age >= 13 && $age <= 18;
                                    }),
                                );
                                $data3 = count(
                                    array_filter($ages, function ($age) {
                                        return $age >= 19 && $age <= 60;
                                    }),
                                );
                                $data4 = count(
                                    array_filter($ages, function ($age) {
                                        return $age > 60;
                                    }),
                                );
                            @endphp
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    <canvas id="report-pie-chart"></canvas>
                                </div>
                            </div>
                            <input id="data1" value="{{ $data1 }}" hidden>
                            <input id="data2" value="{{ $data2 }}" hidden>
                            <input id="data3" value="{{ $data3 }}" hidden>
                            <input id="data4" value="{{ $data4 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Under 13 Year Old</span> <span
                                        class="font-medium ml-auto">{{ round(($data1 / count($client_profiles)) * 100) }}%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                    <span class="truncate">13 - 18 Years Old</span> <span
                                        class="font-medium ml-auto">{{ round(($data2 / count($client_profiles)) * 100) }}%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">49 - 60 Years Old</span> <span
                                        class="font-medium ml-auto">{{ round(($data3 / count($client_profiles)) * 100) }}%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                    <span class="truncate">Older 60 Years Old</span> <span
                                        class="font-medium ml-auto">{{ round(($data4 / count($client_profiles)) * 100) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: By Age Group -->
                    <!-- BEGIN: By Medical Category-->
                    @php
                        $data5 = count(
                            array_filter($categories, function ($category) {
                                return $category == 4;
                            }),
                        );
                        $data6 = count(
                            array_filter($categories, function ($category) {
                                return $category == 3;
                            }),
                        );
                        $data7 = count(
                            array_filter($categories, function ($category) {
                                return $category == 2;
                            }),
                        );
                        $data8 = count(
                            array_filter($categories, function ($category) {
                                return $category == 1;
                            }),
                        );
                    @endphp
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Profiles by Medical Category
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    <canvas id="report-donut-chart"></canvas>
                                </div>
                            </div>
                            <input id="data5" value="{{ $data5 }}" hidden>
                            <input id="data6" value="{{ $data6 }}" hidden>
                            <input id="data7" value="{{ $data7 }}" hidden>
                            <input id="data8" value="{{ $data8 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Terminal</span> <span class="font-medium ml-auto">{{ round(($data5 / count($client_profiles)) * 100) }}%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Surgical</span> <span class="font-medium ml-auto">{{ round(($data6 / count($client_profiles)) * 100) }}%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                    <span class="truncate">Chronic</span> <span class="font-medium ml-auto">{{ round(($data7 / count($client_profiles)) * 100) }}%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                    <span class="truncate">With Illness</span> <span class="font-medium ml-auto">{{ round(($data8 / count($client_profiles)) * 100) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: By Medical Category -->
                    <!-- BEGIN: By Age Group and Gender  -->
                        <!-- Below 13  -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium mr-5">
                                Profiles by Gender in "Under 13 Year Old" Age Group
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            @php
                                $dataM1 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return $age_gender['age'] < 13 && $age_gender['gender'] == 'Male';
                                    }),
                                );
                                $dataF1 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return $age_gender['age'] < 13 && $age_gender['gender'] == 'Female';
                                    }),
                                );
                            @endphp
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    @if ($data1 == 0)
                                    <div class="intro-y flex text-center pt-20">
                                        <span class="font-medium text-lg">No Clients within this Age Group</span>
                                    </div>
                                    @else
                                    <canvas id="report-pie-chart-gender1"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="dataM1" value="{{ $dataM1 }}" hidden>
                            <input id="dataF1" value="{{ $dataF1 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Male</span>
                                    @if ($data1 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataM1 / $data1) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Female</span>
                                    @if ($data1 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataF1 / $data1) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- 13 to 18  -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium mr-5">
                                Profiles by Gender in "13 to 18 Years Old" Age Group
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            @php
                                $dataM2 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return ($age_gender['age'] >= 13 && $age_gender['age'] <= 18) && $age_gender['gender'] == 'Male';
                                    }),
                                );
                                $dataF2 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return ($age_gender['age'] >= 13 && $age_gender['age'] <= 18) && $age_gender['gender'] == 'Female';
                                    }),
                                );
                            @endphp
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    @if ($data2 == 0)
                                    <div class="intro-y flex text-center pt-20">
                                        <span class="font-medium text-lg">No Clients within this Age Group</span>
                                    </div>
                                    @else
                                    <canvas id="report-pie-chart-gender2"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="dataM2" value="{{ $dataM2 }}" hidden>
                            <input id="dataF2" value="{{ $dataF2 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Male</span>
                                    @if ($data2 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataM2 / $data2) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Female</span>
                                    @if ($data2 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataF2 / $data2) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- 19 to 60  -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium mr-5">
                                Profiles by Gender in "19 to 60 Years Old" Age Group
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            @php
                                $dataM3 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return ($age_gender['age'] >= 19 && $age_gender['age'] <= 60) && $age_gender['gender'] == 'Male';
                                    }),
                                );
                                $dataF3 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return ($age_gender['age'] >= 19 && $age_gender['age'] <= 60) && $age_gender['gender'] == 'Female';
                                    }),
                                );
                            @endphp
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    @if ($data3 == 0)
                                    <div class="intro-y flex text-center pt-20">
                                        <span class="font-medium text-lg">No Clients within this Age Group</span>
                                    </div>
                                    @else
                                    <canvas id="report-pie-chart-gender3"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="dataM3" value="{{ $dataM3 }}" hidden>
                            <input id="dataF3" value="{{ $dataF3 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Male</span>
                                    @if ($data3 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataM3 / $data3) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Female</span>
                                    @if ($data3 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataF3 / $data3) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <!-- Over 60  -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium mr-5">
                                Profiles by Gender in "Over 60 Years Old" Age Group
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            @php
                                $dataM4 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return $age_gender['age'] > 60 && $age_gender['gender'] == 'Male';
                                    }),
                                );
                                $dataF4 = count(
                                    array_filter($age_genders, function ($age_gender) {
                                        return $age_gender['age'] > 60 && $age_gender['gender'] == 'Female';
                                    }),
                                );
                            @endphp
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    @if ($data4 == 0)
                                    <div class="intro-y flex text-center pt-20">
                                        <span class="font-medium text-lg">No Clients within this Age Group</span>
                                    </div>
                                    @else
                                    <canvas id="report-pie-chart-gender4"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="dataM4" value="{{ $dataM4 }}" hidden>
                            <input id="dataF4" value="{{ $dataF4 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Male</span>
                                    @if ($data4 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataM4 / $data4) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Female</span>
                                    @if ($data4 == 0)
                                    <span class="font-medium ml-auto">0%</span>
                                    @else
                                    <span class="font-medium ml-auto">{{ round(($dataF4 / $data4) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Client Ages -->

                </div>
            </div>
        </div>
    </div>
@endsection
