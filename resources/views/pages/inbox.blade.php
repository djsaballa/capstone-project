@extends('layout.master')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            Inbox
        </h2>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Inbox Content -->
            <div class="intro-y inbox box mt-5">
                <div class="p-5 flex flex-col-reverse sm:flex-row text-slate-500 border-b border-slate-200/60">

                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- BEGIN: Modal Toggle -->
                    <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal"
                            data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Show Modal</a> </div>
                    <!-- END: Modal Toggle -->
                    <!-- BEGIN: Modal Content -->
                    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- BEGIN: Modal Header -->
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto">Compose Message</h2>
                                    <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block"
                                            href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i
                                                data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>

                                    </div>
                                </div> <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                            class="form-label">From</label> <input id="modal-form-1" type="text"
                                            class="form-control" placeholder="example@gmail.com"> </div>
                                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2"
                                            class="form-label">To</label> <input id="modal-form-2" type="text"
                                            class="form-control" placeholder="example@gmail.com"> </div>
                                </div>
                                <div class="modal-body">
                                    <label>Description</label>
                                    <div class="mt-2">
                                        <textarea class="form-control" name="remarks" row="5" placeholder="Write your message here"></textarea>
                                    </div>
                                </div> <!-- END: Modal Body -->
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="button"
                                        class="btn btn-primary w-20">Send</button> </div> <!-- END: Modal Footer -->
                            </div>
                        </div>
                    </div> <!-- END: Modal Content -->

                </div>
                <div class="overflow-x-auto sm:overflow-x-visible">
                    @foreach ($inboxes as $inbox)
                        <div class="intro-y">
                            <div
                                class="inbox__item inbox__item--active inline-block sm:block text-slate-600 dark:text-slate-500 bg-slate-100 dark:bg-darkmode-400/70 border-b border-slate-200/60 dark:border-darkmode-400">
                                <div class="flex px-5 py-3">
                                    <div class="w-72 flex-none flex items-center mr-5">
                                        <div class="w-6 h-6 flex-none image-fit relative ml-5">
                                            @if (!empty($inbox->getSenderPicture($inbox->sender_user_id)))
                                                <img src="{{ asset('storage/' . $inbox->user->getPicture($inbox->sender_user_id)) }}"
                                                    class="rounded-md" alt="Client Image">
                                            @else
                                                <img alt="Client Image" class="rounded-md"
                                                    src=" {{ asset('dist/images/profile-1.jpg') }}">
                                            @endif
                                        </div>
                                        <div class="inbox__item--sender truncate ml-3">
                                            {{ $inbox->getSenderName($inbox->sender_user_id) }}</div>
                                    </div>
                                    <div class="w-64 sm:w-auto truncate"> <span
                                            class="inbox__item--highlight">{{ $inbox->content }}</div>
                                    <div class="inbox__item--time whitespace-nowrap ml-auto pl-10">
                                        {{ $inbox->dateFormatMdY($inbox->date_sent) }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="intro-y p-5 text-slate-500 grid justify-center">
                @if ($inboxes->firstItem())
                    <div class="flex justify-center">
                        Showing {{ $inboxes->firstItem() }} to {{ $inboxes->lastItem() }} of {{ $inboxes->total() }} items
                    </div>
                    <div class="flex justify-center">
                        {{ $inboxes->links() }}
                    </div>
                @else
                    <div class="flex justify-center">
                        Showing {{ $inboxes->total() }} items
                    </div>
                @endif
            </div>
            <!-- END: Inbox Content -->
        </div>
        <!-- END: Content -->
    </div>
@endsection
