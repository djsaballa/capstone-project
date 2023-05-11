<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td.personal {
            border: none;
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

        .container {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .column {
            width: 33%;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <h2>CLIENT'S PROFILE</h2>

    <table>
        <tr>
            <td class="personal">
                <p>LOCALE:</p>
                <p>NAME:</p>
                <p>ADDRESS:</p>
                <p>AGE:</p>
                <p>GENDER:</p>
                <p>BIRTHDATE:</p>
                <p>OCCUPATION:</p>
                <p>HEIGHT:</p>
                <p>WEIGHT:</p>
                <p>BAPTISM DATE:</p>
            </td>
            <td class="personal">
                <p>{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}</p>
                <p>{{ $client_profile_info->getFullName($client_profile_info->id) }}</p>
                <p>{{ $client_profile_info->address }}</p>
                <p>{{ $client_profile_info->age }}</p>
                <p>{{ $client_profile_info->gender }}</p>
                <p>{{ $client_profile_info->dateFormatMdY($client_profile_info->birth_date) }}</p>
                <p>{{ $client_profile_info->occupation }}</p>
                <p>{{ $client_profile_info->weight }}</p>
                <p>{{ $client_profile_info->height }}</p>
                <p>{{ $client_profile_info->dateFormatMdY($client_profile_info->baptism_date) }}</p>
            </td>
            <td class="personal">
            </td>
        </tr>
    </table>



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
                    <td>None</td>
                    <td>None</td>
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
                    <td></td>

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
    <h5>BACKGROUND INFO (KALAGAYAN NG PASYENTE, PAMILYA, FINANSYAL EMOSYONAL, PHYSICAL):
    </h5>
    <textarea name="message" >{{ $client_profile_info->background_info }}</textarea>

    <h5>ACTION TAKEN/ SERVICES RENDERED:
    </h5>
    <textarea name="message" >{{ $client_profile_info->action_taken }}</textarea>
    <table style="margin-top: 2rem">
        <tr>
            <th>LOCALE SERVANT'S REMARKS</th>

        </tr>
        <tr>
            <td>{{ $client_profile_info->locale_servant_remark }}</td>

        </tr>

    </table>
    <table style="margin-top: 2rem">
        <tr>

            <th>DISTRICT SERVANT'S REMARKS</th>

        </tr>
        <tr>
            <td>{{ $client_profile_info->district_servant_remark }}</td>
        </tr>
    </table>
    <table style="margin-top: 2rem">
        <tr>
            <th>DIVISION SERVANT'S REMARKS</th>

        </tr>
        <tr>
            <td>{{ $client_profile_info->division_servant_remark }}</td>

        </tr>
    </table>
    <table style="margin-top: 2rem">
        <tr>

            <th>SOCIAL WORKER'S RECOMMENDATION</th>
        </tr>
        <tr>
            <td>{{ $client_profile_info->social_worker_recommendation }}</td>
        </tr>
    </table>
</body>

</html>
