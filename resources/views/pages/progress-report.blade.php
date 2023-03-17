@extends('layout.master')

@section('content')
    <!-- START: CONTENT -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Progress Report
    </h2>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap"> </th>
                    <th class="whitespace-nowrap">Name</th>
                    <th class="text-center whitespace-nowrap">Locale</th>
                    <th class="text-center whitespace-nowrap">Gender</th>
                    <th class="text-center whitespace-nowrap">Age</th>
                    <th class="text-center whitespace-nowrap">Assigned Doctor</th>
                    <th class="text-center whitespace-nowrap">Date of Diagnosis</th>
                </tr>
            </thead>
            <tbody>
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full"
                                    src="dist/images/preview-4.jpg" title="Uploaded at 18 April 2021">
                            </div>

                        </div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">Juan Dela Cruz</a>
                    </td>
                    <td class="text-center">Locale 1</td>
                    <td class="w-40">
                        <div class="flex items-center justify-center "> Male </div>
                    </td>
                    <td class="w-40">
                        <div class="flex items-center justify-center "> 21 </div>
                    </td>
                    <td class="w-40">
                        <div class="flex items-center justify-center "> Dr.Juan Dela Cruz </div>
                    </td>
                    <td class="table-report__action w-400">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="file-plus"
                                    class="w-4 h-4 mr-1"></i> Add Report </a>
                            <a class="flex items-center mr-3 " href="javascript:;"> <i data-lucide="eye"
                                    class="w-4 h-4 mr-1"></i> View Progress</a>
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
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
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
