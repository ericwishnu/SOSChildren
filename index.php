<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SOS Children</title>
        <script >
        function userLogin(){
            if(window.location.hostname=="localhost"){
            window.location = "http://"+window.location.hostname+"/SOSChildren/User/UserLogin.php";
        }
        else{
           window.location=  "http://soschildren.azurewebsites.net/User/UserLogin.php";
        }
        
        }
        </script>
    </head>
    <body onload="userLogin()">
        <a href="Admin/AdminLogin.php">Admin Login</a><br>
        <a href="Foundation/FoundationLogin.php">Foundation Login</a><br>
        <a href="User/UserLogin.php">User Login</a>
    </body>
</html>
