<?
session_start();
$message = "";
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    session_unset();
    session_destroy();
    session_start();
    $message = "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Welcome to SOS Children</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mainIndexCss.css">




    <script>
    function login()
    {
        var user = document.forms["loginform"]["username"].value;
        var pass = document.forms["loginform"]["password"].value;

        if (user == null || user == "")
        {
            alert('Username cannot blank');
            return false;
        }
        else if (pass == null || pass == "")
        {
            alert('Password cannot blank');
            return false;
        }
    }
    </script>


</head>
<body>

    <div class="row mainPadding">
        <div class="span1">
            <!-- empty span row -->
        </div>

        <div class="span6 mainBox" >
            <div class="mainLogo">
            </div>

            <div class="login">
                <p class="login">Log in</p>
                <br>
            </div> <!-- divlogin -->

            <form class="formPadding" action="UserCtrl.php" id="loginform" method="POST" onsubmit="return login();"> 
                <input type="hidden" name="action" value="login"/>
                <input type="text" class="input-medium" name="username" id="username" placeholder="username">
                <input type="password" name="password" class="input-medium" id="password" placeholder="password">
                <input type="image" name="submit" id="submit" src="../img/WelcomePage/Go-button.png" value="submit">
                <br/>
                <?php
                if ($message == "Login Failed") {
                    ?>
                    <script type='text/javascript'>
                    alert('<?php echo $message; ?>')
                    </script>
                    <?php } ?>
                    <br/>


                    <br>

                </form>

                <form class="formPadding" action="UserSignUp.php?p_id=1" method="post">
                    <input class="signUp" type="submit" name="Sign Up" id="signUp"  value=""/>
                </form>
                <form class="formPadding" action="#">
                    <input class="forgetPass" type="submit" name="forgetPass" id="forgetPass" value=""/>
                </form>

            </div> <!-- span6 mainBox -->

              <div class="span5 offset1">
                <iframe width="560" height="315" src="http://www.youtube.com/embed/S0-fXw2rXZ4" frameborder="2" allowfullscreen></iframe>
            </div>
        </div> <!-- div row -->

    </body>
    </html>









