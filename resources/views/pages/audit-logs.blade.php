@extends('layout.master')

@section('content')
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
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Russell Crowe</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square"
                                    class="w-4 h-4 mr-2"></i> Edit </div>
                        </td>
                        <td>

                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                        </td>


                    </tr>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Al Pacino</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square"
                                    class="w-4 h-4 mr-2"></i> Edit </div>
                        </td>
                        <td>

                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                        </td>


                    </tr>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Russell Crowe</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square"
                                    class="w-4 h-4 mr-2"></i> Edit </div>
                        </td>
                        <td>

                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                        </td>


                    </tr>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Al Pacino</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square"
                                    class="w-4 h-4 mr-2"></i> Edit </div>
                        </td>
                        <td>

                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                        </td>


                    </tr>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Angelina Jolie</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap "> <i data-lucide="check-square"
                                    class="w-4 h-4 mr-2"></i> Edit </div>
                        </td>
                        <td>

                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                        </td>


                    </tr>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Johnny Depp</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap "> <i
                                    data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit </div>
                        </td>
                        <td>

                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                        </td>


                    </tr>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Leonardo DiCaprio</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap "> <i
                                    data-lucide="check-square" class="w-4 h-4 mr-2"></i> Edit</div>
                        </td>
                        <td>

                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                        </td>


                    </tr>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="w-40 !py-4"> <a href=""
                                class="underline decoration-dotted whitespace-nowrap">Russell Crowe</a> </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">Kevin Spacey</a>

                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center whitespace-nowrap text-danger"> <i
                                    data-lucide="check-square" class="w-4 h-4 mr-2"></i> Archive </div>
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
@endsection
