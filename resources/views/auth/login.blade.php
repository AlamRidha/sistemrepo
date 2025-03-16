<x-guest-layout>
    @section('title')
        {{ 'Log in' }}
    @endsection
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="gap-3 row w-100 justify-content-center align-items-center">
            <!-- Login Box -->
            <div class="col-lg-5 col-md-6 col-12 d-flex align-items-center">
                <div class="login-box custom-login-box w-100">
                    <div class="card card-outline card-warning">
                        <div class="text-center bg-white card-header border-bottom">
                            <p class="h1 font-weight-bold text-dark">
                                Sistem Informasi <br> <span class="text-primary">E-Skripsi ITBM</span>
                            </p>
                        </div>
                        <div class="card-body">
                            <h5 class="mb-3 text-center font-weight-bold text-dark">Selamat Datang</h5>
                            <p class="mb-4 text-center text-muted">Silakan login untuk mengakses sistem</p>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3 input-group">
                                    <input id="email" class="form-control form-control-lg" type="email"
                                        name="email" :value="old('email')" required autofocus autocomplete="username"
                                        placeholder="johndoe@mail.com">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 input-group">
                                    <input id="password" class="form-control form-control-lg" type="password"
                                        name="password" required autocomplete="current-password" placeholder="********">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lottie Animation -->
            <div class="col-lg-5 col-md-6 col-12 d-flex justify-content-center align-items-center">
                <div id="lottie-container" style="max-width: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>

    <script>
        var animation = lottie.loadAnimation({
            container: document.getElementById('lottie-container'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            // path: 'animation/animationopen1.json'
            path: '{{ asset('animation/animationopen1.json') }}'
        });
    </script>
</x-guest-layout>
