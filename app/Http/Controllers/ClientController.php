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
use App\Models\History;
use App\Models\TempClientProfile;
use Carbon\Carbon;

class ClientController extends Controller
{
    // LIST OF PROFILES ------------------------------------------------------------------------------------------------
    public function listOfProfiles($user_id)
    {
        $user_info = User::find($user_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $client_profiles = ClientProfile::where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);

        return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles'));
    }

    // VIEW PROFILE ----------------------------------------------------------------------------------------------------
    public function viewProfile1($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_conditions_ids = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get('id');
        $medical_operations = MedicalOperation::all();

        return view('pages.client-profiles.view.view-profile-1', compact('user_info', 'client_profile_info', 'family_compositions', 'medical_conditions', 'medical_conditions_ids', 'medical_operations'));
    }

    public function viewProfile2($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.client-profiles.view.view-profile-2', compact('user_info', 'client_profile_info'));
    }

    // FILTER PROFILES-------------------------------------------------------------------------------------------------
    public function filterLocaleProfiles($user_id, $locale_id)
    {
        $user_info = User::find($user_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $client_profiles = ClientProfile::where('locale_id', $locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);

        return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles'));
    }
    
    public function filterDistrictProfiles($user_id, $district_id)
    {
        $user_info = User::find($user_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $filtered_locale_id = Locale::where('district_id', $district_id)->pluck('id');

        $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);

        return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles'));
    }

    public function filterDivisionProfiles($user_id, $division_id)
    {
        $user_info = User::find($user_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');

        $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);

        return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles'));
    }

    // ADD PROFILE -----------------------------------------------------------------------------------------------------
    public function addProfilePrivacy($user_id)
    {
        $user_info = User::find($user_id);
        TempClientProfile::truncate();
        session()->forget('family_comp');
        session()->forget('medical_con');
        session()->forget('medical_op');

        return view('pages.client-profiles.add.add-profile-privacy', compact('user_info'));
    }

    public function addProfile1($user_id)
    {
        $user_info = User::find($user_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        return view('pages.client-profiles.add.add-profile-1', compact('user_info', 'divisions', 'districts', 'locales'));
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

// | philhealth_member              | varchar(255)        | NO   |     | NULL    |                |
// | health_card                    | varchar(255)        | YES  |     | NULL    |                |
// | contact_person1_name           | varchar(255)        | NO   |     | NULL    |                |
// | contact_person1_contact_number | varchar(255)        | NO   |     | NULL    |                |
// | contact_person2_name           | varchar(255)        | NO   |     | NULL    |                |
// | contact_person2_contact_number | varchar(255)        | NO   |     | NULL    |                |
// | background_info                | varchar(255)        | NO   |     | NULL    |                |
// | background_info_attachment     | blob                | YES  |     | NULL    |                |
// | action_taken                   | varchar(255)        | NO   |     | NULL    |                |
// | action_taken_attachment        | blob                | YES  |     | NULL    |                |

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
            return redirect()->route('list_of_profiles', $user_id);
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
                'famComp.*.contact' => 'required'
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
        $user_info = User::find($user_id);
        $diseases = Disease::all();

        return view('pages.client-profiles.add.add-profile-3', compact('user_info', 'diseases'));
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

        $user_id = $request->userId;

        return redirect()->route('add_client_profile_4', $user_id);
    }

    public function addProfile4($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.client-profiles.add.add-profile-4', compact('user_info'));
    }

    public function addProfile4Next(Request $request)
    {
        $request->validate(
            [
                'contactPerson1' => 'required',
                'contactPerson1Number' => 'required',
                'contactPerson2' => 'required',
                'contactPerson2Number' => 'required',
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
            return redirect()->route('list_of_profiles', $user_id);
        }

    }

    public function addProfile5($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.client-profiles.add.add-profile-5', compact('user_info'));
    }

    public function addProfile5Next(Request $request)
    {
        $request->validate([
            'backgroundInfo' => 'required',
            'backgroundInfoAttachment' => 'nullable',
            'actionTaken' => 'required',
            'actionTakenAttachment' => 'nullable',
        ]);

        $backgroundInfoAttachments = $request->file('backgroundInfoAttachments');
        $backgroundInfoAttachmentBackUp = $request->backgroundInfoAttachmentBackUp;

        if ($backgroundInfoAttachments) {
            $background_info_attachments = []; 

            foreach ($backgroundInfoAttachments as $backgroundInfoAttachment) {
                $filename = $backgroundInfoAttachment->store('public');
                $background_info_attachment = basename($filename);
                array_push($background_info_attachments, $background_info_attachment); 
            }
        } elseif ($backgroundInfoAttachmentBackUp) {
            $background_info_attachments = $backgroundInfoAttachmentBackUp;
        } else {
            $background_info_attachments = null;
        }

        $actionTakenAttachments = $request->file('actionTakenAttachments');
        $actionTakenAttachmentBackUp = $request->actionTakenAttachmentBackUp;

        if ($actionTakenAttachments) {
            $action_taken_attachments = []; 

            foreach ($actionTakenAttachments as $actionTakenAttachment) {
                $filename = $actionTakenAttachment->store('public');
                $action_taken_attachment = basename($filename);
                array_push($action_taken_attachments, $action_taken_attachment); 
            }
        } elseif ($actionTakenAttachmentBackUp) {
            $action_taken_attachments = $actionTakenAttachmentBackUp;
        } else {
            $action_taken_attachments = null;
        }

        $tempCP =
        [
            'background_info' => $request->backgroundInfo,
            'background_info_attachment' => $background_info_attachments,
            'action_taken' => $request->actionTaken,
            'action_taken_attachment' => $action_taken_attachments,
        ];
        dd($tempCP);
        $user_id = $request->userId;

        $tempCP_info = TempClientProfile::where('user_encoder_id', $user_id)->orderBy('created_at', 'DESC')->first();
        $update = $tempCP_info->update($tempCP);

        if ($update) {
            return redirect()->route('add_client_profile_6', $user_id);
        } else {
            $request->session()->flash('error', 'Something has gone wrong, please try again in a moment.');
            return redirect()->route('list_of_profiles', $user_id);
        }
        
    }

    public function addProfile6($user_id)
    {
        $user_info = User::find($user_id);
        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();
        $diseases = Disease::all();

        return view('pages.client-profiles.add.add-profile-6', compact('user_info', 'divisions', 'districts', 'locales', 'diseases'));
    }

    // EDIT PROFILE ----------------------------------------------------------------------------------------------------
    public function editProfile1($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        return view('pages.client-profiles.edit.edit-profile-1', compact('user_info', 'client_profile_info', 'divisions', 'districts', 'locales'));
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
            'baptismDate' => 'required',
            'division' => 'required',
            'district' => 'required',
            'locale' => 'required',
            'contactNumber' => 'required|numeric',
            'address' => 'required',
        ]);

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;

        $file = $request->file('picture');

        if ($file) {
            $filename = $file->store('public');
            $picture = basename($filename);
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
            return redirect()->route('edit_client_profile_2', [$user_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile2($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();

        return view('pages.client-profiles.edit.edit-profile-2', compact('user_info', 'client_profile_info', 'family_compositions'));
    }

    public function editProfile2Next(Request $request)
    {
        $request->validate([
            'familyFirstName' => 'required|string',
            'familyMiddleName' => 'nullable|string',
            'familyLastName' => 'required|string',
            'familyRelationship' => 'required',
            'familyEduc' => 'required',
            'familyOccupation' => 'required|string',
            'familyContactNumber' => 'required|numeric',
        ]);

        $fam_comp_id = $request->famCompId;

        $fam_comp_update =
        [
            'first_name' => $request->familyFirstName,
            'middle_name' => $request->familyMiddleName,
            'last_name' => $request->familyLastName,
            'relationship' => $request->familyRelationship,
            'educational_attainment' => $request->familyEduc,
            'occupation' => $request->familyOccupation,
            'contact_number' =>  $request->familyContactNumber,
        ];

        $fam_comp_info = FamilyComposition::find($fam_comp_id);
        $update = $fam_comp_info->update($fam_comp_update);

        if ($update) {
            return back()->with(['status' => 'Family Composition has been saved.']);;
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile3($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_operations = MedicalOperation::all();

        $diseases = Disease::all();

        return view('pages.client-profiles.edit.edit-profile-3', compact('user_info', 'client_profile_info', 'medical_conditions', 'medical_operations', 'diseases'));
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
            return back()->with(['status' => 'Medical Condition has been saved.']);;
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

        $medical_operation_id = $request->operationId;

        $medical_operation_update =
        [
            'operation' => $request->operation,
            'date' => $request->operationDate,
        ];

        $medical_operation_info = MedicalOperation::find($medical_operation_id);
        $update = $medical_operation_info->update($medical_operation_update);

        if ($update) {
            return back()->with(['status' => 'Operation has been saved.']);;
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
            return redirect()->route('edit_client_profile_4', [$user_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile4($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.client-profiles.edit.edit-profile-4', compact('user_info', 'client_profile_info'));
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
            return redirect()->route('edit_client_profile_5', [$user_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile5($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $diseases = Disease::all();

        return view('pages.client-profiles.edit.edit-profile-5', compact('user_info', 'client_profile_info', 'diseases'));
    }

    public function editProfile5Next(Request $request)
    {
        $request->validate([
            'backgroundInfo' => 'required',
            'actionTaken' => 'required',
        ]);

        $user_id = $request->userId;
        $client_profile_id = $request->clientProfileId;

        $client_profile_update =
        [
            'background_info' => $request->backgroundInfo,
            'action_taken' => $request->actionTaken,
        ];

        $client_profile_info = ClientProfile::find($client_profile_id);

        $update = $client_profile_info->update($client_profile_update);

        if ($update) {
            $request->session()->flash('status', 'Client profile has been successfully edited!');
            
            return redirect()->route('list_of_client_profiles', [$user_id]);
        } else {
            $request->session()->flash('status!', 'Edit was unsuccessful.');

            return redirect()->route('list_of_client_profiles', [$user_id]);
        }
    }

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function listOfArchiveProfiles($user_id)
    {
        $user_info = User::find($user_id);
        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();
        
        $client_profiles_total = ClientProfile::where('status', 'Archive')->get();
        $client_profiles = ClientProfile::where('status', 'Archive')->orderBy('created_at', 'DESC')->paginate(10);

        return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles', 'client_profiles_total'));
    }

    // ARCHIVE PROFILE --------------------------------------------------------------------------------------------------
    public function archiveProfile($user_id, $client_profile_id)
    {
        $archive = ClientProfile::find($client_profile_id)->update(['status' => 'Archive']);
        if ($archive) {
            $audit_log =
            [
                'action_taken' => 'Archive',
                'date' => Carbon::now(),
                'user_id' => $user_id,
                'client_profile_id' => $client_profile_id
            ];

            $create = History::create($audit_log);
            if ($create) {
                session()->flash('status', 'Client Profile has been successfully archived.');
                return redirect()->route('list_of_client_profiles', $user_id);
            }
        } else {
            session()->flash('error', 'An error has occurred, Client Profile has not been archived.');
            return redirect()->route('list_of_client_profiles', $user_id);
        }
    }

    // RESTORE PROFILE -------------------------------------------------------------------------------------------------
    public function restoreProfile($user_id, $client_profile_id)
    {
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
    }
 
     // FILTER PROFILES -------------------------------------------------------------------------------------------------
     public function filterLocaleProfilesArchive($user_id, $locale_id)
     {
         $user_info = User::find($user_id);
 
         $divisions = Division::orderBy('division', 'ASC')->get();
         $districts = District::orderBy('district', 'ASC')->get();
         $locales = Locale::orderBy('locale', 'ASC')->get();
 
         $client_profiles_total = ClientProfile::where('status', 'Archive')->get();
         $client_profiles = ClientProfile::where('locale_id', $locale_id)->where('status', 'Archive')->paginate(10);
 
         return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles', 'client_profiles_total'));
     }
     
     public function filterDistrictProfilesArchive($user_id, $district_id)
     {
         $user_info = User::find($user_id);
 
         $divisions = Division::orderBy('division', 'ASC')->get();
         $districts = District::orderBy('district', 'ASC')->get();
         $locales = Locale::orderBy('locale', 'ASC')->get();
 
         $filtered_locale_id = Locale::where('district_id', $district_id)->pluck('id');
 
         $client_profiles_total = ClientProfile::where('status', 'Archive')->get();
         $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Archive')->paginate(10);
 
         return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles', 'client_profiles_total'));
     }
 
     public function filterDivisionProfilesArchive($user_id, $division_id)
     {
         $user_info = User::find($user_id);
 
         $divisions = Division::orderBy('division', 'ASC')->get();
         $districts = District::orderBy('district', 'ASC')->get();
         $locales = Locale::orderBy('locale', 'ASC')->get();
 
         $filtered_locale_id = Locale::where('division_id', $division_id)->pluck('id');
 
         $client_profiles = ClientProfile::whereIn('locale_id', $filtered_locale_id)->where('status', 'Archive')->paginate(10);
 
         return view(('pages.client-profiles.list-of-archive-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles', 'client_profiles_total'));
     }
     
     public function store(Request $request)
     {
         $request->validate([
             'addMoreInputFields.*.subject' => 'required'
         ]);
      
         foreach ($request->addMoreInputFields as $key => $value) {
             Student::create($value);
         }
      
         return back()->with('success', 'New subject has been added.');
     }
}
