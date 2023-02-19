@extends('layout.master')

@section('content')
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
                                 <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap"> </th>
                                    <th class="whitespace-nowrap">CLIENTS NAME</th>
                                    <th class="text-center whitespace-nowrap">GENDER</th>
                                    <th class="text-center whitespace-nowrap">CONTACT NUMBER</th>
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-4.jpg" title="Uploaded at 18 April 2021">
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                       
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center ">  09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-7.jpg" title="Uploaded at 9 October 2021">
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                        
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center ">  09123456789 </div>
                                        
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-3.jpg" title="Uploaded at 3 March 2022">
                                            </div>
                                           
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                        
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center ">  09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-6.jpg" title="Uploaded at 24 August 2022">
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                        
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center "> 09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-3.jpg" title="Uploaded at 20 April 2020">
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                        
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center ">  09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-4.jpg" title="Uploaded at 24 July 2022">
                                            </div>
                                           
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                        
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center ">  09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-7.jpg" title="Uploaded at 11 May 2021">
                                            </div>
                                           
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
        
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center ">  09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-15.jpg" title="Uploaded at 16 January 2021">
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                    
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center">  09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-2.jpg" title="Uploaded at 21 August 2020">
                                            </div>
                                           
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a> 
                                        
                                    </td>
                                    <td class="text-center">Male</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center">  09123456789 </div>
                                    </td>
                                    
                                    <td class="table-report__action w-400">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center mr-3 text-danger mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Restore </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->

                            </div>
                        </div>
                    </div>
@endsection