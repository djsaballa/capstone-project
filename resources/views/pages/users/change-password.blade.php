@extends('layout.master')

@section('content')
<!-- END: Profile Menu -->
<div class="col-span-12 lg:col-span-8 2xl:col-span-9">
    <!-- BEGIN: Change Password -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Change Password
            </h2>
        </div>
        <div class="p-5">
            <div class="mt-3">
                <label for="change-password-form-2" class="form-label">New Password</label>

                <!-- One Line lang Sana yung input at generate password button -->

                <div>
                    <input id="new-password" type="text" class="form-control" disabled>
                    <button class="btn btn-dark mt-4" onclick="generatePassword()">Generate New Password</button>
                </div>
            </div>
            <button type="button" class="btn btn-primary mt-4" data-tw-toggle="modal"
                    data-tw-target="#password-confirmation-modal" >Change Password</button>
        </div>
    </div>

    <div id="password-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="check-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="modal-body">
                            Are you sure you want to change the password? If yes, please keep a record of the new password for the respective user.                       </div>
                        </div>
                        <input type="hidden" id="user-id" value="{{ $user_info->id }}">
                        <input type="hidden" id="employee-id" value="{{ $employee_info->id }}">
                        <div class="px-5 pb-8 text-center">
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1"
                                data-tw-dismiss="modal">Cancel</button>
                            <button type="button" data-tw-toggle="modal"
                                onclick="changePassword()" class="btn btn-primary mt-4">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function generatePassword() {
            const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let newPassword = document.getElementById('new-password');
            let result = '';
            const charactersLength = characters.length;

            for ( let i = 0; i < 10; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            newPassword.value = result;
        }

        function changePassword() {
            let newPassword = $("#new-password").val();
            let userId = $("#user-id").val();
            let employeeId = $("#employee-id").val();

            window.location.href = "/save-password/" + userId + "/" + employeeId + "/" + newPassword;
    }
            
            
    </script>
    <!-- END: Change Password -->
@endsection
