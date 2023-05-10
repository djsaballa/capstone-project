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
use App\Models\ProgressReport;
use Carbon\Carbon;

class ProgressController extends Controller
{
    // VIEW PROGRESS REPORTS -------------------------------------------------------------------------------------------
    public function viewProgressReport($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
            $progress_reports = ProgressReport::where('client_profile_id', $client_profile_id)->orderBy('created_at', 'DESC')->get();
    
            return view('pages.progress-reports.view-progress-report', compact('user_info', 'client_profile_info', 'progress_reports'));
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
    
    public function saveProgressReport(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'contactNumber' => 'required',
            'notes' => 'required',
            'remarks' => 'required',
        ]);

        $date = Carbon::createFromFormat('d M, Y', $request->date)->format('Y-m-d');

        $file = $request->file('attachment');
        if ($file) {
            $filename = $file->store('public');
            $attachment = basename($filename);
        } else {
            $attachment = null;
        }

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;

        $progress_report_add = [
            'date' => $date,
            'name' => $request->name,
            'contact_number' => $request->contactNumber,
            'case_note' => $request->notes,
            'remarks' => $request->remarks,
            'attachment' => $attachment,
            'client_profile_id' => $client_profile_id,
        ];

        $create = ProgressReport::create($progress_report_add);

        if ($create) {
            $request->session()->flash('status', 'Progress Report has been successfully added!');
            
            return redirect()->route('view_progress_report', [$user_id, $client_profile_id]);
        } else {
            $request->session()->flash('error', 'An error has occurred and the progress report has not been added.');
            
            return redirect()->route('view_progress_reports', [$user_id, $client_profile_id]);
        }

    }
    // VIEW ARCHIVE PROGRESS REPORTS -------------------------------------------------------------------------------------------
    public function viewArchiveReport($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
            $progress_reports = ProgressReport::where('client_profile_id', $client_profile_id)->orderBy('created_at', 'DESC')->get();
    
            return view('pages.progress-reports.view-archive-report', compact('user_info', 'client_profile_info', 'progress_reports'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }
}
