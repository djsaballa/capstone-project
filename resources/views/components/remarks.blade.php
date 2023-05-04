<div class="intro-y box p-5 mt-6">
    @php
        use Illuminate\Support\Facades\Route;
        
        $current_route = Route::currentRouteName();
    @endphp
    @if (preg_match('(client_profile)', $current_route))
    <div class="mt-3">
        <h2 class="text-lg font-medium truncate mr-5"> REMARKS</h2>
        <textarea class="form-control" id="FormControlTextarea1" rows="25"></textarea>
    </div>
    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
        <button class="btn btn-primary w-24 ml-2">Add</button>
        <button class="btn btn-primary w-24 ml-2">Edit</button>
    </div>
    @elseif (preg_match('(archive)', $current_route))
    <div class="mt-3">
        <h2 class="text-lg font-medium truncate mr-5"> REMARKS</h2>
        <textarea class="form-control" id="FormControlTextarea1" rows="25"></textarea>
    </div>
    @endif
</div>
