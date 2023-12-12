<?php
#require_once './conn/conn.php';
#session_start();

// Fetch all items from the database
#$query = "SELECT * FROM Items ORDER BY PostTime DESC";
#$result = mysqli_query($dbc, $query);
?>


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
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
							<h1>Lost & Found</h1>
						<p>A website for <a href="https://www.bmcc.cuny.edu/" target="_blank" >BMCC</a> students.<br />
						did you loose something? Don't worry, we are here to help <a href="#start-here">Start here</a>.</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">BMCC</a>
					</header>

					
				<!-- Nav -->
				<nav id="nav">
						<ul class="links">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="generic.php">Login / Signup</a></li>
						<!--<li><a href="elements.php">Post An Item</a></li>-->
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
				</nav> 

				

				<!-- Main -->
					<div id="main">

						<!-- Featured Post -->
							<article class="post featured">
								<header class="major">
									<span class="date">November , 2023</span>
									<h2><a >This is a <br />
									large community of students</a></h2>
									<p>If you lost something don't worry you may find it here. And if you found
										something and want to return it and find its owner, you can find them here
									</p>
								</header>
								<a class="image main"><img src="images/pic01.png" alt="" /></a>
								<ul class="actions special">
									<li><a href="#posts-continue" class="button large">Read Stories</a></li>
								</ul>
							</article>

						<!-- Posts -->
							<section class="posts">
								<article id="posts-continue">
									<header>
										<span class="date">April 24, 2022</span>
										<h2><a >Charles, costri<br />
										csc major</a></h2>
									</header>
									<a class="image fit"><img src="images/pic02.jpg" alt="" /></a>
									<p>I was so glad to ...</p>
									<ul class="actions special">
										<li><a href="stories.php#storie1" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 22, 2023</span>
										<h2><a >Anna ilyt<br />
										Nursing</a></h2>
									</header>
									<a class="image fit"><img src="images/pic03.jpg" alt="" /></a>
									<p>I have been lucky enough ...</p>
									<ul class="actions special">
										<li><a href="stories.php#storie2" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">May 18, 2023</span>
										<h2><a >Erika Gorben<br />
										Communication</a></h2>
									</header>
									<a class="image fit"><img src="images/pic04.jpg" alt="" /></a>
									<p>I thought I lost everything, my ...</p>
									<ul class="actions special">
										<li><a href="stories.php#storie3" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">October 14, 2023</span>
										<h2><a >Tristan Sed<br />
										Multimedia</a></h2>
									</header>
									<a class="image fit"><img src="images/pic05.jpg" alt="" /></a>
									<p>Here they are, I forgot my headpho...</p>
									<ul class="actions special">
										<li><a href="stories.php#storie4" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">November 11, 2023</span>
										<h2><a >Jeremi cortez<br />
										cis major</a></h2>
									</header>
									<a class="image fit"><img src="images/pic06.jpg" alt="" /></a>
									<p>It is not the most expensive iphone, but the emotional value it has...</p>
									<ul class="actions special">
										<li><a href="stories.php#storie5" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">September 7, 2023</span>
										<h2><a >Laura Desanti<br />
										liberal arts</a></h2>
									</header>
									<a class="image fit"><img src="images/pic07.jpg" alt="" /></a>
									<p>The best of the best. I got my ...</p>
									<ul class="actions special">
										<li><a href="stories.php#storie6" class="button">Full Story</a></li>
									</ul>
								</article>
							</section>

						<!-- Footer -->
							<footer id="start-here"		>
								<div class="pagination">
							
									<a href="generic.php" class="next">Become a member</a>
								</div>
							</footer>
							<!--BYME -->
							<p class="next">Contact Us</p>

					</div>

		

				<!-- Footer -->
					<footer id="footer">
			
						<section class="split contact">
							<section class="alt">
								<h3>Address</h3>
								<p>Bmcc New York<br />
								New York, NY 00000-0000</p>
							</section>
							<section>
								<h3>Phone</h3>
								<p><a >(000) 000-0800</a></p>
							</section>
							<section>
								<h3>Email</h3>
								<p><a >lost&found@bmcc.edu</a></p>
							</section>
							<section>
								<h3>Social</h3>
								<ul class="icons alt">
									<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
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