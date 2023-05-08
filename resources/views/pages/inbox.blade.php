@extends('layout.master')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            Inbox
        </h2>
        <div class="col-span-12">
        @if (Session::has('error'))
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-10 h-10 text-danger mx-auto mt-3"></i>
                    <div class="modal-body text-success">
                        {{ Session::get('error') }}
                    </div>
                </div>
            </div>
        @endif
        @if (Session::has('status'))
        <div class="modal-body p-0">
            <div class="p-5 text-center">
                <i data-lucide="check-circle-2" class="w-10 h-10 text-success mx-auto mt-3"></i>
                <div class="modal-body text-success">
                    {{ Session::get('status') }}
                </div>
            </div>
        </div>
        @endif
            <!-- BEGIN: Modal Toggle -->
            <div class="text-end"> <a href="javascript:;" data-tw-toggle="modal"
                    data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Compose Message</a> </div>
            <!-- END: Modal Toggle -->
            <!-- BEGIN: Modal Content -->
            <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- BEGIN: Modal Header -->
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Compose Message</h2>
                            <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                    aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal"
                                        class="w-5 h-5 text-slate-500"></i> </a>
                            </div>
                           
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form method="POST" action="{{ route('send_message') }}">
                            @csrf
                            <input value="{{ $user_info->id }}" name="userId" type="hidden">
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12 sm:col-span-6">
                                    <label for="modal-form-1" class="form-label">From:</label>
                                    <input id="modal-form-1" type="text" class="form-control" name="sender" value="{{ $user_info->getFullName($user_info->id) }}" disabled>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label for="regular-form-1" class="form-label">To:</label>
                                    <div class="flex w-full sm:w-auto mr-2">
                                        <select id="receiver" data-search="true" name="receiver" oninput="checkInputs()" class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                            <option value="0" selected disabled hidden>Select Receiver</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->getFullName($user->id) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <label>Message</label>
                                <div class="mt-2">
                                    <textarea class="form-control" id="content" name="content" oninput="checkInputs()" row="25" placeholder="Write your message here"></textarea>
                                </div>
                            </div>
                            <!-- END: Modal Body -->
                            <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer">
                                <div data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</div>
                                <button type="submit" id="submit-button" class="btn btn-primary w-20" disabled>Send</button>
                            </div>
                            <!-- END: Modal Footer -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Modal Content -->
        </div>
    </div>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Inbox Content -->
            <div class="intro-y inbox box mt-5">
                <div class="p-5 flex flex-col-reverse sm:flex-row text-slate-500 border-b border-slate-200/60">
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <div class="flex">
                        <div class="w-72 flex-none flex items-center mr-5">
                            <div class="w-6 h-6 flex-none image-fit relative ml-5">
                            </div>
                            <div class="inbox__item--sender truncate ml-3">
                                From
                            </div>
                        </div>
                        <div class="w-64 sm:w-auto truncate"> <span
                                class="inbox__item--highlight">Message</div>
                    </div>
                </div>
                <div class="overflow-x-auto sm:overflow-x-visible">
                    @if ($inboxes->first())
                        @foreach ($inboxes as $inbox)
                            <div class="intro-y">
                                <div class="inbox__item inbox__item--active inline-block sm:block text-slate-600 dark:text-slate-500 bg-slate-100 dark:bg-darkmode-400/70 border-b border-slate-200/60 dark:border-darkmode-400">
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
                                            <a href="{{ route('view_user', [$user_info->id, $inbox->sender_user_id]) }}">
                                                <div class="inbox__item--sender truncate ml-3"> {{ $inbox->getSenderName($inbox->sender_user_id) }}</div>
                                            </a>
                                        </div>
                                        <div class="w-64 sm:w-auto truncate"> <span
                                                class="inbox__item--highlight">{{ $inbox->content }}</div>
                                        <div class="inbox__item--time whitespace-nowrap ml-auto pl-10">
                                            {{ $inbox->dateFormatMdY($inbox->date_sent) }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="intro-y">
                            <div class="inbox__item inbox__item--active inline-block sm:block text-slate-600 dark:text-slate-500 bg-slate-100 dark:bg-darkmode-400/70 border-b border-slate-200/60 dark:border-darkmode-400">
                            <div class="flex px-5 py-3 justify-center">
                                    Your inbox is empty
                                </div>
                            </div>
                        </div>
                    @endif
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
    <script>
    function checkInputs() {
        var input1 = document.getElementById("receiver").value;
        var input2 = document.getElementById("content").value;
        var submitBtn = document.getElementById("submit-button");

        if (input1 && input2) {
        submitBtn.disabled = false;
        } else {
        submitBtn.disabled = true;
        }
    }
    </script>
@endsection
