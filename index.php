<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="room/images/pcn.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <center>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="panel-title text-center">Login</div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" class="col-lg-offset-1 col-lg-10" action="" method="post" role="form" style="display: block;">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" required placeholder=" ">
                                            <label class="form-control-placeholder" for="username">Username</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" required placeholder=" ">
                                            <label class="form-control-placeholder" for="password">Password</label>
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="LOGIN"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>