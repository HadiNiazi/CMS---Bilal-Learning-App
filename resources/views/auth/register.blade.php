<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    @include('admin.includes.css')

</head>
<body class="bg-light-gray" id="body">

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5 col-md-10 ">
            <div class="card card-default mb-0">
                <div class="card-header pb-0">
                <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                    <a class="w-auto pl-0" href="/index.html">
                    <img src="{{ asset('assets/admin/images/logo.png') }}" alt="Mono">
                    <span class="brand-name text-dark">MONO</span>
                    </a>
                </div>
                </div>
                <div class="card-body px-5 pb-5 pt-0">
                <h4 class="text-dark text-center mb-5">Sign Up</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('register') }}">
                @csrf
                    <div class="row">
                    <div class="form-group col-md-12 mb-4">
                        <input type="text" name="name" class="form-control input-lg" placeholder="Name">
                    </div>
                    <div class="form-group col-md-12 mb-4">
                        <input type="email" name="email" class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group col-md-12 ">
                        <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-12 ">
                        <input type="password" name="password_confirmation" class="form-control input-lg" id="cpassword" placeholder="Confirm Password">
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between mb-3">

                        </div>

                        <button type="submit" class="btn btn-primary btn-pill mb-4">Sign Up</button>

                        <p>Already have an account?
                        <a class="text-blue" href="{{ route('login') }}">Sign in</a>
                        </p>
                    </div>
                    </div>
                </form>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>


</body>
</html>




