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
use Carbon\Carbon;

use PDF;
class ReportController extends Controller
{
    //PDF
    public function viewPDF($user_id, $client_profile_id){

        $user_info = User::find($user_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_operations = MedicalOperation::where('client_profile_id', '=', $client_profile_id)->get();
        $date = Carbon::now()->format("M. d, Y");

        if (!empty($client_profile_info->picture)) {
            $image = public_path('storage/'.$client_profile_info->picture);
        } else {
            $image = public_path('dist/images/profile-1.jpg');
        }

        $data = compact('user_info', 'client_profile_info', 'family_compositions', 'medical_conditions', 'medical_operations', 'date', 'image');

        $pdf = PDF::loadView('pdf.pdf-view-profile', $data )
        ->setPaper('a4', 'portrait');

        return $pdf->stream('ADDFI SSIS.pdf');
    }
    public function generatePDF(){


        $data = [
            // Data to pass to the view
        ];
        
        $pdf = PDF::loadView('pdf.pdf-generate-report', $data);
        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('ADDFI SSIS.pdf');
    }
}
