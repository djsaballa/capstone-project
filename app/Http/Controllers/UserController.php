<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Locale;
use App\Models\User;
use App\Models\ClientProfile;
use App\Models\FamilyComposition;
use App\Models\Disease;
use App\Models\MedicalCondition;
use App\Models\MedicalOperation;

class UserController extends Controller
{
    // LOGIN ----------------------------------------------------------------------------------------------------------
    public function login()
    {
        return view('login/login', [

        ]);
    }

    // LOGIN AUTH
    public function loginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $login_info = User::where('username', '=', $request->username)->first();

        if (!$login_info) {
            return back()->with('fail', 'Username not recognized');
        } else {
            if ($request->password != $login_info->password) {
                return back()->with('fail','Incorrect password');
            } else {
                $user_id = $login_info->id;

                return redirect(route('dashboard', $user_id));
            }
        }
    }
   
    // DASHBOARD -------------------------------------------------------------------------------------------------------
    public function dashboard($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.dashboard', compact('user_info'));
    }
    
    // LOAD DROPDOWN OPTIONS
    public function getDistrictOptions($division_id)
    {
        $districts = District::where('division_id', $division_id)->pluck('district', 'id');

        return response()->json($districts);
    }

    // PROGRESS REPORTS ------------------------------------------------------------------------------------------------
    public function viewProgressReport($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.progress-reports.view-progress-report', compact('user_info', 'client_profile_info'));
    }
    public function addProgressReport()
    {
        return view('pages.progress-reports.add-progress-report');
    }

    // LIST OF USERS ---------------------------------------------------------------------------------------------------
    public function listOfUsers($user_id)
    {
        $users = User::all();
        $user_info = User::find($user_id);

        return view('pages.users.list-of-users', compact('users', 'user_info'));
    }

    public function addUser()
    {
        return view('pages.users.add-user');
    }
    
    public function editUser()
    {
        return view('pages.users.edit-user');
    }

    // INBOX -----------------------------------------------------------------------------------------------------------
    public function inbox($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.inbox', compact('user_info'));
    }

    // AUDIT LOGS ------------------------------------------------------------------------------------------------------
    public function auditLogs($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.audit-logs', compact('user_info'));
    }
     

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function archive($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.archive', compact('user_info'));
    }


}
