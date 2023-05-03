<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Division;
use App\Models\District;
use App\Models\Locale;
use App\Models\User;
use App\Models\ClientProfile;
use App\Models\FamilyComposition;
use App\Models\Disease;
use App\Models\MedicalCondition;
use App\Models\MedicalOperation;
use App\Models\History;
use Carbon\Carbon;

class ProgressController extends Controller
{
    // VIEW PROGRESS REPORTS -------------------------------------------------------------------------------------------
    public function viewProgressReport($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
    
            return view('pages.progress-reports.view-progress-report', compact('user_info', 'client_profile_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // ADD PROGRESS REPORTS --------------------------------------------------------------------------------------------
    public function addProgressReport($user_id, $client_profile_id)
    {
       if (Auth::user()->id == $user_id) {
           $user_info = User::find($user_id);
           $client_profile_info = ClientProfile::find($client_profile_id);
    
           return view('pages.progress-reports.add-progress-report', compact('user_info', 'client_profile_info'));
       } else {
           Auth::guard('web')->logout();
           session()->invalidate();
           session()->regenerateToken();
           return redirect('/');
       }
    }
    // VIEW ARCHIVE PROGRESS REPORTS -------------------------------------------------------------------------------------------
    public function viewArchiveReport($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
    
            return view('pages.progress-reports.view-archive-report', compact('user_info', 'client_profile_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }
}
