{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pemasukan</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{url('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" crossorigin="anonymous" />
        <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js')}}" crossorigin="anonymous"></script>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <section class="vh-100" style="background-color: #343A40;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <h3 class="mb-3">Sign in</h3>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="typeEmailX-2">Email</label>
                            <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="typePasswordX-2">Password</label>
                            <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                        </div>
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                    </form>

                    <hr class="my-4">
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <script src="{{url('https://code.jquery.com/jquery-3.5.1.slim.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}""></script>
        <script src="{{url('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{url('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset("assets/demo/datatables-demo.js")}}""></script>
