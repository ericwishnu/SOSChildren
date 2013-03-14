<?
session_start();
$p_id = $_GET['p_id'];
if ($p_id == 1) {
    $script = '
    <script>
    function setFocus(id){
     document.getElementById(id).focus();
    }
    </script>
    ';
    $title = 'Sign up Step One';
    $body = 'pageOne';
    $content = '
<div class="container">

    <div class="row">
      <div class="pageOneHeader  span12">
      </div>
    </div>

    <div class="row">
      <div class="pageOneContainer span12">

        <div class="span4 offset2 center">
        
          <form action="UserSignUp.php?&p_id=2" id="signupform" method="POST">
          <input type="hidden" name="sponsortype" value="public"/>
                
            <input type="submit" value="" class="pageOneContainerPublic" name="pageOneContainerPublic" id="pageOneContainerPublic" alt="GO Public!">
          </form>
        </div>

        <div class="span4">
          <form>
            <input type="button" class="pageOneContainerNinja" name="pageOneContainerNinja" id="pageOneContainerNinja" alt="Go Ninja!">
          </form>
        </div>
      </div> <!-- end container div -->
    </div>

    <!-- footer div -->
    <div id="footer">
      <div class="row">
        <div class="row offset5 span6">
          <form>
            <input type="button" class="backButtonCss pageOne" id="backButton" name="backButton">
            <input type="button" class="skipButtonCss pageOne" id="skipButton" name="skipButton">
            <input type="button" class="nextButtonCss pageOne" id="nextButton" name="nextButton">
          </form>
        </div>
      </div>
    </div>

  </div>
';
} else if ($p_id == 2) {
    $title = 'Sign up Step Two';
    $body = 'pageTwo';
    $content = '
        <div class="container">
 		<div class="row">
 		<div class="pageTwoHeader span12">
 		</div>
 		</div>
 		<div class="row">
 		<div class="pageTwoContainer span12">
 			<div class="span4 pageTwoContainerBox offset3">
 			<div class="emailAddressCss">
 				<form action="UserSignUp.php?p_id=3" id="signupform"  method="POST">
 				<input type="email" class="input-xlarge emailAddressCss" name="emailAddress" id="emailAddress" 
 				placeholder="email@domain.com">
 				
 				</div>

 			</div> <!-- end of span 4 -->
 		</div> <!-- end of container -->
 		</div>

 		    <!-- footer div -->
    <div id="footer">
      <div class="row additionalPaddingCss">
      <div class="row offset5 span6">
        
          <input type="button" class="backButtonCss pageTwo" id="backButton" name="backButton">
          <input type="button" class="skipButtonCss pageTwo" id="skipButton" name="skipButton">
          <input type="submit" class="nextButtonCss pageTwo" id="nextButton" name="nextButton" value="">
        </form>
      </div>
    </div>
  </div>

 </div>';
} else if ($p_id == 3) {
    $title = 'Sign up Step Three';
    $body = 'pageThree';
    $content = '
        <div class="container">
		<div class="row">
			<div class="pageThreeHeader span12">
			</div>
		</div>

		<div class="row">
			<div class="pageThreeContainer span12">
				<div class="span7 pageThreeContainerBox offset3">

					<div class="row passwordCss span12">
						<form action="UserSignUp.php?p_id=4" id="signupform"  method="POST">
							<input type="password" class="input-large" id="userPassword" name="password1" placeholder="input password">
						
					</div>	

					<div class="row rePasswordCss span12">
						
							<input type="password" class="input-large" id="reUserPassword" name="password2" placeholder="re-type password">
						
					</div>

				</div>	
			</div>
		</div>

		<div id="footer">
			<div class="row additionalPaddingCss">
				<div class="row offset5 span6">
					
						<input type="button" class="backButtonCss pageThree" id="backButton" name="backButton">
						<input type="button" class="skipButtonCss pageThree"id="skipButton" name="skipButton">
						<input type="submit" value="" class="nextButtonCss pageThree" id="nextButton" name="nextButton" >
					</form>
				</div>
			</div>
		</div>


	</div>
        ';
} else if ($p_id == 4) {
    $title = 'Sign up Step Four';
    $body = 'pageFour';
    $content = '
        <div class="container">
		<div class="row">
			<div class="pageFourHeader span12">
			</div>
		</div>

		<div class="row">
			<div class="pageFourContainer span12">


				<div class="span4 pageFourContainerBox offset3">

					<div class="userNameCss">
						<form action="UserSignUp.php?p_id=5" id="signupform" method="POST">
							<input type="text" class="input-xlarge userNameCss" name="userName" id="userName" 
							placeholder="Name">
						
					</div>

				</div> <!-- end of span 4 -->
			</div> <!-- end of container -->
		</div>

		<div id="footer">
			<div class="row additionalPaddingCss">
				<div class="row offset5 span6">
					
						<input type="button" class="backButtonCss pageFour" id="backButton" name="backButton">
						<input type="button" class="skipButtonCss pageFour" id="skipButton" name="skipButton">
						<input type="submit" value="" class="nextButtonCss pageFour" id="nextButton" name="nextButton">
					</form>
				</div>
			</div>
		</div>

	</div>';
} else if ($p_id == 5) {
    $title = 'Sign up Step Five';
    $body = 'pageFive';
    $content = '
        <div class="container">

		<div class="row">
			<div class="pageFiveHeader span12">
			</div>
		</div>

		<div class="row">
			<div class="pageFiveContainer span12">
				<div class="row">
					<div class="pageFiveContainerBox span8 offset3">
						<div class="row stateCss span12">
							<form action="UserSignUp.php?p_id=6" id="signupform" method="POST">
								<input type="text" class="input-medium" id="country" name="country" placeholder="Country">
								<input type="text" class="input-medium" id="state" name="state" placeholder="State">
							
						</div>

						<div class="row span12">
							<input type="text" class="input-small" id="city" name="city" placeholder="City">
								<input type="text" class="input-large" id="address" name="address" placeholder="Address">
								</div>
                                                                <div class="row span3">
								<input type="text" class="input-small" id="zipCode" name="zipCode" placeholder="Zip Code">
							
						</div>
					</div>

				</div>
			</div>
		</div>

		<div id="footer">
			<div class="row additionalPaddingCss">
				<div class="row offset5 span6">
					
						<input type="button" class="backButtonCss pageFive" id="backButton" name="backButton">
						<input type="button" class="skipButtonCss pageFive" id="skipButton" name="skipButton">
						<input type="submit" value="" class="nextButtonCss pageFive" id="nextButton" name="nextButton">
					</form>
				</div>
			</div>
		</div>

	</div>';
} else if ($p_id == 6) {
    $title = 'Sign up Step Six';
    $body = 'pageSix';
    $content = '<div class="container">
			<div class="row">
				<div class="pageSixHeader span12">
				</div>
			</div>

			<div class="row">
				<div class="pageSixContainer span12">
					<div class="pageSixContainerBox span7 offset3">
						<div class="row phoneCss span8">
							<form action="UserSignUp.php?p_id=7" id="signupform" method="POST">
								<input type="text" class="input-small text-right"  name="phoneCode" id="phoneCode" placeholder="Country Code"/>
								<input type="text" class="input-large" name="phoneNumber" id="phoneNumber" placeHolder="Phone Number"/>
							
						</div>
					</div>

				</div>
			</div>

			<div id="footer">
				<div class="row additionalPaddingCss">
					<div class="row offset5 span6">
						
							<input type="button" class="backButtonCss pageSix" id="backButton" name="backButton">
							<input type="button" class="skipButtonCss pageSix" id="skipButton" name="skipButton">
							<input type="submit" value="" class="nextButtonCss pageSix" id="nextButton" name="nextButton">
						</form>
					</div>
				</div>
			</div>

		</div>
';
} else if ($p_id == 7) {
    $title = 'Sign up Step Seven';
    $body = 'pageSeven';
    $content = '
        <div class="container">
		<div class="row">
			<div class="pageSevenHeader span12">
			</div>
		</div>

		<div class="row">
			<div class="pageSevenContainerPictureBox span3 offset3">

			</div>

			<div class="span6">
				<form action="UserCtrl.php" id="signupform" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="action" value="usersignup"/>
<div id="uploadbtn" onclick="getFile()"><i class="icon-picture"></i>&nbsp;Upload Photo</div>

                                            <div style="height: 0px; width: 0px;overflow:hidden;">
                                            <div id="uploadbtn" onclick="getFile()"><i class="icon-picture"></i>&nbsp;Upload Photo</div>

                                                <input id="upfile" type="file" name="photo" onchange="sub(this)"/>
                                             <script src="../js/js-script.js"></script>
</div>


				
			</div>
		</div>

				<div id="footer">
			<div class="row additionalPaddingCss">
				<div class="row offset5 span6">
					
						<input type="button" class="backButtonCss pageSeven" id="backButton" name="backButton">
						<input type="button" class="skipButtonCss pageSeven" id="skipButton" name="skipButton">
						<input type="submit"value=""  class="nextButtonCss pageSeven" id="nextButton" name="nextButton">
                                             
                                                
					</form>
				</div>
			</div>
		</div>

	</div>';
} else if ($p_id == 8) {
    $title = 'Sign up Step Eight';
    $body = 'pageEight';
    $content = '<div class="container">
		<div class="row">
			<div class="pageEightHeader span12">
			</div>
		</div>
						<div id="footer">
			<div class="row additionalPaddingCss">
				<div class="row offset5 span6">
					<form action="UserLogin.php" id="signupform" method="POST">
                                        <input type="hidden" name="action" value="usersignup"/>
						<input type="button" class="backButtonCss pageEight" id="backButton" name="backButton">
						<input type="submit" value="" class="finishButtonCss pageEight" id="skipButton" name="skipButton">
						
					</form>
				</div>
			</div>
		</div>

	</div>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/signUp.css">
      <script>
	function setfocus(){
		var p_id=<?php echo $_GET['p_id']?>;
		
		if(p_id==2){
			document.getElementById('emailAddress').focus();
		}
		else if(p_id==3){
			document.getElementById('userPassword').focus();
		}
                else if(p_id==4){
			document.getElementById('userName').focus();
		}
                else if(p_id==5){
			document.getElementById('country').focus();
		}
                else if(p_id==6){
			document.getElementById('phoneCode').focus();
		}
               
	}
	</script>
        <script>
            function signup() {
                var pass = document.forms["signupform"]["password"].value;
                var cpass = document.forms["signupform"]["cpassword"].value;
                var email = document.forms["signupform"]["email"].value;
                var name = document.forms["signupform"]["name"].value;

                if (pass != cpass)
                {
                    alert('Your password is not same');
                    return false;
                }
                else if (email == null || email == "")
                {
                    alert('Email cannot blank');
                    return false;
                }
                else if (name == null || name == "")
                {
                    alert('Name cannot blank');
                    return false;
                }


            }
        </script>
    </head>
    <body class='<?php echo $body ?>' onload="setfocus()">


        <?php
        if ($p_id == 1) {
            echo $content;
        } else if ($p_id == "2") {
            $_SESSION['sponsortype'] = $_POST['sponsortype'];
            echo $content;
        } else if ($p_id == "3") {

            $_SESSION['email'] = $_POST['emailAddress'];
            echo $content;
        } else if ($p_id == "4") {
            $_SESSION['password1'] = $_POST['password1'];
            echo $content;
        } else if ($p_id == "5") {
            $_SESSION['name'] = $_POST['userName'];
            echo $content;
        } else if ($p_id == "6") {
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['country'] = $_POST['country'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['address'] = $_POST['address'];
            $_SESSION['zipcode'] = $_POST['zipCode'];
            echo $content;
        } else if ($p_id == "7") {
            $_SESSION['phone'] = $_POST['phoneCode'] . $_POST['phoneNumber'];
            echo $content;
        } else if ($p_id == "8") {
            // $_SESSION['photo'] = serialize($_FILES['photo']['name']);
            echo $content;
        }
        ?>


    </body>
</html>
