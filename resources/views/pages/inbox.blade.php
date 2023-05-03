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
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- HEADER: FROM, MESSAGE, DATE -->
                    <!-- HEADER: FROM, MESSAGE, DATE -->

                </div>
                <div class="overflow-x-auto sm:overflow-x-visible">
                    @foreach ($inboxes as $inbox)
                        <div class="intro-y">
                            <div
                                class="inbox__item inbox__item--active inline-block sm:block text-slate-600 dark:text-slate-500 bg-slate-100 dark:bg-darkmode-400/70 border-b border-slate-200/60 dark:border-darkmode-400">
                                <div class="flex px-5 py-3">
                                    <div class="w-72 flex-none flex items-center mr-5">
                                        <div class="w-6 h-6 flex-none image-fit relative ml-5">
                                        @if ( !empty($inbox->getSenderPicture($inbox->sender_user_id)) )
                                            <img src="{{ asset('storage/'.$inbox->user->getPicture($inbox->sender_user_id)) }}" class="rounded-md" alt="Client Image">
                                        @else
                                            <img alt="Client Image" class="rounded-md" src=" {{ asset('dist/images/profile-1.jpg')}}">
                                        @endif                                        </div>
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
                <div class="flex justify-center">
                    Showing {{ $inboxes->firstItem() }} to {{ $inboxes->lastItem() }} of {{ $inboxes->total() }} items
                </div>
                <div class="flex justify-center">
                    {{ $inboxes->links() }}
                </div>
            </div>
            <!-- END: Inbox Content -->
        </div>
        <!-- END: Content -->
    </div>
@endsection
