<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login || Messenger.com</title>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <section class="full-wrapper">
            <div class="wrapper">
                <!-- alert message -->
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <!-- End: alert message -->

                <!-- Title -->
                <h2 class="mt-5">Login</h2>
                <!-- End: title -->

                <!-- Sign in form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="admin@messenger.com" placeholder="Email" required>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="12345678" required>
                        <a href="#" class="pass-eye" onclick="show()"><i class="fa fa-eye"></i></a>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">Remember Me</label>
                    </div>

                    <div class="form-group d-block">
                        <button type="submit" class="btn mt-3 signin-btn">Login</button>
                    </div>
                </form>
                <!-- End: Sign in form -->

                <!-- sign in text -->
                <a href="">Forgot password</a>
                <!-- End: sign In text -->

                <!-- sign in footer -->
                <div class="footer">
                    <p>&copy; {{ date('Y') }} <a href="#">Zaman</a>. All rights reserved.</p>
                    <p>Develop by <a href="http://Zaman.com/" target="_blank">Zaman</a></p>
                </div>
                <!-- End: sign in footer -->
            </div>
        </section>

        <!-- javascript -->
        <script>
            function show() {
                let input = document.getElementsByName("password")[0],
                    type = input.getAttribute("type");

                if(type === "password") {
                    input.type = "text";
                    document.querySelector('.fa-eye').classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    document.querySelector('.fa-eye').classList.remove("fa-eye-slash");
                }
            }
        </script>
    </body>
</html>
