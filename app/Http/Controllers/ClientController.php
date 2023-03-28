<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Locale;
use App\Models\Employee;
use App\Models\ClientProfile;
use App\Models\FamilyComposition;
use App\Models\Disease;
use App\Models\MedicalCondition;
use App\Models\MedicalOperation;

class ClientController extends Controller
{
    // LIST OF PROFILES ------------------------------------------------------------------------------------------------
    public function listOfProfiles($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $client_profiles = ClientProfile::all();

        return view(('pages.client-profiles.list-of-profiles'), compact('employee_info', 'divisions', 'districts', 'locales', 'client_profiles' ));
    }

    // VIEW PROFILE ----------------------------------------------------------------------------------------------------
    public function viewProfile1($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_conditions_ids = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get('id');
        $medical_operations = MedicalOperation::all();

        return view('pages.client-profiles.view.view-profile-1', compact('employee_info', 'client_profile_info', 'family_compositions', 'medical_conditions', 'medical_conditions_ids', 'medical_operations'));
    }

    public function viewProfile2($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.client-profiles.view.view-profile-2', compact('employee_info', 'client_profile_info'));
    }

    // DELETE PROFILE --------------------------------------------------------------------------------------------------
    public function deleteProfile($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $client_profiles = ClientProfile::all();


        dd($client_profile_id);
        if(!is_null($client_profile_id)) {
            // $delete = ClientProfile::find($employee_id)->delete();
            // if($delete) {
            //     return view(('pages.client-profiles.list-of-profiles'), compact('employee_info', 'divisions', 'districts', 'locales', 'client_profiles' ));
            // } else {
            //     return back()->with('message', 'Deletion of Client Profile was unsuccessful.');
            // }
            return view(('pages.client-profiles.list-of-profiles'), compact('employee_info', 'divisions', 'districts', 'locales', 'client_profiles' ));
        } else {
            return back()->with('message', 'Deletion of Client Profile was unsuccessful.');
        }
    }

    // ADD PROFILE -----------------------------------------------------------------------------------------------------
    public function addProfilePrivacy($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.client-profiles.add.add-profile-privacy', compact('employee_info'));
    }

    public function addProfile1($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.client-profiles.add.add-profile-1', compact('employee_info'));
    }

    public function addProfile2($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.client-profiles.add.add-profile-2', compact('employee_info'));
    }

    public function addProfile3($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.client-profiles.add.add-profile-3', compact('employee_info'));
    }

    public function addProfile4($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.client-profiles.add.add-profile-4', compact('employee_info'));
    }

    public function addProfile5($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.client-profiles.add.add-profile-5', compact('employee_info'));
    }

    // EDIT PROFILE ----------------------------------------------------------------------------------------------------
    public function editProfile1($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        return view('pages.client-profiles.edit.edit-profile-1', compact('employee_info', 'client_profile_info', 'divisions', 'districts', 'locales'));
    }

    public function editProfile1Next(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'occupation' => 'required',
            'baptismDate' => 'required',
            'division' => 'required',
            'district' => 'required',
            'locale' => 'required',
            'contactNumber' => 'required',
            'address' => 'required',
        ]);

        $employee_id = $request->employeeId;
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
            'division' => $request->division,
            'district' => $request->district,
            'locale' => $request->locale,
            'contact_number' => $request->contactNumber,
            'address' => $request->address,
        ];

        $client_profile_info = ClientProfile::find($client_profile_id);

        $update = $client_profile_info->update($client_profile_update);

        if($update) {
            return redirect()->route('edit_profile_2', [$employee_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile2($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();

        return view('pages.client-profiles.edit.edit-profile-2', compact('employee_info', 'client_profile_info', 'family_compositions'));
    }

    public function editProfile2Next(Request $request)
    {
        $request->validate([
            'familyFirstName' => 'required',
            'familyLastName' => 'required',
            'familyRelationship' => 'required',
            'familyEduc' => 'required',
            'familyOccupation' => 'required',
            'familyContactNumber' => 'required',
        ]);

        $employee_id = $request->employeeId;
        $client_profile_id = $request->clientProfileId;
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

        dd($fam_comp_update);

        $fam_comp_info = FamilyComposition::find($fam_comp_id);
        $update = $fam_comp_info->update($fam_comp_update);

        if($update) {
            return redirect()->route('edit_profile_2', [$employee_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile3($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_operations = MedicalOperation::all();

        $diseases = Disease::all();

        return view('pages.client-profiles.edit.edit-profile-3', compact('employee_info', 'client_profile_info', 'medical_conditions', 'medical_operations', 'diseases'));
    }

    public function editProfile4($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.client-profiles.edit.edit-profile-4', compact('employee_info', 'client_profile_info'));
    }

    public function editProfile4Next(Request $request)
    {
        $request->validate([
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
        ]);

        $employee_id = $request->employeeId;
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

        if($update) {
            return redirect()->route('edit_profile_5', [$employee_id, $client_profile_id]);
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }

    public function editProfile5($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.client-profiles.edit.edit-profile-5', compact('employee_info', 'client_profile_info'));
    }

    public function editProfile5Next(Request $request)
    {
        $request->validate([
            'backgroundInfo' => 'required',
            'actionTaken' => 'required',
        ]);

        $employee_id = $request->employeeId;
        $client_profile_id = $request->clientProfileId;

        $client_profile_update = 
        [
            'background_info' => $request->backgroundInfo,
            'action_taken' => $request->actionTaken,
        ];

        $client_profile_info = ClientProfile::find($client_profile_id);

        $update = $client_profile_info->update($client_profile_update);

        if($update) {
            return redirect()->route('list_of_profiles', [$employee_id]);
        } else {
            return back()->withErrors('message', 'Edit was unsuccessful.');
        }
    }
}
