<?php
include 'room/connect.php';
session_start();

if (isset($_POST['login-submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $connect->query($query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['password'];
        $_SESSION["firstname"] = $row['firstname'];
        $_SESSION["lastname"] = $row['lastname'];
        $_SESSION["category"] = $row['category'];

        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {

            header("Location: room/index.php");
        } else {
            echo "Wrong Credentials";
        }
    } else {
        echo "Wrong Credentials";
        echo "<script>$('#myModalroom').modal('show');</script>";
    }
}

?>
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
    <script src="room/strap/jquery.min.js"></script>
    <script src="room/strap/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <img src="room/images/pcn.png" alt="PCN LOGO" class="img-responsive" width="15%">
                            <div class="panel-title text-center">Login</div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" class="col-lg-offset-1 col-lg-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" role="form" style="display: block;">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" required>
                                            <label class="form-control-placeholder" for="username">Username</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" required>
                                            <label class="form-control-placeholder" for="password">Password</label>
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="LOGIN"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                        <div class="col-md-6 pt-3">
                                            <a href="register.php" style="color: #BABABA; ">Register Account here</a>
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

    <!-- Modal -->
    <!-- Modal -->
    

</body>

</html>