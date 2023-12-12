<?php
session_start();

// Fetch all items from the database
#$query = "SELECT * FROM Items ORDER BY PostTime DESC";
#$result = mysqli_query($dbc, $query);

// Start output buffering
// to prevent sending HTTP headers before redirecting to login page (in 10 seconds)
ob_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["UserID"]) || empty($_SESSION["UserID"])) {
    echo "Please login first. Redirecting to login page in 10 seconds...";
    header("refresh:10;url=generic.php");
    echo "<br><br><a href='generic.php'>Click here to go to login page now</a>";
    exit;
}

// Include the database connection file
require_once 'conn/conn.php';

// Define variables and initialize with empty values
$type = $title = $description = "";
$imageContent = null;

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = mysqli_real_escape_string($dbc, $_POST['type']);
    $title = mysqli_real_escape_string($dbc, $_POST['title']);
    $description = mysqli_real_escape_string($dbc, $_POST['description']);
    $userID = $_SESSION['UserID']; // Get UserID from session

    if (!empty($_FILES["image"]["tmp_name"])) {
        // Check if the image is larger than 1000KB (1MB)
        if ($_FILES["image"]["size"] > 1000 * 1024) {
			$message = "The image size should be less than 1MB.";
            echo "<script>alert('$message');</script>";
        } else {
            $image = $_FILES['image']['tmp_name'];
            $imageContent = addslashes(file_get_contents($image));

            // Prepare an insert statement
            $query = "INSERT INTO Items (UserID, Type, Title, Description, Image) VALUES ('$userID', '$type', '$title', '$description', '{$imageContent}')";

            if (mysqli_query($dbc, $query)) {
				$message = "Item posted successfully.";
				echo "<script>alert('$message');</script>";
            } else {
                echo "Error: " . mysqli_error($dbc);
            }
        }
    }

}

// End output buffering and flush output
ob_end_flush();
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
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="#" class="logo">Lost&Found BMCC</a>
					</header>

					<?php include 'navbar.php'; ?>
				<!-- Nav 
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
							<li><a href="generic.php">Sign-in/Sign-up Page</a></li>
							<li class="active"><a href="elements.php">Post An Item</a></li>
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav> -->

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Start<br />
									Posting</h1>
								</header>

								<!-- Text stuff -->
									<ul class="actions special">
										<li><a href="#form-found" class="button large">Post</a></li>
										<li><a href="#postings" class="button large">See postings</a></li>
									</ul>

									<h2>...</h2>
									<hr />
									<header id="form-found">
										<h2>Did you find or lose something? Post an item.</h2>
										<p>Fill up this form</p>
										<section class="form-found">
											<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
												<div class="fields">
													<div class="field">
														<label>Item type (Lost or Found)</label>
														<select name="type">
															<option value="lost">Lost</option>
															<option value="found">Found</option>
														</select>
													</div>
													<div class="field">
														<label >Title (Name of the item)</label>
														<input type="text" name="title" required>
													</div>
													<div class="field">
														<label >Description</label>
														<textarea
															name="description"
															placeholder="Please describe the item in detail..."
															required
														></textarea>
													</div>
													<div class="field">
														<label>Item image (size < 1MB)</label>
														<input type="file" name="image">
													</div>
												</div>
												<ul class="actions">
													<li><button type="submit">Post</button></li>
												</ul>
												<p class="terms">
													By clicking the button, you are agreeing to our
													<span class="terms-highlight">
													  Terms and Services	
													</span>
												</p>
											</form>
										</section> 
									</header>
									
									<hr />
									<hr />
									<hr />
									<div class="row">
										<div class="col-6 col-12-small">

											<h3>Ex: you found an id</h3>
											<ul>
												<li>Title: student id</li>
												<li>Description: found this id in the main building.</li>
												<li>Image: optional</li>
					
											</ul>

											<h3>Ex: you found Airpods</h3>
											<ul class="alt">
												<li>Title: airpods </li>
												<li>Description: found them in room 907.</li>
												<li>Image: optional</li>
											</ul>

										</div>
										<div class="col-6 col-12-small">

											<h3>Ex: You lost your glasses</h3>
											<ol>
												<li>Title: glasses </li>
												<li>Description: I lost a pair of black glasses.</li>
												<li>Image: optional</li>
											</ol>

											<h3>You can follow us on:</h3>
											<ul class="icons">
												<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
												<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
											</ul>
											<ul class="icons alt">
												<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon brands alt fa-github"><span class="label">Github</span></a></li>
												<li><a href="#" class="icon brands alt fa-dribbble"><span class="label">Dribbble</span></a></li>
											</ul>

										</div>
									</div>

									<hr />
									<hr />
									<hr />
							
								<!-- Blockquote -->
									<h2>Quote</h2>
									<blockquote>"Returning what doesn't belong to us is not just a gesture of kindness;
										it's a reflection of our integrity and the measure of our character. In the act
										of returning, we not only restore what was lost, but we contribute to a world
										where honesty and empathy prevail."</blockquote>

									<hr />
									<hr />
									<hr />

								<!-- Image -->
									<h2 id="postings">Postings</h2>
									
									<div id="wrapper">
										<div id="main">

										<?php
											require_once './conn/conn.php';
											session_start();

											// Fetch all items from the database
											$query = "SELECT * FROM Items ORDER BY PostTime DESC";
											$result = mysqli_query($dbc, $query);
										?>
											<section class="posts">
											
												<?php
												if ($result) {
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<article >";
														echo "<header >";
														echo "<h2 >" . "[" . htmlspecialchars($row['Type']) . "] " . htmlspecialchars($row['Title']) . "</h2>";

														echo "</header >";
														if ($row['Image']) {
															echo "<img
																src='data:image/jpeg;base64,".base64_encode($row['Image'])."'
																class='image fit'
															/>";
														}
														echo "<p>" . htmlspecialchars($row['Description']) . "</p>";

														echo "<ul class='actions special' >";
														echo "<li>";

														echo "<a href='item-detail.php?item_id=" . $row['ItemID'] . "' class='button'>View Details</a>";

														echo "</li>";
														echo "</ul>";

														echo "</article >";
													}
												}	else {
													echo "<p>No items found.</p>";
												}
												?>
									
											</section>
										<div>									
									</div>
									

									<h3>Founders &amp; Team</h3>
									<p><span class="image left"><img src="images/pic12.jpg" alt="" /></span>Three friends, frustrated by the recurring problem of losing 
										valuable items, decided to create a website to streamline the process of recovery. Late nights of coding and dedication led to the
										birth of a user-friendly platform, providing a centralized space for people to locate and reclaim their lost belongings. Word 
										quickly spread, turning their small initiative into a widely embraced solution for the forgetful and the finders alike.</p>
									<p><span class="image right"><img src="images/pic12.jpg" alt="" /></span>Our team's dedication and commitment are evident in the 
										countless hours they spend refining the website, ensuring it meets the specific needs and preferences of their fellow students. 
										Not only does their technical proficiency shine, but their empathy and understanding of the college community's challenges showcase 
										their genuine desire to make a positive impact.</p>

									<hr />

								<!-- Box -->
									<h2>Mission</h2>
									<div class="box">
										<p>The mission of our website is to provide a user-friendly platform that 
											empowers individuals to easily locate and recover their lost items. 
											We aim to reduce the stress and inconvenience associated with losing 
											belongings by leveraging technology to facilitate efficient and effective
											reunions. Our commitment is to create a supportive community that 
											fosters the return of cherished possessions, promoting a sense of 
											connection and relief for those who have experienced the frustration of
											misplacing valuables.</p>
									</div>

									<hr />

								<!-- Preformatted Code -->
									<h2>Dear User</h2>
									<pre><code>
A big thank you for using
Lost&Found to find your lost items! We're thrilled to have helped
you in reuniting with your belongings. Your trust means the world
to us. If you have any feedback or need further assistance, feel
free to reach out. Wishing you all the best!

								Best regards,
									</code></pre>

							</section>

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