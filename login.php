<?php include_once 'header.php'; ?>
<?php include_once 'navbar.php'; ?>

    <div class="wrapper">
      <h1>Login</h1>
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="name" placeholder="Email/Username">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">Login</button>
      </form>
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "usernamedoesntexist") {
          echo "<p>Username does not exist</p>";
        } else if ($_GET["error"] == "invalidpassword") {
          echo "<p>Incorrect Password</p>";
        }
      }
       ?>
    </div>

<?php include_once 'footer.php'; ?>
