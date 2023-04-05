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

class ClientController extends Controller
{
    // LIST OF PROFILES ------------------------------------------------------------------------------------------------
    public function listOfProfiles($user_id)
    {
        $user_info = User::find($user_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $client_profiles = ClientProfile::all();

        return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles' ));
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

    // DELETE PROFILE --------------------------------------------------------------------------------------------------
    public function deleteProfile($user_id, $client_profile_id)
    {
        $user_info = User::find($user_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $client_profiles = ClientProfile::all();

        $client_profile_update = [
            'status' => 'archive'
        ];
        dd($client_profile_id);
        if (!is_null($client_profile_id)) {
            // $archive = ClientProfile::find($user_id)->update($client_profile_update);
            // if ($archive) {
            //     return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles' ));
            // } else {
            //     return back()->with('message', 'Client Profile was unsuccessfully archived.');
            // }
            return view(('pages.client-profiles.list-of-profiles'), compact('user_info', 'divisions', 'districts', 'locales', 'client_profiles' ));
        } else {
            return back()->with('message', 'Deletion of Client Profile was unsuccessful.');
        }
    }

    // ADD PROFILE -----------------------------------------------------------------------------------------------------
    public function addProfilePrivacy($user_id)
    {
        $user_info = User::find($user_id);
        session()->forget('client_profile_add');

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
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'occupation' => 'required',
            'division' => 'required',
            'district' => 'required',
            'locale' => 'required',
            'contactNumber' => 'required|numeric',
            'address' => 'required',
        ]);

        $client_profile_add =
        [
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'birth_date' => $request->birthDate,
            'gender' => $request->gender,
            'age' => $request->age,
            'occupation' => $request->occupation,
            'baptism_date' => $request->baptismDate,
            'division' => $request->division,
            'district' => $request->district,
            'locale' => $request->locale,
            'contact_number' => $request->contactNumber,
            'address' => $request->address,
        ];

        session(['client_profile_add' => $client_profile_add]);

        $user_id = $request->userId;

        return redirect()->route('add_profile_3', $user_id);
    }

    public function addProfile2($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.client-profiles.add.add-profile-2', compact('user_info'));
    }

    public function addProfile2Next(Request $request)
    {
        $user_id = $request->userId;

        return redirect()->route('add_profile_3', $user_id);
    }

    public function addProfile3($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.client-profiles.add.add-profile-3', compact('user_info'));
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

        $new_add =
        [
            'contact_person1_name' => $request->contactPerson1,
            'contact_person1_contact_number' => $request->contactPerson1Number,
            'contact_person2_name' => $request->contactPerson2,
            'contact_person2_contact_number' => $request->contactPerson2Number,
        ];

        $client_profile_add = session('client_profile_add');
        $client_profile_add += $new_add;
        session()->put('client_profile_add', $client_profile_add);

        $user_id = $request->userId;
        $user_info = User::find($user_id);

        return redirect()->route('add_profile_5', $user_id);
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
            'actionTaken' => 'required',
        ]);

        $new_add =
        [
            'background_info' => $request->backgroundInfo,
            'action_taken' => $request->actionTaken,
        ];

        $client_profile_add = session('client_profile_add');
        $client_profile_add += $new_add;
        session()->put('client_profile_add', $client_profile_add);
        
        $user_id = $request->userId;

        return redirect()->route('add_profile_6', $user_id);
    }

    public function addProfile6($user_id)
    {
        $user_info = User::find($user_id);

        return view('pages.client-profiles.add.add-profile-6', compact('user_info'));
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

        $client_profile_update =
        [
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
            return redirect()->route('edit_profile_2', [$user_id, $client_profile_id]);
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
            return redirect()->route('edit_profile_4', [$user_id, $client_profile_id]);
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
            return redirect()->route('edit_profile_5', [$user_id, $client_profile_id]);
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
            
            return redirect()->route('list_of_profiles', [$user_id]);
        } else {
            $request->session()->flash('status!', 'Edit was unsuccessful.');

            return redirect()->route('list_of_profiles', [$user_id]);
        }
    }
}
