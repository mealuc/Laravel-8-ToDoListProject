<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('assets')}}/login/bootstrap.min.css">
    <link href="{{asset('assets')}}/login/style.css")}} rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/login/libs/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/login/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <div class="card ">
        <div class="card-body">
            <form action="{{route('userLoginCheck')}}" method="post">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-lg" name="email" id="email" type="text" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Create An Account</a></div>
            <div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Forgot Password</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="{{asset('assets')}}/login/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('assets')}}/login/js/bootstrap.bundle.js"></script>
</body>

</html>
