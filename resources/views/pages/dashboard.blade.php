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
                    <form action="{{route('generate_pdf',[$user_info->id]) }}" method="get" target="__black" class="ml-auto flex">
                        @csrf
                    <button class="btn btn-primary shadow-md ml-auto flex items-center ">
                        <i class="w-4 h-4 mr-2" data-lucide="file"></i> Generate Monthly Report
                    </button>
                    </form>
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
                @endphp
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box">
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
                        <div class="report-box ">
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
                        <div class="report-box ">
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
                        <div class="report-box ">
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
                                <div class="report-box ">
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
                                <div class="report-box ">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="x-circle" class="report-box__icon text-pending"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($terminated) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Terminated Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box ">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="alert-circle" class="report-box__icon text-warning"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($expired) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Expired Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box ">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="check-circle-2" class="report-box__icon text-danger"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ count($closed) }}</div>
                                        <div class="text-base text-slate-500 mt-1">Closed Cases</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    @php
                        foreach ($client_profiles as $client_profile) {
                            $dates[] = Carbon::parse($client_profile->created_at)->format('Ym');
                        }
                        foreach ($client_profiles as $client_profile) {
                            $ages[] = ['age' => Carbon::parse($client_profile->birth_date)->age, 'date' => Carbon::parse($client_profile->created_at)->format('Ym')];
                        }
                        foreach ($client_profiles as $client_profile) {
                            $categories[] = ['category' => $client_profile->medical_category_id, 'date' => Carbon::parse($client_profile->created_at)->format('Ym')];
                        }
                        foreach ($client_profiles as $client_profile) {
                            $age_genders[] = ['age' => Carbon::parse($client_profile->birth_date)->age, 'gender' => $client_profile->gender, 'date' => Carbon::parse($client_profile->created_at)->format('Ym')];
                        }
                        foreach ($client_profiles as $client_profile) {
                            $genders[] = ['gender' => $client_profile->gender, 'date' => Carbon::parse($client_profile->created_at)->format('Ym')];
                        }
                        foreach ($client_profiles as $client_profile) {
                            $brethrens[] = ['baptism_date' => $client_profile->baptism_date, 'date' => Carbon::parse($client_profile->created_at)->format('Ym')];
                        }

                        if (isset($yearmonth)) {
                            $year_month = $yearmonth;
                        } else {
                            $year_month = null;
                        }

                        $thisMonthProfiles = count(
                            array_filter($dates, function ($date) use ($year_month) {
                                if (isset($year_month)) {
                                    $thisMonth = $year_month;
                                } else {
                                    $now = Carbon::now();
                                    $thisMonth = $now->format('Ym');
                                }
                                return $date == $thisMonth;
                            }),
                        );
                        
                        if (isset($year_month)) {
                            $thisYear = substr($year_month, 0, 4);
                            $thisMonth = substr($year_month, 4, 2);
                        } else {
                            $now = Carbon::now();
                            $thisYear = $now->format('Y');
                            $thisMonth = $now->format('m');
                        }
                        $daysInMonth = Carbon::createFromDate($thisYear, $thisMonth)->daysInMonth;
                        
                        foreach ($client_profiles as $client_profile) {
                            $times[] = Carbon::parse($client_profile->created_at)->format('Y-m-d');
                        }
                        
                        for ($day = 1; $day <= $daysInMonth; $day++) {
                            $date = sprintf('%s-%02d-%02d', $thisYear, $thisMonth, $day);
                            $rowsByDay[$day] = count(
                                array_filter($times, function ($time) use ($date) {
                                    return $time == $date;
                                }),
                            );
                        }
                        
                        $sanitizedString = htmlspecialchars(implode(', ', $rowsByDay));

                        $data1 = count(
                            array_filter($ages, function ($age) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age['age'] < 13 && $age['date'] == $thisYearMonth;
                            }),
                        );
                        $data2 = count(
                            array_filter($ages, function ($age) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age['age'] >= 13 && $age['age'] <= 18 && $age['date'] == $thisYearMonth;
                            }),
                        );
                        $data3 = count(
                            array_filter($ages, function ($age) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age['age'] >= 19 && $age['age'] <= 60 && $age['date'] == $thisYearMonth;
                            }),
                        );
                        $data4 = count(
                            array_filter($ages, function ($age) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age['age'] > 60 && $age['date'] == $thisYearMonth;
                            }),
                        );

                        $data5 = count(
                            array_filter($categories, function ($category) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $category['category'] == 4 && $category['date'] == $thisYearMonth;
                            }),
                        );
                        $data6 = count(
                            array_filter($categories, function ($category) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $category['category'] == 3 && $category['date'] == $thisYearMonth;
                            }),
                        );
                        $data7 = count(
                            array_filter($categories, function ($category) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $category['category'] == 2 && $category['date'] == $thisYearMonth;
                            }),
                        );
                        $data8 = count(
                            array_filter($categories, function ($category) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $category['category'] == 1 && $category['date'] == $thisYearMonth;
                            }),
                        );

                        $data9 = count(
                            array_filter($genders, function ($gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $gender['gender'] == 'Male' && $gender['date'] == $thisYearMonth;
                            }),
                        );
                        $data10 = count(
                            array_filter($genders, function ($gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $gender['gender'] == 'Female' && $gender['date'] == $thisYearMonth;
                            }),
                        );
                        
                        $dataM1 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] < 13 && $age_gender['gender'] == 'Male' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $dataF1 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] < 13 && $age_gender['gender'] == 'Female' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $dataM2 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] >= 13 && $age_gender['age'] <= 18 && $age_gender['gender'] == 'Male' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $dataF2 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] >= 13 && $age_gender['age'] <= 18 && $age_gender['gender'] == 'Female' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $dataM3 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] >= 19 && $age_gender['age'] <= 60 && $age_gender['gender'] == 'Male' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $dataF3 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] >= 19 && $age_gender['age'] <= 60 && $age_gender['gender'] == 'Female' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $dataM4 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] > 60 && $age_gender['gender'] == 'Male' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $dataF4 = count(
                            array_filter($age_genders, function ($age_gender) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return $age_gender['age'] > 60 && $age_gender['gender'] == 'Female' && $age_gender['date'] == $thisYearMonth;
                            }),
                        );
                        $data11 = count(
                            array_filter($brethrens, function ($brethren) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return !is_null($brethren['baptism_date'])  &&  $brethren['date'] == $thisYearMonth;
                            }),
                        );
                        $data12 = count(
                            array_filter($brethrens, function ($brethren) use ($year_month) {
                                $thisYearMonth = isset($year_month) ? $year_month : Carbon::now()->format('Ym');
                                return is_null($brethren['baptism_date'])  &&  $brethren['date'] == $thisYearMonth;
                            }),
                        );
                    @endphp
                    <!-- BEGIN: Total Client Profiles Graph -->
                    <div class="col-span-12 lg:col-span-6 mt-8">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Client Profiles Chart
                            </h2>
                            <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                                <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                @php
                                    if (isset($year_month)) {
                                        $pickerMonth = substr($year_month, 4, 2);
                                    } else {
                                        $now = Carbon::now();
                                        $pickerMonth = $now->format('m');
                                    }
                                @endphp
                                <select name="monthPicker" id="monthPicker" class="form-control sm:w-28 box pl-10">
                                    <option value="{{ $pickerMonth }}" selected>{{ date("M", mktime(0, 0, 0, $pickerMonth, 1)) }}</option>
                                    <option value="01">Jan</option>
                                    <option value="02">Feb</option>
                                    <option value="03">Mar</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">Aug</option>
                                    <option value="09">Sept</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>
                                @php
                                    $now = Carbon::now();
                                    if (isset($year_month)) {
                                        $pickerYear = substr($year_month, 0, 4);
                                    } else {
                                        $pickerYear = $now->format('Y');
                                    }
                                        $nowYear = $now->format('Y');
                                        $years = range(($nowYear), 2010);
                                @endphp
                                <select name="yearPicker" id="yearPicker" class="form-control sm:w-24 box pl-5">
                                    <option value="{{ $pickerYear }}" selected>{{ $pickerYear }}</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                <input id="user_id" value="{{ $user_info->id }}" hidden>
                                <button class="btn btn-primary w-20 ml-2" onclick="changeYearMonth()">Filter</button>
                                <a class="btn btn-secondary w-20 ml-2" href="{{ route('dashboard', $user_info->id) }}">Reset</a>
                            </div>
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
                                        <div class="mt-0.5 text-slate-500">Profiles</div>
                                    </div>
                                    <div
                                        class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                    </div>
                                    <div>
                                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                            @if (isset($year_month))
                                                @php
                                                    $monthName = Carbon::createFromFormat('m', $thisMonth)->format('F');
                                                @endphp
                                                Month of {{ $monthName }} {{ $thisYear }}
                                            @else
                                                Month of {{ $now->monthName }} {{ $now->year }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="report-chart">
                                <div class="h-[310px]">
                                    <canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Total Client Profiles Graph -->
                    <!-- BEGIN: By Age Group Chart -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Profiles by Age Group
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    @if ($data1 == 0 && $data2 == 0 && $data3 == 0 && $data4 == 0)
                                        <div class="intro-y text-center pt-20">
                                            <span class="font-medium text-lg">No Data to Show</span>
                                        </div>
                                    @else
                                        <canvas id="report-pie-chart"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="data1" value="{{ $data1 }}" hidden>
                            <input id="data2" value="{{ $data2 }}" hidden>
                            <input id="data3" value="{{ $data3 }}" hidden>
                            <input id="data4" value="{{ $data4 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Under 13 Year Old</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data1 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                    <span class="truncate">13 - 18 Years Old</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data2 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">49 - 60 Years Old</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data3 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                    <span class="truncate">Older 60 Years Old</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data4 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: By Age Group Chart -->
                    <!-- BEGIN: By Medical Category Chart -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Profiles by Medical Category
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    @if ($data5 == 0 && $data6 == 0 && $data7 == 0 && $data8 == 0)
                                        <div class="intro-y text-center pt-20">
                                            <span class="font-medium text-lg">No Data to Show</span>
                                        </div>
                                    @else
                                        <canvas id="report-donut-chart"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="data5" value="{{ $data5 }}" hidden>
                            <input id="data6" value="{{ $data6 }}" hidden>
                            <input id="data7" value="{{ $data7 }}" hidden>
                            <input id="data8" value="{{ $data8 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Terminal</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data5 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Surgical</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data6 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                    <span class="truncate">Chronic</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data7 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                    <span class="truncate">With Illness</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data8 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: By Medical Category Chart -->
                    <!-- BEGIN: By Age Group and Gender Graph -->
                    <div class="col-span-12 lg:col-span-6 mt-8">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Profiles by Gender & Age Group
                            </h2>
                        </div>
                        <input id="dataM1" value="{{ $dataM1 }}" hidden>
                        <input id="dataF1" value="{{ $dataF1 }}" hidden>
                        <input id="dataM2" value="{{ $dataM2 }}" hidden>
                        <input id="dataF2" value="{{ $dataF2 }}" hidden>
                        <input id="dataM3" value="{{ $dataM3 }}" hidden>
                        <input id="dataF3" value="{{ $dataF3 }}" hidden>
                        <input id="dataM4" value="{{ $dataM4 }}" hidden>
                        <input id="dataF4" value="{{ $dataF4 }}" hidden>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <div class="flex">
                                    <div>
                                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                            {{ $thisMonthProfiles }}
                                        </div>
                                        <div class="mt-0.5 text-slate-500">Profiles</div>
                                    </div>
                                    <div
                                        class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                    </div>
                                    <div>
                                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                            @if (isset($year_month))
                                                @php
                                                    $monthName = Carbon::createFromFormat('m', $thisMonth)->format('F');
                                                @endphp
                                                Month of {{ $monthName }} {{ $thisYear }}
                                            @else
                                                Month of {{ $now->monthName }} {{ $now->year }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="report-chart">
                                <div class="h-[300px]">
                                    <canvas id="vertical-bar-chart-widget"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Age Group and Gender Graph -->
                    <!-- BEGIN: By Gender Chart -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Profiles by Gender
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="mt-3">
                                <div class="h-[250px]">
                                    @if ($data9 == 0 && $data10 == 0)
                                        <div class="intro-y text-center pt-20">
                                            <span class="font-medium text-lg">No Data to Show</span>
                                        </div>
                                    @else
                                        <canvas id="report-donut-chart-gender"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="dataM" value="{{ $data9 }}" hidden>
                            <input id="dataF" value="{{ $data10 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Male</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data9 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Female</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data10 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: By Gender Chart -->
                    <!-- BEGIN: By Member Chart -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Profiles by Member
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="mt-3">
                                <div class="h-[250px]">
                                    @if ($data11 == 0 && $data12 == 0)
                                        <div class="intro-y text-center pt-20">
                                            <span class="font-medium text-lg">No Data to Show</span>
                                        </div>
                                    @else
                                        <canvas id="report-pie-chart-member"></canvas>
                                    @endif
                                </div>
                            </div>
                            <input id="data11" value="{{ $data11 }}" hidden>
                            <input id="data12" value="{{ $data12 }}" hidden>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">Brethren</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data11 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-3"></div>
                                    <span class="truncate">Non-Brethren</span>
                                    @if ($thisMonthProfiles == 0)
                                        <span class="font-medium ml-auto">0%</span>
                                    @else
                                        <span class="font-medium ml-auto">{{ round(($data12 / $thisMonthProfiles) * 100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: By Brethren and Non-Brethren Chart -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script>
        function changeYearMonth() {
            const year = document.getElementById("yearPicker");
            const month = document.getElementById("monthPicker");
            const user = document.getElementById("user_id");

            const selectedYear = year.value;
            const selectedMonth = month.value;

            const year_month = selectedYear.toString() + selectedMonth.toString();
            const user_id = user.value;
            console.log(year_month);
            window.location.href = "/dashboard-ym/" + user_id + "/" + year_month;
        };
    </script>
@endsection
