@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                    <span class="text-white text-lg ml-3">
                        ADDFII
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="dist/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br> sign
                        in to your account.</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left mb-5">
                        Log In
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your
                        account. Manage all your accounts in one place</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login_auth') }}">
                        @csrf
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block"
                                placeholder="Username" name="username">
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                placeholder="Password" name="password">
                        </div>
                        <div class="intro-x flex justify-end text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center">
                                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 align-top"
                                type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection
