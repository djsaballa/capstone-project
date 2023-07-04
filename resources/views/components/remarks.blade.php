<div class="intro-y box p-5 mt-6">
    @php
        use Illuminate\Support\Facades\Route;
        
        $current_route = Route::currentRouteName();
    @endphp
    @if (preg_match('(client_profile)', $current_route))
        <div class="mt-3">
            <h2 class="text-lg font-medium truncate mr-5"> REMARKS</h2>
            <div class="box bg-secondary">
                <div class="intro-y p-3">
                    @if ($client_profile_info->locale_servant_remark){{ $client_profile_info->locale_servant_remark }}@endif
                </div>
                <div class="intro-y p-3">
                    @if ($client_profile_info->zone_servant_remark){{ $client_profile_info->zone_servant_remark }}@endif
                </div>
                <div class="intro-y p-3">
                    @if ($client_profile_info->district_servant_remark){{ $client_profile_info->district_servant_remark }}@endif
                </div>
                <div class="intro-y p-3">
                    @if ($client_profile_info->social_worker_recommendation){{ $client_profile_info->social_worker_recommendation }}@endif
                </div>
            </div>
        </div>
        @if ($user_info->role_id == 2 || $user_info->role_id == 4 || $user_info->role_id == 5 || $user_info->role_id == 6)
            <form action="{{ route('add_remark') }}" method="POST">
                @csrf
                <input type="hidden" name="userId" value="{{ $user_info->id }}">
                <input type="hidden" name="clientProfileId" value="{{ $client_profile_info->id }}">
                <div class="mt-3">
                    <textarea class="form-control" name="remarks" row="10" placeholder="Type Remark Here"></textarea>
                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-1 mb-3">
                    <button class="btn btn-primary w-24 ml-2" type="submit">Add</button>
                </div>
            </form>
        @endif
    @elseif (preg_match('(archive)', $current_route))
        <div class="mt-3">
            <h2 class="text-lg font-medium truncate mr-5"> REMARKS</h2>
            <textarea class="form-control" id="FormControlTextarea1" rows="25" disabled></textarea>
        </div>
    @endif

    <!-- BEGIN: Modal Toggle -->
    <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#button-slide-over-preview"
            class="btn btn-primary">View Remark</a> </div> <!-- END: Modal Toggle -->
    <!-- BEGIN: Modal Content -->
    <div id="button-slide-over-preview" class="modal modal-slide-over" data-tw-backdrop="static" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"> <a data-tw-dismiss="modal" href="javascript:;"> <i data-lucide="x"
                        class="w-8 h-8 text-slate-400"></i> </a>
                <div class="modal-header p-5">
                    <h2 class="font-medium text-base mr-auto">REMARKS</h2>
                </div>
                <div class="modal-body">
                    @if ($client_profile_info->locale_servant_remark)
                        <p class="p-2"> {{ $client_profile_info->locale_servant_remark }} </p>
                    @endif
                    @if ($client_profile_info->zone_servant_remark)
                        <p class="p-2"> {{ $client_profile_info->zone_servant_remark }} </p>
                    @endif
                    @if ($client_profile_info->district_servant_remark)
                        <p class="p-2"> {{ $client_profile_info->district_servant_remark }} </p>
                    @endif
                    @if ($client_profile_info->social_worker_recommendation)
                        <p class="p-2"> {{ $client_profile_info->social_worker_recommendation }} </p>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- END: Modal Content -->
</div>
