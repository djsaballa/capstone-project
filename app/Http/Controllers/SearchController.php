<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SempahoreController;
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
use App\Models\MedicalCategory;
use App\Models\History;
use App\Models\Inbox;
use App\Models\TempClientProfile;
use Carbon\Carbon;

class SearchController extends Controller
{
    
    public function searchClientProfiles(Request $request)
    {
        $request->validate([
            'keyword' => 'required',
        ]);

        $keyword = $request->keyword;
        $user_id = $request->userId;
        $user_info = User::find($user_id);

        $security_level_id = $user_info->getSecurityLevel($user_info->role_id);

        if ($security_level_id == 1) {
            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->where('locale_id', $user_info->locale_id)
                                ->where('status', 'Active')
                                ->paginate(10);
            
            return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'client_profiles'));
        } elseif ($security_level_id == 2) {
            $security_locales = Locale::where('district_id', $user_info->district_id)->orderBy('locale', 'ASC')->get();
            $filtered_locale_id = Locale::where('district_id', $user_info->district_id)->pluck('id');
            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->whereIn('locale_id', $filtered_locale_id)
                                ->where('status', 'Active')
                                ->paginate(10);
            
            return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_locales', 'client_profiles'));
        } elseif ($security_level_id == 3) {
            $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
            $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->pluck('id');
            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->whereIn('locale_id', $filtered_locale_id)
                                ->where('status', 'Active')
                                ->paginate(10);
            
            return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_districts', 'client_profiles'));
        } elseif ($security_level_id == 4) {
            $security_divisions = Division::orderBy('division', 'ASC')->get();

            if ($user_info->role_id == 9) {
                $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                        $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                    })
                                    ->orderBy('created_at', 'DESC')
                                    ->where('assigned_doctor_id', $user_id)
                                    ->where('status', 'Active')
                                    ->paginate(10);
            } else {
                $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                        $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                    })
                                    ->orderBy('created_at', 'DESC')
                                    ->where('status', 'Active')
                                    ->paginate(10);
            }
            return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles'));
        } elseif ($security_level_id >= 5) {
            $security_divisions = Division::orderBy('division', 'ASC')->get();

            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->where('status', 'Active')
                                ->paginate(10);
            return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles'));
        }
    }

    public function searchArchiveProfiles(Request $request)
    {
        $request->validate([
            'keyword' => 'required',
        ]);
        
        $keyword = $request->keyword;
        $user_id = $request->userId;
        $user_info = User::find($user_id);

        $security_level_id = $user_info->getSecurityLevel($user_info->role_id);

        if ($security_level_id == 1) {
            $client_profiles_total = ClientProfile::where('locale_id', $user_info->locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->where('locale_id', $user_info->locale_id)
                                ->whereIn('status', ['Terminated', 'Closed', 'Expired'])
                                ->paginate(10);
            
            return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'client_profiles', 'client_profiles_total'));
        } elseif ($security_level_id == 2) {
            $security_locales = Locale::where('district_id', $user_info->district_id)->orderBy('locale', 'ASC')->get();
            $filtered_locale_id = Locale::where('district_id', $user_info->district_id)->pluck('id');
            $client_profiles_total = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')->whereIn('locale_id', $filtered_locale_id)
                                ->whereIn('status', ['Terminated', 'Closed', 'Expired'])
                                ->paginate(10);
            
            return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_locales', 'client_profiles', 'client_profiles_total'));
        } elseif ($security_level_id == 3) {
            $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
            $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->pluck('id');
            $client_profiles_total = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->whereIn('locale_id', $filtered_locale_id)
                                ->whereIn('status', ['Terminated', 'Closed', 'Expired'])
                                ->paginate(10);
            
            return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'client_profiles_total'));
        } elseif ($security_level_id == 4) {
            $security_divisions = Division::orderBy('division', 'ASC')->get();

            if ($user_info->role_id == 9) {
                $client_profiles_total = ClientProfile::where('assigned_doctor_id', $user_info->id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                        $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                    })
                                    ->orderBy('created_at', 'DESC')
                                    ->where('assigned_doctor_id', $user_id)
                                    ->whereIn('status', ['Terminated', 'Closed', 'Expired'])
                                    ->paginate(10);
            } else {
                $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                        $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                            ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                    })
                                    ->orderBy('created_at', 'DESC')->whereIn('status', ['Terminated', 'Closed', 'Expired'])
                                    ->paginate(10);
            }
            return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
        } elseif ($security_level_id >= 5) {
            $security_divisions = Division::orderBy('division', 'ASC')->get();
            $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
            $client_profiles = ClientProfile::where(function ($query) use ($keyword) {
                                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->whereIn('status', ['Terminated', 'Closed', 'Expired'])
                                ->paginate(10);
            return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
        }
    }

    public function searchUsers(Request $request)
    {
        $request->validate([
            'keyword' => 'required',
        ]);
        
        $keyword = $request->keyword;
        $user_id = $request->userId;
        $user_info = User::find($user_id);

        $users = User::where(function ($query) use ($keyword) {
                            $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                        })
                        ->where('status', 'Active')
                        ->orderBy('role_id', 'ASC')
                        ->orderBy('last_name', 'ASC')
                        ->paginate(10);

        return view('pages.users.list-of-users', compact('users', 'user_info'));
       
    }

    public function searchArchiveUsers(Request $request)
    {
        $request->validate([
            'keyword' => 'required',
        ]);
        
        $keyword = $request->keyword;
        $user_id = $request->userId;
        $user_info = User::find($user_id);

        $users = User::where(function ($query) use ($keyword) {
                            $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('middle_name', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                        })
                        ->where('status', 'Archive')
                        ->orderBy('updated_at', 'DESC')
                        ->orderBy('last_name', 'ASC')
                        ->paginate(10);
                        
        return view('pages.users.list-of-archive-users', compact('users', 'user_info'));
       
    }
}
