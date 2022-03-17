<?php include_once 'header.php'; ?>
<?php include_once 'navbar.php'; ?>

<body>
  <?php
  if (isset($_SESSION["useruid"])) {
    echo "<h1>Hello " . $_SESSION["useruid"] . "</h1>";
  }
 ?>
 <p>And welcome to your profile, your username is: <?php echo $_SESSION["useruid"]; ?></p>

 <p>Your email is: <?php echo $_SESSION["useremail"]; ?></p>

 <p>This is your account ID: <?php echo $_SESSION["userid"]; ?></p>

 </body>
<?php include_once 'footer.php'; ?>
