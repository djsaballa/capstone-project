<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Locale;
use App\Models\Employee;

class EmployeeController extends Controller
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

        $login_info = Employee::where('username', '=', $request->username)->first();

        if (!$login_info) {
            return back()->with('fail', 'Username not recognized');
        } else {
            if ($request->password != $login_info->password) {
                return back()->with('fail','Incorrect password');
            } else {
                $employee_id = $login_info->id;

                return redirect(route('dashboard', $employee_id));
            }
        }
    }
   
    // DASHBOARD -------------------------------------------------------------------------------------------------------
    public function dashboard($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.dashboard', compact('employee_info'));
    }
    
    // LIST OF PROFILES ------------------------------------------------------------------------------------------------
    public function listOfProfiles()
    {
        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        return view(('pages.list-of-profiles'), compact('divisions', 'districts', 'locales'));
    }

    // ADD PROFILE
    public function addProfilePrivacy()
    {
        return view('pages.add-profile-privacy');
    }

    public function addProfile1()
    {
        return view('pages.add-profile-1');
    }

    public function addProfile2()
    {
        return view('pages.add-profile-2');
    }

    public function addProfile3()
    {
        return view('pages.add-profile-3');
    }

    public function addProfile4()
    {
        return view('pages.add-profile-4');
    }

    public function addProfile5()
    {
        return view('pages.add-profile-5');
    }
    // EDIT PROFILE

    public function editProfile1()
    {
        return view('pages.edit-profile-1');
    }

    public function editProfile2()
    {
        return view('pages.edit-profile-2');
    }

    public function editProfile3()
    {
        return view('pages.edit-profile-3');
    }

    public function editProfile4()
    {
        return view('pages.edit-profile-4');
    }

    public function editProfile5()
    {
        return view('pages.edit-profile-5');
    }
    // VIEW PROFILE ---------------------------------------------------------------------------------------------------------
    public function viewProfile1()
    {
        return view('pages.view-profile-1');
    }
    public function viewProfile2()
    {
        return view('pages.view-profile-2');
    }

    // LIST OF USERS ---------------------------------------------------------------------------------------------------
    public function listOfUsers()
    {
        $employees = Employee::all();
        return view('pages.list-of-users', compact('employees'));
    }

    public function addUser()
    {
        return view('pages.add-user');
    }
    
    public function editUser()
    {
        return view('pages.edit-user');
    }

    // INBOX -----------------------------------------------------------------------------------------------------------
    public function inbox()
    {
        return view('pages.inbox');
    }

    // AUDIT LOGS ------------------------------------------------------------------------------------------------------
    public function auditLogs()
    {
        return view('pages.audit-logs');
    }
     

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function archive()
    {
        return view('pages.archive');
    }


}
