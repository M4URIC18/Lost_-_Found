<nav id="nav">
    <ul class="links">
        
        
        <?php if(isset($_SESSION['UserID'])): ?>
                
                <li class="active"><a href="elements.php">Post An Item</a></li>
                <li class="active"><a href="elements.php">
                     Welcome, <?php echo htmlspecialchars($_SESSION['Username']); ?>
                </a></li>
                <li><a  href="logout.php">Logout</a></li>
                
        <?php else: ?>  
                 <li ><a href="index.php">Home</a></li>
                 <li class="active"><a href="generic.php">Login / Signup</a></li>
        <?php endif; ?>
    </ul>
    <ul class="icons">
        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
    </ul>
</nav>