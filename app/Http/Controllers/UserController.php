<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
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
use Carbon\Carbon;
use DB;

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

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'Active') {
                $user_id = Auth::user()->id;
                return redirect()->route('dashboard', $user_id);
            } else {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->with('error', 'Invalid login credentials.');
            }
        } else {
            return back()->with('error', 'Invalid login credentials.');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // DASHBOARD -------------------------------------------------------------------------------------------------------
    public function dashboard($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 1) {
                $client_profiles = ClientProfile::where('locale_id', $user_info->locale_id)->orderBy('created_at', 'DESC')->get();
            } elseif ($security_level_id == 2) {
                $filtered_locale_id = Locale::where('district_id', $user_info->district_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->orderBy('created_at', 'DESC')->get();
            } elseif ($security_level_id == 3) {
                $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->orderBy('created_at', 'DESC')->get();
            } elseif ($security_level_id == 4) {
                if ($user_info->role_id == 9) {
                    $client_profiles = ClientProfile::where('assigned_doctor_id', $user_info->id)->orderBy('created_at', 'DESC')->get();
                } else {
                    $client_profiles = ClientProfile::orderBy('created_at', 'DESC')->get();
                }
            } elseif ($security_level_id >= 5) {
                $client_profiles = ClientProfile::orderBy('created_at', 'DESC')->get();
            }

            return view('pages.dashboard', compact('user_info', 'client_profiles'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
        
    }

    // LIST OF USERS ---------------------------------------------------------------------------------------------------
    public function listOfUsers($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $users = User::where('status', 'Active')->orderBy('role_id', 'ASC')->orderBy('last_name', 'ASC')->paginate(10);
            $user_info = User::find($user_id);
    
            return view('pages.users.list-of-users', compact('users', 'user_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // CHANGE PASSWORD -------------------------------------------------------------------------------------------------
    public function changePassword($user_id, $employee_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $employee_info = User::find($employee_id);
            
            return view('pages.users.change-password', compact('user_info', 'employee_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }
    
    public function savePassword($user_id, $employee_id, $new_password)
    {
        if (Auth::user()->id == $user_id) {
            $users = User::where('status', 'Active')->orderBy('role_id', 'ASC')->paginate(10);
            $user_info = User::find($user_id);
            $employee_info = User::find($employee_id);

            $update = $employee_info->update([ 'password' => Hash::make($new_password) ]);

            if ($update) {
                session()->flash('status', 'Password has been successfully changed!');
                return view('pages.users.list-of-users', compact('users', 'user_info'));
            } else {
                session()->flash('error', 'An error has occurred and the password has not been changed.');
                return view('pages.users.list-of-users', compact('users', 'user_info'));
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }


    // VIEW USER -------------------------------------------------------------------------------------------------------
    public function viewUser($user_id, $employee_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $employee_info = User::find($employee_id);
            
            return view('pages.users.view-user', compact('user_info', 'employee_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // ADD USER --------------------------------------------------------------------------------------------------------
    public function addUser($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            if ($user_info->role_id == 11) {
                $roles = Role::where('id', '!=', '11')->orWhereNull('id')->orderBy('id', 'ASC')->get();
            } else {
                $roles = Role::where('id', '<=', '9')->orderBy('id', 'ASC')->get();
            }
            $divisions = Division::orderBy('division', 'ASC')->get();
            $districts = District::orderBy('district', 'ASC')->get();
            $locales = Locale::orderBy('locale', 'ASC')->get();
    
            return view('pages.users.add-user', compact('user_info', 'roles', 'divisions', 'districts', 'locales'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
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
                'division' => 'nullable',
                'district' => 'nullable',
                'locale' => 'nullable',
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

        do {
            $username = Str::lower($request->firstName). "" .Str::lower($request->lastName). "" .random_int(1000, 9999);
        } while (!empty(User::where('username', $username)->first()));

        $password = Str::random(10);

        $user_save =
        [
            'picture' => $picture,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'username' => $username,
            'password' => Hash::make($password),
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
            $request->session()->flash('error', 'User creation was unsuccessful.');

            return redirect()->route('list_of_users', [$user_id]);
        }
    }

    // EDIT USER -------------------------------------------------------------------------------------------------------
    public function editUser($user_id, $employee_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $employee_info = User::find($employee_id);
            if ($user_info->role_id == 11) {
                $roles = Role::where('id', '!=', '11')->orWhereNull('id')->orderBy('id', 'ASC')->get();
            } else {
                $roles = Role::where('id', '<=', '9')->orderBy('id', 'ASC')->get();
            }
            $divisions = Division::orderBy('division', 'ASC')->get();
            $districts = District::orderBy('district', 'ASC')->get();
            $locales = Locale::orderBy('locale', 'ASC')->get();
    
            return view('pages.users.edit-user', compact('user_info', 'employee_info', 'roles', 'divisions', 'districts', 'locales'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function editUserSave(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|file|mimes:png,jpeg',
            'firstName' => 'required|string',
            'middleName' => 'nullable|string',
            'lastName' => 'required|string',
            'role' => 'required',
            'division' => 'nullable',
            'district' => 'nullable',
            'locale' => 'nullable',
            'contactNumber' => 'required|numeric',
        ]);

        $user_id = $request->userId;
        $employee_id = $request->employeeId;

        $file = $request->file('picture');
        $fileBackup = $request->pictureBackup;

        if ($file) {
            $filename = $file->store('public');
            $picture = basename($filename);
        } elseif ($fileBackup) {
            $picture = $fileBackup;
        } else {
            $picture = null;
        }

        $user_update =
        [
            'picture' => $picture,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
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
            $request->session()->flash('error', 'User update was unsuccessful.');

            return redirect()->route('list_of_users', [$user_id]);
        }
    }

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function listOfArchiveUsers($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $users = User::where('status', 'Archive')->orderBy('updated_at', 'DESC')->paginate(10);
            $user_info = User::find($user_id);
    
            return view(('pages.users.list-of-archive-users'),  compact('users', 'user_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function viewArchiveUser($user_id, $employee_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $employee_info = User::find($employee_id);
            
            return view('pages.users.view-archive-user', compact('user_info', 'employee_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // ARCHIVE USER ----------------------------------------------------------------------------------------------------
    public function archiveUser($user_id, $employee_id)
    {
        if (Auth::user()->id == $user_id) {
            $archive = User::find($employee_id)->update(['status' => 'Archive']);
            if ($archive) {
                session()->flash('status', 'User has been successfully archived.');
                return redirect()->route('list_of_users', $user_id);
            } else {
                session()->flash('error', 'An error has occurred, User has not been archived.');
                return redirect()->route('list_of_users', $user_id);
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // RESTORE USER ----------------------------------------------------------------------------------------------------
    public function restoreUser($user_id, $employee_id)
    {
        if (Auth::user()->id == $user_id) {
            $restore = User::find($employee_id)->update(['status' => 'Active']);
            if ($restore) {
                session()->flash('status', 'User has been successfully restored.');
                return redirect()->route('list_of_archive_users', $user_id);
            } else {
                session()->flash('error', 'An error has occurred, User has not been restored.');
                return redirect()->route('list_of_archive_users', $user_id);
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // INBOX -----------------------------------------------------------------------------------------------------------
    public function inbox($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $users = User::all();
            $inboxes = Inbox::where('receiver_user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(15);
    
            return view('pages.inboxes.inbox', compact('user_info', 'inboxes', 'users'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function viewInbox($user_id, $inbox_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $inbox_info = Inbox::find($inbox_id);
    
            return view('pages.inboxes.view-inbox', compact('user_info', 'inbox_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver' => 'required',
            'content' => 'required',
        ]);

        $user_id = $request->userId;

        $inbox_add = [
            'date_sent' => Carbon::now()->format('Y/m/d H:i:s'),
            'sender_user_id' => $user_id,
            'receiver_user_id' => $request->receiver,
            'content' => $request->content
        ];

        $create = Inbox::create($inbox_add);

        if ($create) {
            $request->session()->flash('status', 'Message has been sent!');
            
            return redirect()->route('inbox', [$user_id]);
        } else {
            $request->session()->flash('error', 'An error has occurred and the message has not been sent.');
            
            return redirect()->route('inbox', [$user_id]);
        }
    }

    // AUDIT LOGS ------------------------------------------------------------------------------------------------------
    public function auditLogs($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $histories = History::orderBy('date', 'DESC')->paginate(10);
    
            return view('pages.audit-logs', compact('user_info', 'histories'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }
}
