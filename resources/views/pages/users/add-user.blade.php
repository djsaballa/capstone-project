@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Add User
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Create User Profile
            </h2>
        </div>
        <div class="intro-y">
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        </div>
        <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
                <div class="flex-1 mt-6 xl:mt-0">
                    <form method="POST" action="{{ route('add_user_save') }}" enctype="multipart/form-data">
                        @csrf
                        <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-6 2xl:col-span-3">
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">First Name</label>
                                    <input id="first-name" name="firstName" type="text" class="form-control"
                                        placeholder="First Name" value="{{ old('firstName') }}">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">Middle Name</label>
                                    <input id="middle-name" name="middleName" type="text" class="form-control"
                                        placeholder="Middle Name" value="{{ old('middleName') }}">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">Last Name</label>
                                    <input id="last-name" name="lastName" type="text" class="form-control"
                                        placeholder="Last Name" value="{{ old('lastName') }}">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">Role</label>
                                    <select id="role" name="role" data-search="true" class="tom-select w-full tomselected"
                                        tabindex="-1">
                                        @if ( old('role') )
                                            @php
                                                $old_role = $roles->find( old('role') );
                                            @endphp
                                            <option value="{{ $old_role->id }}" selected="true"> {{ $old_role->role }} </option>
                                        @else
                                            <option value="Select Role" selected="true" disabled> Select Role</option>
                                        @endif
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @php
                                    use App\Models\District;
                                    use App\Models\Locale;
                                    
                                    $districts = District::all();
                                    $districts_json = $districts->toJson();
                                    
                                    $locales = Locale::all();
                                    $locales_json = $locales->toJson();
                                @endphp
                            <div class="col-span-6 2xl:col-span-3">
                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">Division</label>
                                    <select id="division-filter"  name="division" data-search="true" class="w-full form-control"
                                        tabindex="-1" onchange="loadDistricts( {{ $districts_json }} )">
                                        @if ( old('division') )
                                            @php
                                                $old_division = $divisions->find( old('division') );
                                            @endphp
                                            <option value="{{ $old_division->id }}" selected="true"> {{ $old_division->division }} </option>
                                        @else
                                            <option value="0" selected disabled hidden>Select Division</option>
                                        @endif
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">District</label>
                                    <select id="district-filter"  name="district" data-search="true" class="w-full form-control"
                                        tabindex="-1" onchange="loadLocales( {{ $locales_json }} )" disabled="true">
                                        @if ( old('district') )
                                            @php
                                                $old_district = $districts->find( old('district') );
                                            @endphp
                                            <option value="{{ $old_district->id }}" selected="true"> {{ $old_district->district }} </option>
                                        @else
                                            <option value="0" selected disabled hidden> Select District</option>
                                        @endif
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" >{{ $district->district }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="update-profile-form-3-tomselected" class="form-label"
                                        id="update-profile-form-3-ts-label">Locale</label>
                                    <select id="locale-filter"  name="locale" data-search="true" class="w-full form-control"
                                        tabindex="-1" disabled="true">
                                        @if ( old('locale') )
                                            @php
                                                $old_locale = $locales->find( old('locale') );
                                            @endphp
                                            <option value="{{ $old_locale->id }}" selected="true"> {{ $old_locale->locale }} </option>
                                        @else
                                            <option value="0" selected disabled hidden> Select Locale</option>
                                        @endif
                                        @foreach ($locales as $locale)
                                            <option value="{{ $locale->id }}">
                                                {{ $locale->locale }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                    <input id="contact-number"  name="contactNumber" type="text" class="form-control"
                                        placeholder="09123456789" value="{{ old('contactNumber') }}">
                                </div>
                            </div>
                            <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                <div
                                    class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img id="placeholder" class="rounded-md" alt="Midone - HTML Admin Template"
                                            src="{{ asset('dist/images/profile-6.jpg') }}" style="display:block;">
                                        <img id="preview" src="#" alt="Preview image" class="rounded-md" style="display:none;">
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                        <input type="file" name="picture" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <a href="{{ route('list_of_users', $user_info->id ) }}" class="btn btn-secondary w-24 ml-2">Cancel</a>
                            <button class="btn btn-primary w-24 ml-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END: Wizard Layout -->
        </div>
        <script>
            function previewImage(event) {
                var input = event.target;
                var placeholder = document.getElementById('preview');
                var preview = document.getElementById('preview');
                var reader = new FileReader();

                reader.onload = function() {
                    preview.src = reader.result;
                    placeholder.style.display = 'none';
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        </script>
    @endsection
