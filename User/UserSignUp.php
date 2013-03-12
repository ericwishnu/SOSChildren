<?
session_start();
$p_id = $_GET['p_id'];
if ($p_id == 1) {
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
						<input type="submit" class="nextButtonCss pageThree" id="nextButton" name="nextButton" >
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
						<input type="submit" class="nextButtonCss pageFour" id="nextButton" name="nextButton">
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
					<div class="pageFiveContainerBox span6 offset3">
						<div class="row stateCss span12">
							<form action="UserSignUp.php?p_id=6" id="signupform" method="POST">
								<input type="text" class="input-medium" id="country" name="country" placeholder="Country">
								<input type="text" class="input-medium" id="state" name="state" placeholder="state">
							
						</div>

						<div class="row span12">
							
								<input type="text" class="input-xlarge" id="address" name="address" placeholder="Address">
								<br>
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
						<input type="submit" class="nextButtonCss pageFive" id="nextButton" name="nextButton">
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
								<input type="text" class="input-small" name="phoneCode" id="phoneCode" placeholder="Country Code">
								<input type="text" class="input-large" name="phoneNumber" id="phoneNumber" placeHolder="Phone Number">
							
						</div>
					</div>

				</div>
			</div>

			<div id="footer">
				<div class="row additionalPaddingCss">
					<div class="row offset5 span6">
						
							<input type="button" class="backButtonCss pageSix" id="backButton" name="backButton">
							<input type="button" class="skipButtonCss pageSix" id="skipButton" name="skipButton">
							<input type="submit" class="nextButtonCss pageSix" id="nextButton" name="nextButton">
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
				<form action="UserSignUp.php?p_id=8" id="signupform" method="POST">
					<input type="file" class="uploadCss" id="uploadPicture" name="photo">
				
			</div>
		</div>

				<div id="footer">
			<div class="row additionalPaddingCss">
				<div class="row offset5 span6">
					
						<input type="button" class="backButtonCss pageSeven" id="backButton" name="backButton">
						<input type="button" class="skipButtonCss pageSeven" id="skipButton" name="skipButton">
						<input type="button" class="nextButtonCss pageSeven" id="nextButton" name="nextButton">
                                                <input type="submit" style="dislay:none" onclick="submitform()"/>
                                                <script>
                                                
                                                </script>
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
					<form action="UserCtrl.php" id="signupform" method="POST">
                                        <input type="hidden" name="action" value="usersignup"/>
						<input type="button" class="backButtonCss pageEight" id="backButton" name="backButton">
						<input type="submit" class="finishButtonCss pageEight" id="skipButton" name="skipButton">
						
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
    <body class='<?php echo $body ?>'>


<?php
if ($p_id == 1) {
    echo $content;
    ?>

            <!--            <form action="UserSignUp.php?&p_id=2" id="signupform" method="POST">
                            <input type="hidden" name="sponsortype" value="public"/>
                            <input type="submit" value="public"/>
                        </form>-->
    <?php
} else if ($p_id == "2") {
    $_SESSION['sponsortype'] = $_POST['sponsortype'];
    echo $content;
    ?>
            <!--            <form action="UserSignUp.php?p_id=3" id="signupform"  method="POST">
                            e-mail<input type="email" name="email" />
            
                            <input type="submit" value="next"/>
                        </form>-->
    <?php
} else if ($p_id == "3") {

    $_SESSION['email'] = $_POST['emailAddress'];
    echo $content;
    //echo $_SESSION['sponsortype'] . "<br/>";
    ?>
            <!--            <form action="UserSignUp.php?p_id=4" id="signupform"  method="POST">
                            Password<input type="password" name="password1" /></br>
                            Confirm Password<input type="password" name="password2" />
                            <input type="submit" value="next"/>
                        </form>-->
    <?php
} else if ($p_id == "4") {
    $_SESSION['password1'] = $_POST['password1'];
    echo $content;
    ?>
            <!--            <form action="UserSignUp.php?p_id=5" id="signupform" method="POST">
                            Name<input type="text" name="name" />
                            <input type="submit" value="next" />
                        </form>-->
    <?php
} else if ($p_id == "5") {
    $_SESSION['name'] = $_POST['userName'];
    echo $content;
    ?>
            <!--            <form action="UserSignUp.php?p_id=6" id="signupform" method="POST">
                            Country<input type="text" name="country" /></br>
                            State<input type="text" name="state" /></br>
                            Address<input type="text" name="address" /></br>
                            Zip Code<input type="text" name="zipcode" />
                            <input type="submit" value="next" />
                        </form>-->
    <?php
} else if ($p_id == "6") {
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['zipcode'] = $_POST['zipCode'];
    echo $content;
    ?>
            <!--            <form action="UserSignUp.php?p_id=7" id="signupform" method="POST">
                            Country Code<input type="text" name="countrycode" cols="3"/></br>
                            Phone<input type="text" name="phone" />
                            <input type="submit" value="next" />
                        </form>-->
            <?php
        } else if ($p_id == "7") {
            $_SESSION['phone'] = $_POST['phoneCode'] . $_POST['phoneNumber'];
            echo $content;
            ?>
<!--            <form action="UserSignUp.php?p_id=8" id="signupform" method="POST">
                Upload Photo<input type="file" name="photo" />

                <input type="submit" value="next" />
            </form>-->
    <?php
} else if ($p_id == "8") {
    $_SESSION['photo'] = serialize($_FILES['photo']);
    echo $content;
    ?>
<!--            <form action="UserCtrl.php" id="signupform" method="POST">
                <input type="hidden" name="action" value="usersignup"/>


                <input type="submit" value="next" />
            </form>-->
    <?php
}
?>
        <!--        <form action="UserCtrl.php" id="signupform" method="POST" onsubmit="return signup();">
                    <input type="hidden" name="action" value="usersignup">
                    Sponsor ID : <input type="text" name="sponsorID"><br>
                    Password : <input id="password" type="password" name="password"><br>
                    Confirm Password : <input id="cpassword" type="password" name="confirmpassword"><br>
                    Email : <input id="email" type="email" name="email"><br>
                    Name : <input id="name" type="text" name="name"><br>
                    Address : <input type="text" name="address"><br>
                    City : <input type="text" name="city"><br>
                    State : <input type="text" name="state"><br>
                    Country : <input type="text" name="country"><br>
                    Postal Code : <input type="text" name="postalcode"><br>
                    Phone : <input type="text" name="phone"><br>
                    <input type="submit" value="SignUp">
                </form>-->
        <?php
// put your code here
        ?>
    </body>
</html>
