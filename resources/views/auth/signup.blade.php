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
    <title>Signup</title>
</head>
<body>
    <div class="m-auto d-flex flex-column align-content-center">
        <div class="container-fluid  px-5">
            <div class="main">
                <h2>Signup</h2>
                <div class="col-md-6 col-sm-12">
                    @if(session()->has('failed'))
                        <div class="alert alert-danger"
                            role="alert">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="login-form">
                        <form action="/signup" method="post">
                            @csrf
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Re-Type Password</label>
                                <input type="password" name="cpassword" class="form-control" placeholder="CPassword">
                            </div>
                            <button type="submit" class="btn btn-secondary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>