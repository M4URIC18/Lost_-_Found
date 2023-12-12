
<!DOCTYPE HTML>
<!--
	LOST & FOUND
-->
<html>
	<head>
		<title>LOST & FOUND</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>
			#thumbnail {
            width: 3.5rem;
            height: auto;
            border-radius: 50px;
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
			z-index: 1000;
			}
			#thumbnail:hover {
			box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset,
			rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset,
			rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset,
			rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px,
			rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px,
			rgba(0, 0, 0, 0.09) 0px 32px 16px;
			}
			@media screen and (max-width: 980px) {

			#thumbnail {
				display: none;
			}

		}
		</style>
	</head>
	<body class="is-preload">

		<!-- thumbnail -->
		<a href="#"><img id="thumbnail" src="images/up2-36.png" alt="up"></a>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Lost&Found BMCC</a>
					</header>
				
					<?php include 'navbar.php'; ?>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<span class="date">November , 2023</span>
									<h1>Login &<br />
									SignUp</h1>

									<ul class="actions special">
										<li><a href="#login" class="button large">Login</a></li>
										<li><a href="#register" class="button large">Register</a></li>
									</ul>

									<p>To start, you need to create an account with us<br />
									We need to verify you are memeber of Bmcc, student, faculty member etc.<br />
									Once you have your account, you can start posting something you found or something you lost.</p>
								</header>
								<div class="image main"><img src="images/pic01.png" alt="" /></div>
								<p>Our team will facilitate you with the proper information, as soon as our system finds a match</p>
								<p>We will notify you, so let's not waist time. start now</p>
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section id="login">

							<h3>Longin</h3>
							<form method="post" action="login-process.php">
								<div class="fields">
									<div class="field">
										<label for="email">Email address:</label>
										<input type="email" id="email" name="email" required>
									</div>
									<div class="field">
										<label for="password" >Password:</label>
										<input type="password" id="password" name="password" required>
									</div>
								<!--<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="3"></textarea> 
									</div> -->
								</div>
								<ul class="actions">
									<li><button type="submit">Login</button></li>
								</ul>
								<p class="terms">
									By clicking the button, you are agreeing to our
									<span class="terms-highlight">
									  Terms and Services
									</span>
								</p>
							</form>
						</section> 
					</footer >
			
					<footer id="footer">
						<br><br><br><br><br><br>		
						<h1 style="margin:auto;">&#8595</h1>
						<br><br><br><br>
					</footer>

					<footer id="footer">
						<section id="register">
							<h3>Register</h3>
							<form method="post" action="register-process.php">
								<div class="fields">
									<div class="field">
										<label for="email" >Email address:</label>
										<input type="email" id="email" name="email" required>
									</div>
									
									<div class="field">
										<label for="password" >Password:</label>
										<input type="password" id="password" name="password" required>
									</div>
								</div>
								<ul class="actions">
									<li><button type="submit">Register</button></li>
								</ul>
								<p class="terms">
									By clicking the button, you are agreeing to our
									<span class="terms-highlight">
									  Terms and Services
									</span>
								</p>
							</form>

						</section> 
			
					</footer>


					<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Lost&Found</li><li>Design: <a href="#">By Mauricio,Manuel,Bara</a></li></ul>
					</div>

			
			</div>

			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>