<!DOCTYPE html>
<html>

<head>
    <title>ADDFI SSIS</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10;
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

        #image {
            width: 200px;
            height: 200px;
            padding-left: 15%;
            object-fit: cover;
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
                <p>SEX:</p>
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
                <img src="{{ $image }}" id="image" alt="Client Image">
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
        @if ($family_compositions->first())
            @foreach ($family_compositions as $family_composition)
                <tr>
                    <td scope="row">{{ $family_composition->name }}
                    </td>
                    <td>{{ $family_composition->relationship }}</td>
                    <td>{{ $family_composition->educational_attainment }}</td>
                    <td>{{ $family_composition->occupation }}</td>
                    <td>{{ $family_composition->contact_number }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <th>None</th>
                <th>None</th>
                <th>None</th>
                <th>None</th>
                <th>None</th>
            </tr>
        @endif
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
        @if($medical_conditions->first())
            @foreach ($medical_conditions as $medical_condition)
                <tr>
                    <th scope="row">
                        {{ $medical_condition->disease->getName($medical_condition->disease_id) }}</th>
                    <th scope="row">
                        {{ $medical_condition->dateFormatMdY($medical_condition->since_when) }}</th>
                    <td>{{ $medical_condition->medicine_supplements }}</td>
                    <td>{{ $medical_condition->dosage }}</td>
                    <td>{{ $medical_condition->frequency }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <th>None</th>
                <th>None</th>
                <th>None</th>
                <th>None</th>
                <th>None</th>
            </tr>
        @endif
    </table>

    <h5>ALLERGIES-(SA PAGKAIN,GAMOT,BAGAY,ETC.)</h5>
    <table>
        <tr>
            <th>MGA NAGING OPERASYON</th>
            <th>PETSA</th>
        </tr>
        @if ($medical_operations->first())
            @foreach ($medical_operations as $medical_operation)
                <tr>
                    <td>{{ $medical_operation->operation }}</td>
                    <td>{{ $medical_operation->dateFormatMdY($medical_operation->date) }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <th>None</th>
                <th>None</th>
            </tr>
        @endif
    </table>

    <table style="margin-top: 2rem ">
        <thead>
            <tr>
                <th>DOCTOR </th>
                <th>HOSPITAL</th>
            </tr>
        </thead>
        <tbody>
            @if ($medical_conditions->first())
                @foreach ($medical_conditions as $medical_condition)
                    <tr>
                        <td>{{ $medical_condition->hospital }}</td>
                        <td>{{ $medical_condition->doctor }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th>None</th>
                    <th>None</th>
                </tr>
            @endif
        </tbody>
    </table>
    <div style="margin-top: 1rem ">
        <label>Philhealth Member:</label>
        <span>{{ $client_profile_info->philhealth_member }}</span>
    </div>
    <div>
        <label>Other Health Cards:</label>
        <span>{{ $client_profile_info->health_card }}</span>
    </div>
    <div class="contact" style="margin-top: 1rem ">
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
    <textarea name="message">{{ $client_profile_info->background_info }}</textarea>

    <h5>ACTION TAKEN/ SERVICES RENDERED:
    </h5>
    <textarea name="message">{{ $client_profile_info->action_taken }}</textarea>
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
            <td>{{ $client_profile_info->zone_servant_remark }}</td>
        </tr>
    </table>
    <table style="margin-top: 2rem">
        <tr>
            <th>DIVISION SERVANT'S REMARKS</th>

        </tr>
        <tr>
            <td>{{ $client_profile_info->district_servant_remark }}</td>

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

    <div style="margin-top: 2rem">
        <div>Generated Report By: ADDFI SSIS</div>
        <div>Generated By: <span>{{ $user_info->getFullName($user_info->id) }}</span></div>
        <div>Date Generated: <span>{{ $date }}</span></div>
    </div>
</body>

</html>
