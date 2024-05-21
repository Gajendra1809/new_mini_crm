<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniCRM</title>
    <link rel="icon" href="{{asset('logos/crmlogo.png')}}" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <!-- This is Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <h2><a class="navbar-brand p-2 " href="#">MiniCRM</a></h2>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route("landing") }}">Home </a>
                </li>

            </ul>

        </div>
    </nav><br><br><br><br>

    <h1 class="text-success text-center">
        Admin Login
    </h1>
    <h5 class="text-center">Please login with your Admin credentials</h5>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-body">
                        <div>
                            @if(session()->has('success'))
                                <div class="alert alert-success msgpopup">
                                    <strong>Success!</strong> {{ session('success') }}👍
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger msgpopup">
                                    <strong>Something went wrong!</strong> {{ session('error') }}
                                </div>
                            @endif
                        </div>

                        <!-- login form -->
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">
                                    Email*
                                </label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                    required value="{{ old('email') }}" />
                                    <span id="emailError" class="text-danger"></span>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div><br>
                            <div class="form-group">
                                <label for="password">
                                    Password* <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                                </label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required value="{{ old('password') }}" />
                                    <span id="passwordError" class="text-danger"></span>
                                @if($errors->has('password'))
                                    <span
                                        class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                @if(session()->has('passError'))
                                    <span
                                        class="text-danger">{{ session('passError') }}</span>
                                @endif
                            </div><br>
                            <button id="loginBtn" class="btn btn-danger" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>

    <!-- This is footer -->
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
    </footer>

    <script src="{{asset('js/login.js')}}"> </script>
</body>

</html>
