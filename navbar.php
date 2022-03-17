<link rel="stylesheet" href="/css/navbar.css">
<nav class="topnav">
  <div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <?php
        if (isset($_SESSION["useruid"])) {
          echo "<li><a href='profile.php'>Profile</a></li>";
          echo "<li><a>Welcome " . $_SESSION['useruid'] . "</a></li>";
          echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";      
        } else {
          echo "<li><a href='login.php'>Login</a></li>";
          echo "<li><a href='signup.php'>Sign Up</a></li>";
        }
      ?>
    </ul>
  </div>
</nav>
