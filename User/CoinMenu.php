<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
	<link rel="stylesheet" type="text/css" href="../css/coinMenu.css">
	<title>Coins.. Coins Everywhere</title>
</head>

<body class="Background">

	<div class="Header">
		<!-- Header class -->
	</div>

	<div class="row">
		<div class="span3 Logo">
			<!-- Logo Div  -->
		</div>
	</div>

	<div class="row">

		<div class="container">
			<div class="row-fluid">
				<div class="span2 paddingLeft">

					<div class="row-fluid">
						<form action="MainMenu.html" method="post"/>
						<input type="hidden" name="action" value="home"/>
						<input type="submit" class="homeButton span12" id="home" name="name" value=""/>
					</form>
				</div>

				<div class="row-fluid" >
					<form action="#" method="post">
						<input type="hidden" name="action" value="explore"/>
						<input type="submit" class="exploreButton span12" id="explore" name="explore" value=""/>

					</form>
				</div>

				<div class="row-fluid">
					<form action="NotifMenu.html" method="post">
						<input type="hidden" name="action" value="notif"/>
						<input type="submit" class="notificationButton span12" id="notification" name="notification" value=""/>
					</form>
				</div>

				<div class="row-fluid">
					<form action="CoinsMenu.html" method="post">
						<input type="hidden" name="action" value="coins"/>
						<input type="submit" class="coinButton span12" id="coin" name="coin" value=""/>
					</form>
				</div>

				<div class="row-fluid" >
					<form action="#" method="post">
						<input type="hidden" name="action" value="search"/>
						<input type="submit" class="searchButton span12" id="search" name="search" value=""/>
					</form>
				</div>

			</div>


			<div class="span9">

				<!-- USER POST DIVISION -->
				<div class="row-fluid">
					<div class="userPicture span2">
					</div>

					<div class="userPost span9">
						<div class="row-fluid"> 	
							<div class="span9 postArea">


								<form action="#" method="post" name="post" enctype="multipart/form-data"
								<input type="hidden" name="action" value="postArea" />
								<textarea class="textArea" name="post"></textarea>
								<div id="uploadbtn" onclick="getFile()"><i class="icon-picture"></i>&nbsp;Upload Photo</div>
								<div style='height: 0px; width: 0px;overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)"/></div>


							</div>

							<!-- Area for inputing a post  -->
							<div class="span2">

								<input type="hidden" name="action" value="post"/>
								<input type="submit" class="postButton span10" id="post" name="post" value=""/>
							</form>
						</div>
					</div>
				</div>

			</div>

			<div class="row-fluid margin-top">
				<!-- Main Menu Class -->
				<div class="span12">

					<div class="row-fluid">
						<div class="coinsFeedTop">
							<div class="myFont">
								<p class="myFont"> Coins </p>
							</div>
						</div>
					</div>

					<div class="row-fluid">
						<div class="coinsFeedMiddle">
							<div class="row">
								<div class="row">
									<div class="span4 offset1 coinHeader">
										<div class="span4 underlogo"></div>
									</div>
									<div class="span4 offset2">
										<form>
											<input type="submit" class="span12 checkCoin" value="">
										</form>
										<div class="row">
											<div class="textAmount span12 offset1"></div> 
										</div>
										<div class="row input-prepend">
											<form>
												<input type="text" class="offset4 input-small" readonly value=""><span class="add-on">Coins</span>
											</form>
										</div>
									</div>
								</div>	
							</div>

							<div class="row">
								<div class="span4 offset1">
									<div class="row">
										<div class="textBuy span10" value="">
										</div>
									</div>

									<div class="row span12 input-prepend">
										<form class="margin-top">
											<input type="text" class="input-small" value="">
											<span class="add-on">Coins</span>
										</form>
										
									</div>
									<div class="row">
										<form>
											<input type="submit" class="buyCoin span10" value="">
										</form>
									</div>
								</div>

								<div class="offset1 span5">
									<div class="bigCoin"></div>
								</div>
							</div>
						</div>

						<div class="row-fluid">
							<div class="coinsFeedBot">
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="span1">

			<div class="row-fluid">
				<form>
					<input type="button" class="span12 pickMeButton" id="pickme" name="pickme" data-toggle="modal" href="#pickMeModal">
				</form>
			</div>

			<div class="row-fluid">
				<form>
					<input type="button" class="span12 recommendedButton" id="recommended" name="recommended" data-toggle="modal" href="#Recomended">
				</form>
			</div>

			<div class="row-fluid">
				<form>
					<input type="button" class="span12 emergencyButton" id="emergency" name="emergency" data-toggle="modal" href="#Emergency">
				</form>
			</div>

		</div>

	</div>
</div>



<div class="Footer">
	<!-- footer div -->

</div>



<!-- Modal for Widget button 
-->

<!-- Pick Me Modal Division -->

<div id="pickMeModal" class="modal hide fade in" style="display: none; ">  
	<div class="modal-header modalPink modal-radius">  
		<a class="close" data-dismiss="modal">×</a>  
		<h3>This is a Pick Me Modal Example</h3>  
	</div>  
	<div class="modal-body">  
		<h4>Text in a modal</h4>  
		<p>You can add some text here.</p>                
	</div>  
	<div class="modal-footer modalPink">  
		<a href="#" class="btn btn-success">Call to action</a>  
		<a href="#" class="btn" data-dismiss="modal">Close</a>  
	</div>  
</div>  

<!-- 
	Recommended Modal Division -->

	<div id="Recomended" class="modal hide fade in" style="display: none; ">  
		<div class="modal-header modalPink modal-radius">  
			<a class="close" data-dismiss="modal">×</a>  
			<h3>Recommended</h3>  
		</div>  
		<div class="modal-body">  
			<h4>Text in a modal</h4>  
			<p>You can add some text here.</p>                
		</div>  
		<div class="modal-footer modalPink">  
			<a href="#" class="btn btn-success">Call to action</a>  
			<a href="#" class="btn" data-dismiss="modal">Close</a>  
		</div>  
	</div>  


	<!-- Emergency Button -->

	<div id="Emergency" class="modal hide fade in" style="display: none;">

		<div class="modal-header modalPink modal-radius">  
			<a class="close" data-dismiss="modal">×</a>  
			<h2>Emergency</h2>  
		</div>  
		<div class="modal-body">  
			<h4>Text in a modal</h4>  
			<p>Add some Text Here</p>
		</div>  
		<div class="modal-footer modalPink">  
			<a href="#" class="btn btn-success">Call to action</a>  
			<a href="#" class="btn" data-dismiss="modal">Close</a>  
		</div>  

	</div>  

	<!-- SCRIPT !!!  -->

	<script src="../js/jquery.js"></script>  
	<script src="../js/bootstrap-modal.js"></script>  

</body>

</html>