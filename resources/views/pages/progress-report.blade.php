@extends('layout.master')

@section('content')
<!--  START: CONTENT  -->
<h2 class="intro-y text-lg font-medium mt-10">
    List of Profiles
</h2>
<div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <button class="btn btn-primary shadow-md mr-2">Add New Profiles</button>
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap"> </th>
                    <th class="whitespace-nowrap">CLIENTS NAME</th>
                    <th class="text-center whitespace-nowrap">GENDER</th>
                    <th class="text-center whitespace-nowrap">CONTACT NUMBER</th>
                    <th class="text-center whitespace-nowrap">PROFILE STATUS</th>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
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
                    <td class="w-40">
                        <div class="flex items-center justify-center ">  KNP </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 text-danger mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Archive </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View</a>
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-check-2" class="w-4 h-4 mr-1"></i> View Report </a>
                        </div>
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
@endsection