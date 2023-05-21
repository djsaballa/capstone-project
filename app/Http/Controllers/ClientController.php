<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Http\Controllers\SempahoreController;
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
use App\Models\TempClientProfile;
use Carbon\Carbon;

class ClientController extends Controller
{
    // LIST OF PROFILES ------------------------------------------------------------------------------------------------
    public function listOfProfiles($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 1) {
                $client_profiles = ClientProfile::where('locale_id', $user_info->locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'client_profiles'));
            } elseif ($security_level_id == 2) {
                $security_locales = Locale::where('district_id', $user_info->district_id)->orderBy('locale', 'ASC')->get();
                $filtered_locale_id = Locale::where('district_id', $user_info->district_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_locales', 'client_profiles'));
            } elseif ($security_level_id == 3) {
                $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
                $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_districts', 'client_profiles'));
            } elseif ($security_level_id == 4) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();

                if ($user_info->role_id == 9) {
                    $client_profiles = ClientProfile::where('assigned_doctor_id', $user_info->id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                } else {
                    $client_profiles = ClientProfile::where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                }
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles'));
            } elseif ($security_level_id >= 5) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();

                $client_profiles = ClientProfile::where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles'));
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // VIEW PROFILE ----------------------------------------------------------------------------------------------------
    public function viewProfile1($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
            $doctors = User::whereIn('role_id', [8, 9])->get();
            $medical_categories = MedicalCategory::all();
            $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();
            $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
            $medical_operations = MedicalOperation::where('client_profile_id', '=', $client_profile_id)->get();
    
            return view('pages.client-profiles.view.view-profile-1', compact('user_info', 'client_profile_info', 'doctors', 'medical_categories', 'family_compositions', 'medical_conditions', 'medical_operations'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function viewProfile2($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
            $doctors = User::whereIn('role_id', [8, 9])->get();
            $medical_categories = MedicalCategory::all();
    
            return view('pages.client-profiles.view.view-profile-2', compact('user_info', 'client_profile_info', 'doctors', 'medical_categories'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // ASSIGN DOCTOR AND ADD MEDICAL CATEGORY--------------------------------------------------------------------------
    public function assignDoc_AddMedCategory(Request $request)
    {
        $request->validate([
            'assignDoctor' => 'required',
            'medicalCategory' => 'required',
        ]);

        $user_id = $request->userId;
        $user_info = User::find($user_id);
        $client_profile_id = $request->clientProfileId;
        $client_profile_info = ClientProfile::find($client_profile_id);

        $update =
        [
            'assigned_doctor_id' => $request->assignDoctor,
            'medical_category_id' => $request->medicalCategory
        ];

        $cp_update = $client_profile_info->update($update);

        if ($cp_update) {
            $previous_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
            $request->session()->flash('status', 'Doctor and Medical Category have been successfully saved!');

            return redirect()->route($previous_route, [$user_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'An error has occurred, Doctor and Medical were not saved.');
        }
    }

    // ADD REMARK------------------------------------------------------------------------------------------------------
    public function addRemark(Request $request)
    {
        $request->validate([
            'remarks' => 'required',
        ]);

        $user_id = $request->userId;
        $user_info = User::find($user_id);
        $client_profile_id = $request->clientProfileId;
        $client_profile_info = ClientProfile::find($client_profile_id);
        $remark = $request->remarks;

        if ($user_info->role_id == 2) {
            $update = ['locale_servant_remark' => ($user_info->getFullName($user_info->id).": ".$remark)];
        } elseif ($user_info->role_id == 4) {
            $update = ['district_servant_remark' => $remark];
        } elseif ($user_info->role_id == 5) {
            $update = ['division_servant_remark' => $remark];
        } elseif ($user_info->role_id == 6) {
            $update = ['social_worker_recommendation' => $remark];
        }

        $cp_update = $client_profile_info->update($update);

        if ($cp_update) {
            $previous_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
            $request->session()->flash('status', 'Remark has been successfully added!');

            return redirect()->route($previous_route, [$user_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'An error has occured, Add Remark was unsuccessful.');
        }
    }

    // FILTER PROFILES-------------------------------------------------------------------------------------------------
    public function filterLocaleProfiles($user_id, $locale_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 2) {
                $security_locales = Locale::where('district_id', $user_info->district_id)->orderBy('locale', 'ASC')->get();
                $filtered_locale_id = Locale::where('district_id', $user_info->district_id)->where('id', $locale_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_locales', 'client_profiles', 'locale_id'));
            } elseif ($security_level_id == 3) {
                $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
                $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->where('id', $locale_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
            
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'locale_id'));
            } elseif ($security_level_id == 4) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                if ($user_info->role_id == 9) {
                    $client_profiles = ClientProfile::where('locale_id', $locale_id)->where('assigned_doctor_id', $user_info->id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                } else {
                    $client_profiles = ClientProfile::where('locale_id', $locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                }
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'locale_id'));
            } elseif ($security_level_id >= 5) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                $client_profiles = ClientProfile::where('locale_id', $locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);

                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'locale_id'));
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }
    
    public function filterDistrictProfiles($user_id, $district_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
        
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 3) {
                $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
                $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->where('district_id', $district_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'district_id'));
            } elseif ($security_level_id == 4) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                if ($user_info->role_id == 9) {
                    $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->where('district_id', $district_id)->pluck('id');
                    $client_profiles = ClientProfile::where('assigned_doctor_id', $user_info->id)->whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                    
                    return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'district_id'));
                } else {
                    $filtered_locale_id = Locale::where('district_id', $district_id)->pluck('id');
                    $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                }
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'district_id'));
            } elseif ($security_level_id >= 5) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                $filtered_locale_id = Locale::where('district_id', $district_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
            
                return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'district_id'));
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function filterDivisionProfiles($user_id, $division_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 4) {
                if ($user_info->role_id == 9) {
                    $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');
                    $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('assigned_doctor_id', $user_info->id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                } else {
                    $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');
                    $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
                }
            } elseif ($security_level_id >= 5) {
                $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
            }
            $security_divisions = Division::orderBy('division', 'ASC')->get();

            return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'division_id'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // ADD PROFILE -----------------------------------------------------------------------------------------------------
    public function addProfilePrivacy($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            TempClientProfile::truncate();
            session()->forget('family_comp');
            session()->forget('medical_con');
            session()->forget('medical_op');
    
            return view('pages.client-profiles.add.add-profile-privacy', compact('user_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function addProfile1($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            $divisions = Division::orderBy('division', 'ASC')->get();
            $districts = District::orderBy('district', 'ASC')->get();
            $locales = Locale::orderBy('locale', 'ASC')->get();
    
            return view('pages.client-profiles.add.add-profile-1', compact('user_info', 'divisions', 'districts', 'locales'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function addProfile1Next(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|file|mimes:png,jpeg',
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'occupation' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'division' => 'required',
            'district' => 'required',
            'locale' => 'required',
            'contactNumber' => 'required|numeric',
            'address' => 'required',
        ]);

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

        $client_profile_add =
        [
            'picture' => $picture,
            'privacy_consent' => 1,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'address' => $request->address,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact_number' => $request->contactNumber,
            'birth_date' => $request->birthDate,
            'occupation' => $request->occupation,
            'height' => $request->height,
            'weight' => $request->weight,
            'division' => $request->division,
            'district' => $request->locale,
            'locale' => $request->locale,
            'status' => 'Active',
            'baptism_date' => $request->baptismDate,
            'user_encoder_id' => $request->userId,
        ];

        $create = TempClientProfile::create($client_profile_add);
        $user_id = $request->userId;

        if ($create) {
            return redirect()->route('add_client_profile_2', $user_id);
        } else {
            $request->session()->flash('error', 'Something has gone wrong, please try again in a moment.');
            return redirect()->route('list_of_client_profiles', $user_id);
        }
    }

    public function addProfile2($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.client-profiles.add.add-profile-2', compact('user_info'));
    }

    public function addProfile2Next(Request $request)
    {
        $request->validate(
            [
                'famComp.*.name' => 'required',
                'famComp.*.relationship' => 'required',
                'famComp.*.educational' => 'required',
                'famComp.*.occupation' => 'required',
                'famComp.*.contact' => 'required|numeric'
            ],
            [
                'famComp.*.name.required' => 'Name is required',
                'famComp.*.relationship.required' => 'Relationship is required',
                'famComp.*.educational.required' => 'Educational Attainment is required',
                'famComp.*.occupation.required' => 'Occupation is required',
                'famComp.*.contact.required' => 'Contact Number is required',
            ]
        );

        foreach ($request->famComp as $key => $value) {
            $family_comp[] = $value;
        }

        session(['family_comp' => $family_comp]);
        $user_id = $request->userId;

        return redirect()->route('add_client_profile_3', $user_id);
    }

    public function addProfile3($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $diseases = Disease::all();
    
            return view('pages.client-profiles.add.add-profile-3', compact('user_info', 'diseases'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function addProfile3Next(Request $request)
    {
        $request->validate(
            [
                'medicalCondition.*.disease' => 'required',
                'medicalCondition.*.medicine' => 'required',
                'medicalCondition.*.dosage' => 'required',
                'medicalCondition.*.frequency' => 'required',
                'medicalCondition.*.doctor' => 'required',
                'medicalCondition.*.hospital' => 'required',
                'medicalOperation.*.operation' => 'nullable',
                'medicalOperation.*.date' => 'nullable',
                'philhealth' => 'required',
                'healthCard' => 'required',
            ],
            [
                'medicalCondition.*.disease.required' => 'Illness/Disease is required',
                'medicalCondition.*.medicine.required' => 'Medicine/Supplement is required',
                'medicalCondition.*.dosage.required' => 'Dosage is required',
                'medicalCondition.*.frequency.required' => 'Frequency is required',
                'medicalCondition.*.doctor.required' => 'Doctor is required',
                'medicalCondition.*.hospital.required' => 'Hospital is required',
                'philhealth.required' => 'Philhealth must be filled out',
                'healthCard.required' => 'Health Card must be filled out',
            ]
        );

        foreach ($request->medicalCondition as $key => $value) {
            $medical_con[] = $value;
        }
        
        foreach ($request->medicalOperation as $key => $value) {
            $medical_op[] = $value;
        }

        session(['medical_con' => $medical_con]);
        session(['medical_op' => $medical_op]);

        $tempCP =
        [
            'philhealth_member' => $request->philhealth,
            'health_card' => $request->healthCard,
        ];

        $user_id = $request->userId;

        $tempCP_info = TempClientProfile::where('user_encoder_id', $user_id)->orderBy('created_at', 'DESC')->first();
        $update = $tempCP_info->update($tempCP);

        if ($update) {
            return redirect()->route('add_client_profile_4', $user_id);
        } else {
            $request->session()->flash('error', 'Something has gone wrong, please try again in a moment.');
            return redirect()->route('list_of_client_profiles', $user_id);
        }


    }

    public function addProfile4($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            return view('pages.client-profiles.add.add-profile-4', compact('user_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function addProfile4Next(Request $request)
    {
        $request->validate(
            [
                'contactPerson1' => 'required',
                'contactPerson1Number' => 'required|numeric',
                'contactPerson2' => 'required',
                'contactPerson2Number' => 'required|numeric',
            ],
            [
                'contactPerson1.required' => 'Name is required',
                'contactPerson1Number.required' => 'Contact Number is required',
                'contactPerson2.required' => 'Name is required',
                'contactPerson2Number.required' => 'Contact Number is required',
            ]
        );

        $tempCP =
        [
            'contact_person1_name' => $request->contactPerson1,
            'contact_person1_contact_number' => $request->contactPerson1Number,
            'contact_person2_name' => $request->contactPerson2,
            'contact_person2_contact_number' => $request->contactPerson2Number,
        ];

        $user_id = $request->userId;

        $tempCP_info = TempClientProfile::where('user_encoder_id', $user_id)->orderBy('created_at', 'DESC')->first();
        $update = $tempCP_info->update($tempCP);

        if ($update) {
            return redirect()->route('add_client_profile_5', $user_id);
        } else {
            $request->session()->flash('error', 'Something has gone wrong, please try again in a moment.');
            return redirect()->route('list_of_client_profiles', $user_id);
        }
    }

    public function addProfile5($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            return view('pages.client-profiles.add.add-profile-5', compact('user_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function addProfile5Next(Request $request)
    {
        $request->validate([
            'backgroundInfo' => 'required',
            'backgroundInfoAttachments' => 'nullable',
            'actionTaken' => 'required',
            'actionTakenAttachments' => 'nullable',
        ]);

        $backgroundInfoAttachments = $request->file('backgroundInfoAttachments');
        $backgroundInfoAttachmentBackUp = $request->backgroundInfoAttachmentBackUp;

        if ($backgroundInfoAttachments) {
            $filename1 = $backgroundInfoAttachments->store('public');
            $background_info_attachment = basename($filename1);
        } elseif ($backgroundInfoAttachmentBackUp) {
            $background_info_attachment = $backgroundInfoAttachmentBackUp;
        } else {
            $background_info_attachment = null;
        }

        $actionTakenAttachments = $request->file('actionTakenAttachments');
        $actionTakenAttachmentBackUp = $request->actionTakenAttachmentBackUp;

        if ($actionTakenAttachments) {
            $filename2 = $actionTakenAttachments->store('public');
            $action_taken_attachment = basename($filename2);
        } elseif ($actionTakenAttachmentBackUp) {
            $action_taken_attachment = $actionTakenAttachmentBackUp;
        } else {
            $action_taken_attachment = null;
        }

        $tempCP =
        [
            'background_info' => $request->backgroundInfo,
            'background_info_attachment' => $background_info_attachment,
            'action_taken' => $request->actionTaken,
            'action_taken_attachment' => $action_taken_attachment,
        ];

        $user_id = $request->userId;

        $tempCP_info = TempClientProfile::where('user_encoder_id', $user_id)->orderBy('created_at', 'DESC')->first();
        $update = $tempCP_info->update($tempCP);

        if ($update) {
            return redirect()->route('add_client_profile_6', $user_id);
        } else {
            $request->session()->flash('error', 'Something has gone wrong, please try again in a moment.');
            return redirect()->route('list_of_client_profiles', $user_id);
        }
    }

    public function addProfile6($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $divisions = Division::orderBy('division', 'ASC')->get();
            $districts = District::orderBy('district', 'ASC')->get();
            $locales = Locale::orderBy('locale', 'ASC')->get();
            $diseases = Disease::all();
    
            return view('pages.client-profiles.add.add-profile-6', compact('user_info', 'divisions', 'districts', 'locales', 'diseases'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function addProfile6Save(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|file|mimes:png,jpeg',
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'occupation' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'division' => 'required',
            'district' => 'required',
            'locale' => 'required',
            'contactNumber' => 'required|numeric',
            'address' => 'required',
            'famComp.*.name' => 'required',
            'famComp.*.relationship' => 'required',
            'famComp.*.educational' => 'required',
            'famComp.*.occupation' => 'required',
            'famComp.*.contact' => 'required|numeric',
            'medicalCondition.*.disease' => 'required',
            'medicalCondition.*.medicine' => 'required',
            'medicalCondition.*.dosage' => 'required',
            'medicalCondition.*.frequency' => 'required',
            'medicalCondition.*.doctor' => 'required',
            'medicalCondition.*.hospital' => 'required',
            'medicalOperation.*.operation' => 'nullable',
            'medicalOperation.*.date' => 'nullable',
            'philhealth' => 'required',
            'healthCard' => 'required',
            'contactPerson1' => 'required',
            'contactPerson1Number' => 'required|numeric',
            'contactPerson2' => 'required',
            'contactPerson2Number' => 'required|numeric',
            'backgroundInfo' => 'required',
            'backgroundInfoAttachments' => 'nullable',
            'actionTaken' => 'required',
            'actionTakenAttachments' => 'nullable',
        ]);

        $user_id = $request->userId;

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

        $backgroundInfoAttachments = $request->backgroundInfoAttachments;
        if ($backgroundInfoAttachments) {
            $background_info_attachment = $backgroundInfoAttachments;
        } else {
            $background_info_attachment = null;
        }

        $actionTakenAttachments = $request->actionTakenAttachments;
        if ($actionTakenAttachments) {
            $action_taken_attachment = $actionTakenAttachments;
        } else {
            $action_taken_attachment = null;
        }


        $create_profile = [
            'picture' => $picture,
            'privacy_consent' => 1,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'address' => $request->address,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact_number' => $request->contactNumber,
            'birth_date' => $request->birthDate,
            'occupation' => $request->occupation,
            'height' => $request->height,
            'weight' => $request->weight,
            'baptism_date' => $request->baptismDate,
            'philhealth_member' => $request->philhealth,
            'health_card' => $request->healthCard,
            'contact_person1_name' => $request->contactPerson1,
            'contact_person1_contact_number' => $request->contactPerson1Number,
            'contact_person2_name' => $request->contactPerson2,
            'contact_person2_contact_number' => $request->contactPerson2Number,
            'background_info' => $request->backgroundInfo,
            'background_info_attachment' => $background_info_attachment,
            'action_taken' => $request->actionTaken,
            'action_taken_attachment' => $action_taken_attachment,
            'status' => 'Active',
            'user_encoder_id' => $user_id,
            'locale_id' => $request->locale,
        ];

        foreach ($request->famComp as $key => $value) {
            $family_comps[] = $value;
        }

        foreach ($request->medicalCondition as $key => $value) {
            $medical_cons[] = $value;
        }
        
        foreach ($request->medicalOperation as $key => $value) {
            $medical_ops[] = $value;
        }

        $create = ClientProfile::create($create_profile);
        if ($create) {
            if (!empty($family_comps)) {
                foreach ($family_comps as $index => $family_comp) {
                    FamilyComposition::create([
                        'name' => $family_comp['name'],
                        'relationship' => $family_comp['relationship'],
                        'educational_attainment' => $family_comp['educational'],
                        'occupation' => $family_comp['occupation'],
                        'contact_number' => $family_comp['contact'],
                        'client_profile_id' => $create->id
                    ]);
                }
            }
            if (!empty($medical_cons)) {
                foreach ($medical_cons as $index => $medical_con) {
                    MedicalCondition::create([
                        'since_when' => $medical_con['when'],
                        'medicine_supplements' => $medical_con['medicine'],
                        'dosage' => $medical_con['dosage'],
                        'frequency' => $medical_con['frequency'],
                        'hospital' => $medical_con['hospital'],
                        'doctor' => $medical_con['doctor'],
                        'disease_id' => $medical_con['disease'],
                        'client_profile_id' => $create->id
                    ]);
                }
            }
            if (!empty($medical_ops)) {
                foreach ($medical_ops as $index => $medical_op) {
                    MedicalOperation::create([
                        'operation' => $medical_op['operation'],
                        'date' => $medical_op['date'],
                        'client_profile_id' => $create->id
                    ]);
                }
            }

            $request->session()->flash('status', 'Client Profile has been created!');
            return redirect()->route('list_of_client_profiles', $user_id);
        } else {
            $request->session()->flash('error', 'Something has gone wrong, please try again in a moment.');
            return redirect()->route('list_of_client_profiles', $user_id);
        }
    }

    // EDIT PROFILE ----------------------------------------------------------------------------------------------------
    public function editProfile1($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
    
            $divisions = Division::orderBy('division', 'ASC')->get();
            $districts = District::orderBy('district', 'ASC')->get();
            $locales = Locale::orderBy('locale', 'ASC')->get();
    
            return view('pages.client-profiles.edit.edit-profile-1', compact('user_info', 'client_profile_info', 'divisions', 'districts', 'locales'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function editProfile1Next(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|file|mimes:png,jpeg',
            'firstName' => 'required|string',
            'middleName' => 'nullable|string',
            'lastName' => 'required|string',
            'birthDate' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'occupation' => 'required',
            'baptismDate' => 'nullable',
            'division' => 'required',
            'district' => 'required',
            'locale' => 'required',
            'contactNumber' => 'required|numeric',
            'address' => 'required',
        ]);

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;

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

        $client_profile_update =
        [
            'picture' => $picture,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'birth_date' => $request->birthDate,
            'gender' => $request->gender,
            'age' => $request->age,
            'occupation' => $request->occupation,
            'baptism_date' => $request->baptismDate,
            'locale_id' => $request->locale,
            'contact_number' => $request->contactNumber,
            'address' => $request->address,
        ];

        $client_profile_info = ClientProfile::find($client_profile_id);
        $update = $client_profile_info->update($client_profile_update);

        if ($update) {
            $histories = History::all();
            $histories_last = $histories->last();

            if (($histories_last->user_id == $user_id && $histories_last->client_profile_id == $client_profile_id && $histories_last->action_taken != 'Edit') || ($histories_last->user_id == $user_id && $histories_last->client_profile_id != $client_profile_id) || ($histories_last->user_id != $user_id)) {
                $audit_log =
                [
                    'action_taken' => 'Edit',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];

                $create = History::create($audit_log);
                if ($create) {
                    return redirect()->route('edit_client_profile_2', [$user_id, $client_profile_id]);
                } else {
                    return back()->withErrors('message', 'Edit was unsuccessful.');
                }
            } else {
                return redirect()->route('edit_client_profile_2', [$user_id, $client_profile_id]);
            }
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile2($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
            $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();
    
            return view('pages.client-profiles.edit.edit-profile-2', compact('user_info', 'client_profile_info', 'family_compositions'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function editProfile2Next(Request $request)
    {
        $request->validate([
            'familyName' => 'required|string',
            'familyRelationship' => 'required',
            'familyEduc' => 'required',
            'familyOccupation' => 'required|string',
            'familyContactNumber' => 'required|numeric',
        ]);

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;
        $fam_comp_id = $request->famCompId;

        $fam_comp_update =
        [
            'name' => $request->familyName,
            'relationship' => $request->familyRelationship,
            'educational_attainment' => $request->familyEduc,
            'occupation' => $request->familyOccupation,
            'contact_number' =>  $request->familyContactNumber,
        ];

        $fam_comp_info = FamilyComposition::find($fam_comp_id);
        $update = $fam_comp_info->update($fam_comp_update);

        if ($update) {
            $histories = History::all();
            $histories_last = $histories->last();

            if (($histories_last->user_id == $user_id && $histories_last->client_profile_id == $client_profile_id && $histories_last->action_taken != 'Edit') || ($histories_last->user_id == $user_id && $histories_last->client_profile_id != $client_profile_id) || ($histories_last->user_id != $user_id)) {
                $audit_log =
                [
                    'action_taken' => 'Edit',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];

                $create = History::create($audit_log);
                if ($create) {
                    return back()->with(['status' => 'Family Composition has been saved.']);;
                } else {
                    return back()->withErrors('message', 'Edit was unsuccessful.');
                }
            } else {
                return back()->with(['status' => 'Family Composition has been saved.']);;
            }
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile3($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
            $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
            $medical_operations = MedicalOperation::where('client_profile_id', '=', $client_profile_id)->get();
    
            $diseases = Disease::all();
    
            return view('pages.client-profiles.edit.edit-profile-3', compact('user_info', 'client_profile_info', 'medical_conditions', 'medical_operations', 'diseases'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function editProfile3MedConNext(Request $request)
    {
        $request->validate([
            'medicalConditionName' => 'required',
            'medicalConditionDate' => 'required',
            'medicalConditionDosage' => 'required',
            'medicalConditionFrequency' => 'required',
            'medicalConditionHospital' => 'required',
            'medicalDoctor' => 'required',
        ]);

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;
        $med_con_id = $request->medConId;

        $med_con_update =
        [
            'disease_id' => $request->medicalConditionName,
            'since_when' => $request->medicalConditionDate,
            'dosage' => $request->medicalConditionDosage,
            'frequency' => $request->medicalConditionFrequency,
            'hospital' => $request->medicalConditionHospital,
            'doctor' => $request->medicalDoctor,
        ];

        $med_con_info = MedicalCondition::find($med_con_id);
        $update = $med_con_info->update($med_con_update);

        if ($update) {
            $histories = History::all();
            $histories_last = $histories->last();

            if (($histories_last->user_id == $user_id && $histories_last->client_profile_id == $client_profile_id && $histories_last->action_taken != 'Edit') || ($histories_last->user_id == $user_id && $histories_last->client_profile_id != $client_profile_id) || ($histories_last->user_id != $user_id)) {
                $audit_log =
                [
                    'action_taken' => 'Edit',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];

                $create = History::create($audit_log);
                if ($create) {
                    return back()->with(['status' => 'Medical Condition has been saved.']);;
                } else {
                    return back()->withErrors('message', 'Edit was unsuccessful.');
                }
            } else {
                return back()->with(['status' => 'Medical Condition has been saved.']);;
            }
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile3OperationNext(Request $request)
    {
        $request->validate([
            'operation' => 'required',
            'operationDate' => 'required',
        ]);

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;
        $medical_operation_id = $request->operationId;

        $medical_operation_update =
        [
            'operation' => $request->operation,
            'date' => $request->operationDate,
        ];

        $medical_operation_info = MedicalOperation::find($medical_operation_id);
        $update = $medical_operation_info->update($medical_operation_update);

        if ($update) {
            $histories = History::all();
            $histories_last = $histories->last();

            if (($histories_last->user_id == $user_id && $histories_last->client_profile_id == $client_profile_id && $histories_last->action_taken != 'Edit') || ($histories_last->user_id == $user_id && $histories_last->client_profile_id != $client_profile_id) || ($histories_last->user_id != $user_id)) {
                $audit_log =
                [
                    'action_taken' => 'Edit',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];

                $create = History::create($audit_log);
                if ($create) {
                    return back()->with(['status' => 'Operation has been saved.']);;
                } else {
                    return back()->withErrors('message', 'Edit was unsuccessful.');
                }
            } else {
                return back()->with(['status' => 'Operation has been saved.']);;
            }
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile3PhilhealthNext(Request $request)
    {
        $request->validate([
            'philhealthMember' => 'required',
            'healthCard' => 'required',
        ]);

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;

        $client_profile_update =
        [
            'philhealth_member' => $request->philhealthMember,
            'health_card' => $request->healthCard,
        ];

        $client_profile_info = ClientProfile::find($client_profile_id);
        $update = $client_profile_info->update($client_profile_update);

        if ($update) {
            $histories = History::all();
            $histories_last = $histories->last();

            if (($histories_last->user_id == $user_id && $histories_last->client_profile_id == $client_profile_id && $histories_last->action_taken != 'Edit') || ($histories_last->user_id == $user_id && $histories_last->client_profile_id != $client_profile_id) || ($histories_last->user_id != $user_id)) {
                $audit_log =
                [
                    'action_taken' => 'Edit',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];

                $create = History::create($audit_log);
                if ($create) {
                    return redirect()->route('edit_client_profile_4', [$user_id, $client_profile_id]);
                } else {
                    return back()->withErrors('message', 'Edit was unsuccessful.');
                }
            } else {
                return redirect()->route('edit_client_profile_4', [$user_id, $client_profile_id]);
            }
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile4($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
    
            return view('pages.client-profiles.edit.edit-profile-4', compact('user_info', 'client_profile_info'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function editProfile4Next(Request $request)
    {
        $request->validate(
            [
                'contactPerson1' => 'required|string',
                'contactPerson1Number' => 'required|numeric',
                'contactPerson2' => 'required|string',
                'contactPerson2Number' => 'required|numeric',
            ],
            [
                'contactPerson1.required' => 'Name is required',
                'contactPerson1Number.required' => 'Contact Number is required',
                'contactPerson2.required' => 'Name is required',
                'contactPerson2Number.required' => 'Contact Number is required',
            ]
        );

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;

        $client_profile_update =
        [
            'contact_person1_name' => $request->contactPerson1,
            'contact_person1_contact_number' => $request->contactPerson1Number,
            'contact_person2_name' => $request->contactPerson2,
            'contact_person2_contact_number' => $request->contactPerson2Number,
        ];

        $client_profile_info = ClientProfile::find($client_profile_id);

        $update = $client_profile_info->update($client_profile_update);

        if ($update) {
            $histories = History::all();
            $histories_last = $histories->last();

            if (($histories_last->user_id == $user_id && $histories_last->client_profile_id == $client_profile_id && $histories_last->action_taken != 'Edit') || ($histories_last->user_id == $user_id && $histories_last->client_profile_id != $client_profile_id) || ($histories_last->user_id != $user_id)) {
                $audit_log =
                [
                    'action_taken' => 'Edit',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];

                $create = History::create($audit_log);
                if ($create) {
                    return redirect()->route('edit_client_profile_5', [$user_id, $client_profile_id]);
                } else {
                    return back()->withErrors('message', 'Edit was unsuccessful.');
                }
            } else {
                return redirect()->route('edit_client_profile_5', [$user_id, $client_profile_id]);
            }
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile5($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $client_profile_info = ClientProfile::find($client_profile_id);
            $diseases = Disease::all();
    
            return view('pages.client-profiles.edit.edit-profile-5', compact('user_info', 'client_profile_info', 'diseases'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function editProfile5Next(Request $request)
    {
        $request->validate([
            'backgroundInfo' => 'required',
            'pictureBG' => 'nullable',
            'actionTaken' => 'required',
            'pictureAT' => 'nullable',
        ]);
        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;

        $backgroundInfoAttachments = $request->file('pictureBG');
        $backgroundInfoAttachmentBackUp = $request->pictureBGBackup;

        if ($backgroundInfoAttachments) {
            $filename1 = $backgroundInfoAttachments->store('public');
            $background_info_attachment = basename($filename1);
        } elseif ($backgroundInfoAttachmentBackUp) {
            $background_info_attachment = $backgroundInfoAttachmentBackUp;
        } else {
            $background_info_attachment = null;
        }

        $actionTakenAttachments = $request->file('pictureAT');
        $actionTakenAttachmentBackUp = $request->pictureATBackup;

        if ($actionTakenAttachments) {
            $filename2 = $actionTakenAttachments->store('public');
            $action_taken_attachment = basename($filename2);
        } elseif ($actionTakenAttachmentBackUp) {
            $action_taken_attachment = $actionTakenAttachmentBackUp;
        } else {
            $action_taken_attachment = null;
        }

        $client_profile_update =
        [
            'background_info' => $request->backgroundInfo,
            'background_info_attachment' => $background_info_attachment,
            'action_taken' => $request->actionTaken,
            'action_taken_attachment' => $action_taken_attachment,
        ];

        $client_profile_info = ClientProfile::find($client_profile_id);

        $update = $client_profile_info->update($client_profile_update);

        if ($update) {
            $histories = History::all();
            $histories_last = $histories->last();

            if (($histories_last->user_id == $user_id && $histories_last->client_profile_id == $client_profile_id && $histories_last->action_taken != 'Edit') || ($histories_last->user_id == $user_id && $histories_last->client_profile_id != $client_profile_id) || ($histories_last->user_id != $user_id)) {
                $audit_log =
                [
                    'action_taken' => 'Edit',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];

                $create = History::create($audit_log);
                if ($create) {
                    $request->session()->flash('status', 'Client profile has been successfully edited!');
                    return redirect()->route('list_of_client_profiles', [$user_id]);
                } else {
                    $request->session()->flash('error', 'Edit was unsuccessful.');
                    return redirect()->route('list_of_client_profiles', [$user_id]);
                }
            } else {
                $request->session()->flash('status', 'Client profile has been successfully edited!');
                return redirect()->route('list_of_client_profiles', [$user_id]);
            }
        } else {
            $request->session()->flash('error', 'Edit was unsuccessful.');
            return redirect()->route('list_of_client_profiles', [$user_id]);
        }
    }

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function listOfArchiveProfiles($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 1) {
                $client_profiles_total = ClientProfile::where('locale_id', $user_info->locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::where('locale_id', $user_info->locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id == 2) {
                $security_locales = Locale::where('district_id', $user_info->district_id)->orderBy('locale', 'ASC')->get();
                $filtered_locale_id = Locale::where('district_id', $user_info->district_id)->pluck('id');
                $client_profiles_total = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_locales', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id == 3) {
                $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
                $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->pluck('id');
                $client_profiles_total = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id == 4) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();

                if ($user_info->role_id == 9) {
                    $client_profiles_total = ClientProfile::where('assigned_doctor_id', $user_info->id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                    $client_profiles = ClientProfile::where('assigned_doctor_id', $user_info->id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                } else {
                    $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                    $client_profiles = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                }
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id >= 5) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

     // VIEW ARCHIVE PROFILE ----------------------------------------------------------------------------------------------------
     public function viewArchiveProfile1($user_id, $client_profile_id)
     {
         if (Auth::user()->id == $user_id) {
             $user_info = User::find($user_id);
             $client_profile_info = ClientProfile::find($client_profile_id);
             $doctors = User::whereIn('role_id', [8, 9])->get();
             $medical_categories = MedicalCategory::all();
             $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();
             $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
             $medical_operations = MedicalOperation::where('client_profile_id', '=', $client_profile_id)->get();
     
             return view('pages.client-profiles.view.view-archive-profile-1', compact('user_info', 'client_profile_info', 'doctors', 'medical_categories', 'family_compositions', 'medical_conditions', 'medical_operations'));
         } else {
             Auth::guard('web')->logout();
             session()->invalidate();
             session()->regenerateToken();
             return redirect('/');
         }
     }
 
     public function viewArchiveProfile2($user_id, $client_profile_id)
     {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
            $doctors = User::whereIn('role_id', [8, 9])->get();
            $medical_categories = MedicalCategory::all();
            $client_profile_info = ClientProfile::find($client_profile_id);
    
            return view('pages.client-profiles.view.view-archive-profile-2', compact('user_info', 'doctors', 'medical_categories', 'client_profile_info'));
         } else {
             Auth::guard('web')->logout();
             session()->invalidate();
             session()->regenerateToken();
             return redirect('/');
         }
     }

    // ARCHIVE PROFILE --------------------------------------------------------------------------------------------------
    public function archiveProfile($user_id, $client_profile_id, $reason)
    {
        if (Auth::user()->id == $user_id) {
            $archive = ClientProfile::find($client_profile_id)->update(['status' => $reason]);
            if ($archive) {
                $audit_log =
                [
                    'action_taken' => $reason,
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];
    
                $create = History::create($audit_log);
                if ($create) {
                    // $sempahore = new SemaphoreController();
                    // $response = $sempahore->sendSms('09150913370', 'Etoh yung sms skl hahhaha');
                    session()->flash('status', 'Client Profile has been successfully archived.');
                    return redirect()->route('list_of_client_profiles', $user_id);
                }
            } else {
                session()->flash('error', 'An error has occurred, Client Profile has not been archived.');
                return redirect()->route('list_of_client_profiles', $user_id);
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    // RESTORE PROFILE -------------------------------------------------------------------------------------------------
    public function restoreProfile($user_id, $client_profile_id)
    {
        if (Auth::user()->id == $user_id) {
            $restore = ClientProfile::find($client_profile_id)->update(['status' => 'Active']);
            if ($restore) {
                $audit_log =
                [
                    'action_taken' => 'Restore',
                    'date' => Carbon::now(),
                    'user_id' => $user_id,
                    'client_profile_id' => $client_profile_id
                ];
    
                $create = History::create($audit_log);
                if ($create) {
                    session()->flash('status', 'Client Profile has been successfully restored.');
                    return redirect()->route('list_of_archive_profiles', $user_id);
                }
            } else {
                session()->flash('error', 'An error has occurred, Client Profile has not been restored.');
                return redirect()->route('list_of_archive_profiles', $user_id);
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

      // FILTER ARCHIVED PROFILES-------------------------------------------------------------------------------------------------
    public function filterLocaleProfilesArchive($user_id, $locale_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
    
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 2) {
                $security_locales = Locale::where('district_id', $user_info->district_id)->orderBy('locale', 'ASC')->get();
                $filtered_locale_id = Locale::where('district_id', $user_info->district_id)->where('id', $locale_id)->pluck('id');
                $filtered_user_locale_id = Locale::where('district_id', $user_info->district_id)->pluck('id');
                $client_profiles_total = ClientProfile::whereIn('locale_id', $filtered_user_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_locales', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id == 3) {
                $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
                $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->where('id', $locale_id)->pluck('id');
                $filtered_user_locale_id = Locale::where('division_id', $user_info->division_id)->pluck('id');
                $client_profiles_total = ClientProfile::whereIn('locale_id', $filtered_user_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
            
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id == 4) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                if ($user_info->role_id == 9) {
                    $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->where('assigned_doctor_id', $user_info->id)->get();
                    $client_profiles = ClientProfile::where('locale_id', $locale_id)->where('assigned_doctor_id', $user_info->id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                } else {
                    $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                    $client_profiles = ClientProfile::where('locale_id', $locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                }
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id >= 5) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::where('locale_id', $locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);

                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }
    
    public function filterDistrictProfilesArchive($user_id, $district_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
        
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 3) {
                $security_districts = District::where('division_id', $user_info->division_id)->orderBy('district', 'ASC')->get();
                $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->where('district_id', $district_id)->pluck('id');
                $filtered_user_locale_id = Locale::where('division_id', $user_info->division_id)->pluck('id');
                $client_profiles_total = ClientProfile::whereIn('locale_id', $filtered_user_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id == 4) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                if ($user_info->role_id == 9) {
                    $filtered_locale_id = Locale::where('division_id', $user_info->division_id)->where('district_id', $district_id)->pluck('id');
                    $client_profiles_total = ClientProfile::where('assigned_doctor_id', $user_info->id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                    $client_profiles = ClientProfile::where('assigned_doctor_id', $user_info->id)->whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                    
                    return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_districts', 'client_profiles', 'client_profiles_total'));
                } else {
                    $filtered_locale_id = Locale::where('district_id', $district_id)->pluck('id');
                    $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                    $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                }
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
            } elseif ($security_level_id >= 5) {
                $security_divisions = Division::orderBy('division', 'ASC')->get();
                $filtered_locale_id = Locale::where('district_id', $district_id)->pluck('id');
                $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
            
                return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
            }
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }

    public function filterDivisionProfilesArchive($user_id, $division_id)
    {
        if (Auth::user()->id == $user_id) {
            $user_info = User::find($user_id);
        
            $security_level_id = $user_info->getSecurityLevel($user_info->role_id);
    
            if ($security_level_id == 4) {
                if ($user_info->role_id == 9) {
                    $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');
                    $client_profiles_total = ClientProfile::where('assigned_doctor_id', $user_info->id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                    $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('assigned_doctor_id', $user_info->id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                } else {
                    $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');
                    $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                    $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
                }
            } elseif ($security_level_id >= 5) {
                $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');
                $client_profiles_total = ClientProfile::whereIn('status', ['Terminated', 'Closed', 'Expired'])->get();
                $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->whereIn('status', ['Terminated', 'Closed', 'Expired'])->orderBy('updated_at', 'DESC')->paginate(10);
            }
            $security_divisions = Division::orderBy('division', 'ASC')->get();

            return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'security_divisions', 'client_profiles', 'client_profiles_total'));
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
    }
     
     public function store(Request $request)
     {
        if (Auth::user()->id == $user_id) {
            $request->validate([
                'addMoreInputFields.*.subject' => 'required'
            ]);
         
            foreach ($request->addMoreInputFields as $key => $value) {
                Student::create($value);
            }
         
            return back()->with('status', 'New subject has been added.');
        } else {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/');
        }
     }
}