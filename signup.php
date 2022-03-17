<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

    <div class="wrapper">
      <h1>Sign Up</h1>
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwdrepeat" placeholder="Confirm Password">
        <button type="submit" name="submit">Sign Up</button>
      </form>
      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Please fill in all boxes</p>";
          } else if ($_GET["error"] == "invaliduid") {
            echo "<p>Please enter a valid name</p>";
          } else if ($_GET["error"] == "invalidemail") {
            echo "<p>Please enter a valid email</p>";
          }
          else if ($_GET["error"] == "invalidpassword") {
            echo "<p>Passwords do not match</p>";
          }
          else if ($_GET["error"] == "usernametaken") {
            echo "<p>Username taken</p>";
          }
          else if ($_GET["error"] == "success") {
            echo "<p>Account Created</p>";
          }
        }
      ?>
    </div>



<?php include 'footer.php'; ?>
