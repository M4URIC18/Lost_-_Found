<?php
require_once './conn/conn.php';
session_start();

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

if (isset($_GET['item_id'])) {
    // Use mysqli_real_escape_string to prevent SQL injection
    $item_id = mysqli_real_escape_string($dbc, $_GET['item_id']);

    // Fetch item details from the database
    // $query = "SELECT * FROM Items WHERE ItemID = '$item_id'";
    // Fetch item details and the username of the user who posted the item
    $query = "SELECT Items.*, Users.Username 
              FROM Items 
              JOIN Users ON Items.UserID = Users.UserID 
              WHERE Items.ItemID = '$item_id'";
    $result = mysqli_query($dbc, $query);
    $item = mysqli_fetch_assoc($result);

    // Processing form data when a new comment is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["UserID"])) {
        $commentText = mysqli_real_escape_string($dbc, $_POST['commentText']);
        $userID = $_SESSION['UserID'];

        // Insert comment into database
        $insertQuery = "INSERT INTO Comments (ItemID, UserID, CommentText) VALUES ('$item_id', '$userID', '$commentText')";
        mysqli_query($dbc, $insertQuery);
    }

    // Fetch comments for this item
    // $commentsQuery = "SELECT CommentText, CommentTime FROM Comments WHERE ItemID = '$item_id' ORDER BY CommentTime DESC";
    // Fetch comments for this item along with the usernames of the commenters
    $commentsQuery = "SELECT Users.Username, Comments.CommentText, Comments.CommentTime
    FROM Comments
    JOIN Users ON Comments.UserID = Users.UserID
    WHERE Comments.ItemID = '$item_id'
    ORDER BY Comments.CommentTime ASC";
    $commentsResult = mysqli_query($dbc, $commentsQuery);
}

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

				<!-- Intro -->
					<div id="intro">
							<h1>Lost & Found</h1>
						
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>
				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">BMCC</a>
					</header>

                <!--nav bar -->
                    <?php include 'navbar.php'; ?>

                    <div id="main">
                        
                        <section class="post">

                            <?php
                                if ($item) {
                                    echo "<article >";
									echo "<header >";
                                    // Use htmlspecialchars to prevent XSS attacks
                                    echo "<h2>" . htmlspecialchars($item['Title']) . "</h2>";
                                    echo "<h5>Posted by "
                                        . htmlspecialchars($item['Username'])
                                        . " on "
                                        . "<span class='post-local-time' data-utc-time='" . htmlspecialchars($item['PostTime']) . "'>"
                                        . htmlspecialchars($item['PostTime']) . " UTC</span>"
                                        . "</h5>";

                                    echo "</header >";

                                    if ($item['Image']) {
                                        echo "<img
                                            src='data:image/jpeg;base64,".base64_encode($item['Image'])."'
                                            class='image fit'
                                        />";
                                    }
                                    echo "<p>Description: " . htmlspecialchars($item['Description']) . "</p>";
                                    echo "</article >";

                                    // Display comments
                                    echo "<h3 >Comments</h3>";
                                    // If there are no comments, display a message
                                    if (mysqli_num_rows($commentsResult) == 0) {
                                        echo "<p>No comments yet.</p>";
                                    }   else {
                                            while ($comment = mysqli_fetch_assoc($commentsResult)) {
                                                echo
                                                    "<div><strong>"
                                                    . htmlspecialchars($comment['Username'])
                                                    . ":</strong> "
                                                    . htmlspecialchars($comment['CommentText'])
                                                    . "<span style='color: gray' class='comment-local-time' data-utc-time=
                                                        '" . htmlspecialchars($comment['CommentTime']) . "'>"
                                                    . " (" . htmlspecialchars($comment['CommentTime']) . " UTC)</span>"
                                                    . "</div><hr>";
                                            }
                                        }

                                    // Display comment form if user is logged in
                                    if (isset($_SESSION["UserID"])) {
                                        echo "
                                        <form action='' method='post'>
                                            <div class='mt-3 mb-3'>
                                                <textarea name='commentText' class='form-control' required></textarea>
                                            </div>
                                            <button type='submit' class='btn btn-primary'>Add a Comment</button>
                                        </form>
                                        ";
                                    } else {
                                        echo "
                                        <form action='' method='post'>
                                            <div class='mt-3 mb-3'>
                                                <textarea name='commentText' class='form-control' required></textarea>
                                            </div>
                                            <button type='submit' class='btn btn-primary' disabled>Add a Comment</button>
                                            <p class='mt-2'>Please <a href='login.php'>log in</a> to add a comment.</p>
                                        </form>
                                        ";
                                    }
                                }   else {
                                    echo "<p>Item not found.</p>";
                                }
                            ?>


                        </section>

                    </div>

                    <!-- Copyright -->
					<div id="copyright">
                        <ul><li>&copy; Lost&Found</li><li>Design: <a href="#">By Mauricio,Manuel,Bara</a></li></ul>
					</div>

            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.post-local-time').forEach(function(el) {
                        var utcTime = el.getAttribute('data-utc-time');
                        // var localTime = new Date(utcTime + 'Z').toLocaleString();
                        // el.textContent = localTime;
                        // Don't display seconds
                        var localTime = new Date(utcTime + 'Z');
                        var options = { year: 'numeric', month: 'numeric', day: 'numeric', hour: '2-digit', minute: '2-digit' };
                        // undefined is passed as the first argument to use the default locale
                        el.textContent = localTime.toLocaleString(undefined, options);
                    });

                    document.querySelectorAll('.comment-local-time').forEach(function(el) {
                        var utcTime = el.getAttribute('data-utc-time');
                        // var localTime = new Date(utcTime + 'Z').toLocaleString();
                        // el.textContent = ' (' + localTime + ')';
                        // Don't display seconds
                        var localTime = new Date(utcTime + 'Z');
                        var options = { year: 'numeric', month: 'numeric', day: 'numeric', hour: '2-digit', minute: '2-digit' };
                        // undefined is passed as the first argument to use the default locale
                        el.textContent = ' (' + localTime.toLocaleString(undefined, options) + ')';
                    });
                });
            </script>

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


