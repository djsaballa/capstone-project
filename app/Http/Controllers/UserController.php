<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Division;
use App\Models\District;
use App\Models\Locale;
use App\Models\User;
use App\Models\Role;
use App\Models\ClientProfile;
use App\Models\FamilyComposition;
use App\Models\Disease;
use App\Models\MedicalCondition;
use App\Models\MedicalOperation;
use App\Models\Inbox;
use App\Models\History;

class UserController extends Controller
{
    // LOGIN ----------------------------------------------------------------------------------------------------------
    public function login()
    {
        return view('login/login');
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
                return back()->with('fail', 'Incorrect password');
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
        $client_profiles = ClientProfile::all();

        return view('pages.dashboard', compact('user_info', 'client_profiles'));
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
        $users = User::where('status', 'Active')->orderBy('role_id', 'ASC')->paginate(10);
        $user_info = User::find($user_id);

        return view('pages.users.list-of-users', compact('users', 'user_info'));
    }

    public function viewUser($user_id, $employee_id)
    {
        $user_info = User::find($user_id);
        $employee_info = User::find($employee_id);

        return view('pages.users.view-user', compact('user_info', 'employee_info'));
    }

    public function addUser($user_id)
    {
        $user_info = User::find($user_id);
        $roles = Role::where('role', '!=', 'Admin')->orWhereNull('role')->orderBy('id', 'ASC')->get();
        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();


        return view('pages.users.add-user', compact('user_info', 'roles', 'divisions', 'districts', 'locales'));
    }

    public function addUserSave(Request $request)
    {
        $request->validate(
            [
                'picture' => 'nullable|file|mimes:png,jpeg',
                'firstName' => 'required|string',
                'middleName' => 'nullable|string',
                'lastName' => 'required|string',
                'role' => 'required',
                'division' => 'required',
                'district' => 'required',
                'locale' => 'required',
                'contactNumber' => 'required|numeric',
            ],
            [
                'picture.mimes' => 'The uploaded file must be a PNG or JPEG image.',
            ]
        );

        $user_id = $request->userId;
        
        $file = $request->file('picture');

        if ($file) {
            $filename = $file->store('public');
            $picture = basename($filename);
        } else {
            $picture = null;
        }

        $user_save =
        [
            'picture' => $picture,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'username' => Str::lower($request->firstName). "" .Str::lower($request->lastName). "" .random_int(1000, 9999),
            'password' => Str::random(10),
            'contact_number' => $request->contactNumber,
            'status' => 'Active',
            'role_id' => $request->role,
            'locale_id' => $request->locale,
            'district_id' => $request->district,
            'division_id' => $request->division,
        ];

        $create = User::create($user_save);
        if ($create) {
            $request->session()->flash('status', 'User has been successfully added!');
            
            return redirect()->route('list_of_users', [$user_id]);
        } else {
            $request->session()->flash('status!', 'User creation was unsuccessful.');

            return redirect()->route('list_of_users', [$user_id]);
        }
    }
    
    public function editUser($user_id, $employee_id)
    {
        $user_info = User::find($user_id);
        $employee_info = User::find($employee_id);
        $roles = Role::where('role', '!=', 'Admin')->orWhereNull('role')->orderBy('id', 'ASC')->get();
        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        return view('pages.users.edit-user', compact('user_info', 'employee_info', 'roles', 'divisions', 'districts', 'locales'));
    }

    public function editUserSave(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|file|mimes:png,jpeg',
            'firstName' => 'required|string',
            'middleName' => 'nullable|string',
            'lastName' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required',
            'division' => 'nullable',
            'district' => 'nullable',
            'locale' => 'nullable',
            'contactNumber' => 'required|numeric',
        ]);

        $user_id = $request->userId;
        $employee_id = $request->employeeId;

        $file = $request->file('picture');

        if ($file) {
            $filename = $file->store('public');
            $picture = basename($filename);
        } else {
            $picture = null;
        }

        $user_update =
        [
            'picture' => $picture,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'username' => $request->username,
            'password' => $request->password,
            'contact_number' => $request->contactNumber,
            'role_id' => $request->role,
            'division_id' => $request->division,
            'district_id' => $request->district,
            'locale_id' => $request->locale,
        ];

        $user_info = User::find($employee_id);

        $update = $user_info->update($user_update);

        if ($update) {
            $request->session()->flash('status', 'User has been successfully edited!');
            
            return redirect()->route('list_of_users', [$user_id]);
        } else {
            $request->session()->flash('status!', 'User update was unsuccessful.');

            return redirect()->route('list_of_users', [$user_id]);
        }
    }

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function listOfArchiveUsers($user_id)
    {
        
        $users = User::where('status', 'Archive')->orderBy('role_id', 'ASC')->paginate(10);
        $user_info = User::find($user_id);

        return view(('pages.users.list-of-archive-users'),  compact('users', 'user_info'));
    }

    // ARCHIVE USER ----------------------------------------------------------------------------------------------------
    public function archiveUser($user_id, $employee_id)
    {
        $archive = User::find($employee_id)->update(['status' => 'Archive']);
        if ($archive) {
            session()->flash('status', 'User has been successfully archived.');
            return redirect()->route('list_of_users', $user_id);
        } else {
            session()->flash('error', 'An error has occurred, User has not been archived.');
            return redirect()->route('list_of_users', $user_id);
        }
    }

    // RESTORE USER ----------------------------------------------------------------------------------------------------
    public function restoreUser($user_id, $employee_id)
    {
        $restore = User::find($employee_id)->update(['status' => 'Active']);
        if ($restore) {
            session()->flash('status', 'User has been successfully restored.');
            return redirect()->route('list_of_archive_users', $user_id);
        } else {
            session()->flash('error', 'An error has occurred, User has not been restored.');
            return redirect()->route('list_of_archive_users', $user_id);
        }
    }

    // INBOX -----------------------------------------------------------------------------------------------------------
    public function inbox($user_id)
    {
        $user_info = User::find($user_id);
        $inboxes = Inbox::orderBy('date_sent', 'DESC')->paginate(15);

        return view('pages.inbox', compact('user_info', 'inboxes'));
    }

    // AUDIT LOGS ------------------------------------------------------------------------------------------------------
    public function auditLogs($user_id)
    {
        $user_info = User::find($user_id);
        $histories = History::orderBy('date', 'DESC')->paginate(10);

        return view('pages.audit-logs', compact('user_info', 'histories'));
    }
}
