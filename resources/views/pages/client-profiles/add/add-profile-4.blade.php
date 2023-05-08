@extends('layout.master')

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Add Client Profile
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div
            class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">
            <div class="intr o-x lg:text-center flex items-center lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_privacy', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"><i
                            data-lucide="shield"></i></button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Privacy Notice
                    </div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_1', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">1</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Personal
                        Information</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_2', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">2</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Family
                        Composition</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a href="{{ route('add_client_profile_3', $user_info->id) }}">
                    <button
                        class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">3</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Medical
                        Conditon</div>
                </a>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary">4</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Setup Contact Persons</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>5</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Setup Background
                    Information</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400"
                    disabled>6</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Review</div>
            </div>
        </div>
        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-medium text-base">Contact Persons</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('status'))
                <div class="alert alert-success text-center text-white">
                    <p>{{ Session::get('status') }}</p>
                </div>
            @endif
            <form method="POST" action="{{ route('add_client_profile_4_next') }}">
                @csrf
                @php
                    use App\Models\TempClientProfile;

                    $tempCP = TempClientProfile::all();
                    $old_input = $tempCP->where('user_encoder_id', $user_info->id)->last();
                @endphp
                <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                <table class="table table-bordered" id="dynamicAddRemoveOperation">
                    <tr>
                        <th>Full Name</th>
                        <th>Contact Number</th>
                    </tr>
                    <tr>
                        <td>
                            <input id="contact-person1" name="contactPerson1" type="text" class="form-control" placeholder="Name"
                                value="{{ old('contactPerson1', $old_input->contact_person1_name ?? null) }}">
                        </td>
                        <td>
                            <input id="contact-person1-number" name="contactPerson1Number" type="text" class="form-control" placeholder="09123456789"
                                value="{{ old('contactPerson2', $old_input->contact_person2_contact_number ?? null) }}">
                        </div>
                    </tr>
                    <tr>
                        <td>
                            <input id="contact-person2" name="contactPerson2" type="text" class="form-control" placeholder="Name"
                                value="{{ old('contactPerson2', $old_input->contact_person2_name ?? null) }}">
                        </td>
                        <td>
                            <input id="contact-person2-number" name="contactPerson2Number" type="text" class="form-control" placeholder="09223456789"
                                value="{{ old('contactPerson2', $old_input->contact_person2_contact_number ?? null) }}">
                        </div>
                    </tr>
                </table>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <a href="{{ route('add_client_profile_3', $user_info->id) }}" class="btn btn-secondary w-24 ml-2">Previous</a>
                    <button class="btn btn-primary w-24 ml-2">Next</button>
                </div>
            </form>
        </div>
        <!-- END: Wizard Layout -->
    </div>
    <!-- END: Content -->
@endsection
