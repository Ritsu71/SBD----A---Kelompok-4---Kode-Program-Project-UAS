<?php
session_start();

$koneksi = new mysqli("localhost", "root", "", "boutique2");

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$message = ""; 

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $query = "SELECT * FROM pegawai WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['pegawai'] = $result->fetch_assoc();
        $message = "<div class='alert alert-info'>Login successful</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    } else {
        $message = "<div class='alert alert-danger rounded'>$message Login failed</div>";
        echo "<script>
            setTimeout(function(){
                document.querySelector('.alert-danger').style.display = 'none';
            }, 3000);
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v1/images/icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/hambu/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/pilih2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
    <style>
        .login100-form-btn {
            background-color: MediumPurple;
        }

        .login100-form-btn:hover {
            background-color: Indigo;
        }
    </style>
    <meta name="robots" content="noindex, follow">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt="">
                    <img src="./assets/img/find_user.jpg" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="POST" action="login.php">
                    <span class="login100-form-title">
                        Login Pegawai
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="user" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login">Login</button>
                    </div>
                    <?php echo $message; ?> 
                    <div class="text-center p-t-12">
                        <span class="txt1">Forgot</span>
                        <a class="txt2" href="">Username / Password?</a>
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="registeration.html">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </div>

                    <script src="./assets/vendor/jquery-3.2.1.min.js"></script>
                    <script src="./assets/vendor/bootstrap.min.js"></script>
                    <script src="./assets/vendor/select2.min.js"></script>
                    <script src="./assets/vendor/tilt.jquery.min.js"></script>
                    <script>
                    $('.js-tilt').tilt({
                        scale: 1.1
                    })
                    </script>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
