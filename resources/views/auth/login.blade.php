<x-guest-layout>
    @section('title')
        {{ 'Log in' }}
    @endsection
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="text-center card-header">
                <a href="/" class="h1"><b>Sistem Informasi Repository</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Selamat Datang</p>
                <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 input-group">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" placeholder="johndoe@mail.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-3 input-group">
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" placeholder="********">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-0 text-center">
                    <a href="{{ route('register') }}" class="text-center">Register a new Account</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</x-guest-layout>
