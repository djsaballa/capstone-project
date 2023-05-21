<div class="intro-y box p-5 mt-6">
  <form method="POST" action="{{ route('assign_doc_add_med_category') }}">
    @csrf
    <input type="hidden" name="userId" value="{{ $user_info->id }}">
    <input type="hidden" name="clientProfileId" value="{{ $client_profile_info->id }}">
    <label for="update-profile-form-3-tomselected" class="form-label font-medium mt-3" id="update-profile-form-3-ts-label">
      Assigned Doctor:
    </label>
    @if ($user_info->role_id == 8 || $user_info->role_id == 11)
      <select class="form-select" name="assignDoctor" aria-label="Default select example">
        @if ($client_profile_info->assigned_doctor_id == null)
          <option selected disabled>Assign a Doctor</option>
        @else
          <option value="{{ $client_profile_info->assigned_doctor_id }}" selected>{{ $user_info->getFullName($client_profile_info->assigned_doctor_id) }}</option>
        @endif
        @foreach ($doctors as $doctor)
          <option value="{{ $doctor->id }}">{{ $doctor->getFullName($doctor->id) }}</option>
        @endforeach
      </select>
    @else
      <select class="form-select" aria-label="Default select example" disabled>
        @if ($client_profile_info->assigned_doctor_id == null)
          <option selected disabled>None</option>
        @else
          <option value="{{ $client_profile_info->assigned_doctor_id }}">{{ $user_info->getFullName($client_profile_info->assigned_doctor_id) }}</option>
        @endif
      </select>
    @endif

      <label for="update-profile-form-3-tomselected" class="form-label font-medium mt-5" id="update-profile-form-3-ts-label">
        Medical Category:
      </label>
      @if ($user_info->role_id == 8 || $user_info->role_id == 11)
        <select class="form-select" name="medicalCategory" aria-label="Default select example">
          @if ($client_profile_info->medical_category_id == null)
            <option selected disabled>Assign a Doctor</option>
          @else
            <option value="{{ $client_profile_info->medical_category_id }}" selected>{{ $client_profile_info->getMedicalCategoryName($client_profile_info->medical_category_id) }}</option>
          @endif
          @foreach ($medical_categories as $medical_category)
            <option value="{{ $medical_category->id }}">{{ $medical_category->medical_category }}</option>
          @endforeach
        </select>
      @else
        <select class="form-select" aria-label="Default select example" disabled>
          @if ($client_profile_info->medical_category_id == null)
            <option selected disabled>None</option>
          @else
            <option value="{{ $client_profile_info->medical_category_id }}">{{ $client_profile_info->getMedicalCategoryName($client_profile_info->medical_category_id) }}</option>
          @endif
        </select>
      @endif
      @if ($user_info->role_id == 8 || $user_info->role_id == 11)
        <button class="btn btn-primary w-24 mt-5">Save</button>
      @endif
  </form>
</div>

