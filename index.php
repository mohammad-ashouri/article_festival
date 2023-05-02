<?php
session_start();
if (isset($_SESSION['username'])){
    include_once 'config/connection.php';
    header("location: panel.php");
}
session_abort();
?>

    <!DOCTYPE html>
    <html lang="fa">
    <head>
        <title>ورود به سامانه جشنواره مقالات علمی حوزه</title>
        <link rel="icon" type="image/x-icon" href="/dist/img/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="login/css/util.css">
        <link rel="stylesheet" type="text/css" href="login/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form  action="chk.php" class="login100-form validate-form" method="post">
                    <!--					<span class="login100-form-title p-b-26">-->
                    <center>
                        <p style=" font-family: 'B Titr'; font-size: 20px; color: black">
                            صفحه ورود به سامانه جشنواره مقالات علمی حوزه
                        </p>
                    </center>
                    <br/>

                    <div class="wrap-input100 validate-input" data-validate="نام کاربری را وارد کنید">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="نام کاربری"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="رمز عبور را وارد کنید">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="رمز عبور"></span>
                    </div>
                    <p align="center" style="font-weight: bold; font-size: 13px">
                        <?php
                        if (isset($_GET['timeout'])){
                            echo "زمان انتظار شما در پنل کاربری منقضی شده است. لطفا دوباره وارد شوید";
                        }
                        ?>
                    </p>
                    <p align="center" style="font-weight: bold; font-size: 13px">
                        <?php
                        if (isset($_GET['errorlog'])){
                            echo "لطفا نام کاربری و رمز عبور خود را وارد کنید";
                        }
                        ?>
                    </p>
                    <p align="center" style="font-weight: bold; font-size: 13px">
                        <?php
                        if (isset($_GET['invalidcaptcha'])){
                            echo "کد امنیتی صحیح نیست";
                        }
                        ?>
                    </p>
                    <p align="center" style="font-weight: bold; font-size: 13px">
                        <?php
                        if (isset($_GET['notfound'])){
                            echo "نام کاربری یا رمز عبور اشتباه است";
                        }
                        ?>
                    </p>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                ورود
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="login/vendor/jquery/jquery-3.6.0.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/bootstrap/js/popper.js"></script>
    <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/daterangepicker/moment.min.js"></script>
    <script src="login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="login/js/main.js"></script>

    </body>
    </html>
<?php
if (isset($_GET['error'])):
    ?>
    <script>
        alert("مشکلی در ورود شما به سیستم وجود دارد. لطفا با کارشناس سامانه جشنواره تماس حاصل فرمایید.");

    </script>
<?php endif; ?>