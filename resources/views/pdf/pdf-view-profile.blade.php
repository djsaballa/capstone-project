<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-size: 10
        }

        p {
            font-size: 10;
        }
    </style>
</head>

<body>
    <h2>Client's Profile</h2>
    <p>LOCALE: </p>
    <p>NAME: </p>
    <p>ADDRESS:</p>
    <p>AGE, GENDER: </p>
    <p>BIRTHDATE:</p>
    <p>OCCUPATION:</p>
    <p>HEIGHT:</p>
    <p>WEIGHT:</p>
    <p>BAPTISM DATE:</p>

    <h5>FAMILY COMPOSITION</h5>
    <table>
        <tr>
            <th>NAME (CIVIL STATUS)</th>
            <th>RELATIONSHIP</th>
            <th>EDUCATIONAL ATTAINMENT</th>
            <th>OCCUPATION</th>
            <th>TEL/CEL. NO.</th>
        </tr>
        @foreach ($family_compositions as $family_composition)
            <tr>
                <td>{{ $family_composition->getFullName($family_composition->id) }}</td>
                <td>{{ $family_composition->relationship }}</td>
                <td>{{ $family_composition->educational_attainment }}</td>
                <td>{{ $family_composition->occupation }}</td>
                <td>{{ $family_composition->contact_number }}</td>
            </tr>
        @endforeach
    </table>

    <h5>MEDICAL CONDITION/KALAGAYANG MEDIKAL:</h5>
    <table>
        <tr>
            <th>ANO SAKIT?</th>
            <th>KAILAN PA?</th>
            <th>GAMOT NA INIINOM?</th>
            <th>DOSAGE?</th>
            <th>GAANO KADALAS INUMIN?</th>
        </tr>
        @foreach ($family_compositions as $family_composition)
            <tr>
                <th scope="row">{{ $family_composition->getFullName($family_composition->id) }}
                </th>
                <td>{{ $family_composition->relationship }}</td>
                <td>{{ $family_composition->educational_attainment }}</td>
                <td>{{ $family_composition->occupation }}</td>
                <td>{{ $family_composition->contact_number }}</td>
            </tr>
        @endforeach
    </table>

    <h5>ALLERGIES-(SA PAGKAIN,GAMOT,BAGAY,ETC.)</h5>
    <table>
        <tr>
            <th>MGA NAGING OPERASYON</th>
            <th>PETSA</th>
        </tr>
        @foreach ($medical_conditions as $medical_condition)
            @php
                $matching_objects = $medical_operations->where('medical_condition_id', $medical_condition->id);
            @endphp

            @if ($matching_objects->first())
                @foreach ($matching_objects as $matching_object)
                    <tr>
                        <td>{{ $matching_object->operation }}</td>
                        <td>{{ $medical_condition->dateFormatMdY($matching_object->date) }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th>None</th>
                    <th>None</th>
                </tr>
            @endif
        @endforeach
    </table>

    <table style="margin-top: 2rem ">
        <thead>
            <tr>
                <th>DOCTOR </th>
                <th>HOSPITAL</th>
                <th>Do you have Phil-health Card? Please
                    Specify </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medical_conditions as $medical_condition)
                <tr>
                    <td>{{ $medical_condition->hospital }}</td>
                    <td>{{ $medical_condition->doctor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="contact">
        <h5>CONTACT PERSONS IN CASES OF EMERGENCY/TATAWAGANG TAO SA ORAS NG EMERGENCY: </h5>

        <table>
            <tr>
                <th>Name</th>
                <th>Tel. Number</th>
            </tr>
            <tr>
                <th scope="row">{{ $client_profile_info->contact_person1_name }}</th>
                <td>{{ $client_profile_info->contact_person1_contact_number }}</td>
            </tr>
            <tr>
                <th scope="row">{{ $client_profile_info->contact_person2_name }}</th>
                <td>{{ $client_profile_info->contact_person2_contact_number }}</td>
            </tr>
        </table>
    </div>
    <h5>BACKGROUND INFO (KALAGAYAN NG PASYENTE, PAMILYA, FINANSYAL EMOSYONAL, PHYSICAL): ISULAT
    </h5>
    <textarea name="message" rows="10" cols="30">{{ $client_profile_info->background_info }}</textarea>

    <h5>ACTION TAKEN/ SERVICES RENDERED: ISULAT
    </h5>
    <textarea name="message" rows="10" cols="30">{{ $client_profile_info->action_taken }}</textarea>
    <table style="margin-top: 2rem">
        <tr>
            <th>ELDERS' RECOMMENDATION: ISULAT</th>
            <th>DISTRICT SERVANT'S REMARKS</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Assigned Locale Servant: </td>
            <td>Assisgned District Servant: </td>
        </tr>
    </table>
    <table style="margin-top: 2rem">
        <tr>
            <th>SOCIAL WORKER'S RECOMMENDATION: ISULAT</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
    <p>Prepared by:</p>
    <p>Noted by:</p>
    <p>Signature over Printed Name</p>
    <p>Social Worker /Social work Assistant in Charge</p>
    <p>Signature over Printed Name</p>
    <p>KNP</p>
    <p>Signature over Printed Name</p>
</body>

</html>
