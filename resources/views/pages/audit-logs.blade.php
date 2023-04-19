@extends('layout.master')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Audit Logs
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">USER THAT EDITED/ARCHIVED</th>
                        <th class="whitespace-nowrap">PROFILE EDITED/ARCHIVED </th>
                        <th class="text-center whitespace-nowrap">ACTION TAKEN</th>
                        <th class="whitespace-nowrap">DATE</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)
                        <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="{{ route('view_user', [$user_info->id, $history->user_id]) }}" class="underline decoration-dotted whitespace-nowrap">
                                    {{ $history->user->getFullName($history->user_id) }}
                                </a>
                            </td>
                            <td class="w-40">
                                <a href="{{ route('view_profile_1', [$user_info->id, $history->client_profile_id]) }}" class="font-medium whitespace-nowrap">
                                    {{ $history->clientProfile->getFullName($history->client_profile_id) }}
                                </a>
                            </td>
                            <td class="text-center">
                                @if ( $history->action_taken == 'Edit')
                                    <div class="flex items-center justify-center whitespace-nowrap ">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $history->action_taken }}
                                    </div>
                                @elseif ( $history->action_taken == 'Archive' )
                                    <div class="flex items-center justify-center whitespace-nowrap text-danger">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $history->action_taken }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $history->dateFormatMdY($history->date) }}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y p-5 text-slate-500 grid justify-center">
            <div class="flex justify-center">
                Showing {{ $histories->firstItem() }} to {{ $histories->lastItem() }} of {{ $histories->total() }} items
            </div>
            <div class="flex justify-center">
                {{ $histories->links() }}
            </div>
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
