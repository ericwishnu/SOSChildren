<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<?
session_start();
$message="";
if(isset($_SESSION['message']))
{
    $message=$_SESSION['message'];
    unset($_SESSION['message']);
}
else
{
    session_unset();                        
    session_destroy();                     
    session_start();  
    $message="Login";      
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
            function login()
            {
                var user = document.forms["loginform"]["username"].value;
                var pass = document.forms["loginform"]["password"].value;
                
                if(user==null || user=="")
                {   
                    alert('Username cannot blank');
                    return false;
                }
                else if(pass==null || pass=="")
                {
                    alert('Password cannot blank');
                    return false;
                }                   
            }
        </script>
    </head>
    <body>
        <?
        echo $message;
        ?>
        <form action="FoundationCtrl.php" id="loginform" method="POST" onsubmit="return login();">
           <input type="hidden" name="action" value="login">
           Username : <input id="username" type="text" name="username" value="CO23"><br>
           Password : <input id="password" type="password" name="password" value="123456"><br>
           <input type="submit" value="Login">
        </form>
        <!--<a href="UserSignUp.php">Sign Up</a>-->
        <?php
        // put your code here
        ?>
    </body>
</html>
