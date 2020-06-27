<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register - CarryIt</title>
    <style>
        .login-content .login-box {
            min-height: 640px !important;
        }

        .login-content .logo {
            margin: 0;
        }
    </style>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>CarryIt</h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>REGISTER</h3>
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" autofocus>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" autofocus>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Mobile Number</label>
                    <input class="form-control @error('mobile_number') is-invalid @enderror" type="text" name="mobile_number" placeholder="01...">
                    @error('mobile_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">NID</label>
                    <input class="form-control @error('nid') is-invalid @enderror" type="file" name="nid">
                    @error('nid')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Password Confirmation</label>
                    <input class="form-control" name="password_confirmation" type="password" placeholder="Password">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Register</button>
                </div>
                <div class="form-group">
                    <div class="utility">
                        <p class="semibold-text mb-2">Alreadyt Have Account? <a href="{{route('login')}}">LOGIN</a></p>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="/admin/js/jquery-3.3.1.min.js"></script>
    <script src="/admin/js/popper.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/admin/js/plugins/pace.min.js"></script>
</body>

</html>