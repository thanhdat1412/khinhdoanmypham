
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TRÍ TÍNH STORE &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
        <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
        <meta name="author" content="gettemplates.co" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">

        <!-- Theme style  -->
        <link rel="stylesheet" href="css/login.css">



    </head>
</head>
<body>

    <div class="login-form w3_form">
        <!--  Title-->
        <div class="login-title w3_title">
        </div>
        <div class="login w3_login">
            <h2 class="login-header w3_header">Sign up</h2>
            <div class="w3l_grid">
               	<form class="login-container" action="" method="post"> 
                    <input type="text" placeholder="Số điện thoại" Name="txtuser" required >
                    <input type="password" placeholder="Mật khẩu" Name="txtpass" required>
					<input type="password" placeholder="Nhập lại mật khẩu	" Name="txtrepass" required>
                    <input type="submit" name="dangky"  value="Đăng ký">

				<?php require 'Class/ClsSignup.php';?>
			
                <div class="second-section w3_section">
                    <div class="bottom-header w3_bottom">
                        <h3>OR</h3>
                    </div>
                    <div class="social-links w3_social">
                        <ul>
                            <!-- facebook -->
                            <li> <a class="facebook" href="#" target="blank"><i class="icon-facebook"></i></a></li>

                            <!-- twitter -->
                            <li> <a class="twitter" href="#" target="blank"><i class="icon-twitter"></i></a></li>

                            <!-- google plus -->
                            <li> <a class="googleplus" href="#" target="blank"><i class="icon-google"></i></a></li>
                        </ul>
                    </div>
                </div>
	
                <div class="bottom-text w3_bottom_text">
                    <p>No account yet?<a href="#">Signup</a></p>
                    <h4> <a href="#">Forgot your password?</a></h4>
                </div>

            </div>
        </div>

    </div>
</form>
</body>
</html>