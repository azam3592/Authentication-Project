<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Login</title>
</head>
<body>
    <div class="m-auto d-flex flex-column align-content-center">
        <div class="container-fluid  px-5">
            <div class="main">
                <h2>Login</h2>
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">
                        @if(session()->has('failed'))
                            <div class="alert alert-danger"
                                role="alert">
                                {{ session('failed') }}
                            </div>
                        @endif
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="RememberMe" value="RememberMe">
                                <label>Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-black">Login</button>
                            <a href="/auth/signup">Don't have any account?Registered in.</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>