<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
  if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
    return true;
  } else {
    return false;
  }
}

function invalidUid($username) {
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    return true;
  } else {
    return false;
  }
}

function invalidEmail($email) {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function passwordMatch($pwd, $pwdrepeat) {
  if ($pwd !== $pwdrepeat) {
    return true;
  } else {
    return false;
  }
}

function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    return false;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
  $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../signup.php?error=success");
  exit();
}

function emptyInputLogin($username, $password) {
  if (empty($username) || empty($password)) {
    return true;
  } else {
    return false;
  }
}

function loginUser($conn, $username, $password) {
  $uidExists = uidExists($conn, $username, $username);

  if ($uidExists === false) {
    header("location: ../login.php?error=usernamedoesntexist");
    exit();
  }

  $hashedPassword = $uidExists["usersPwd"];
  $checkPassword = password_verify($password, $hashedPassword);

  if ($checkPassword === false) {
    header("location: ../login.php?error=invalidpassword");
    exit();
  } else if ($checkPassword === true) {
    session_start();
    $_SESSION["userid"] = $uidExists["usersId"];
    $_SESSION["useruid"] = $uidExists["usersUid"];
    $_SESSION["useremail"] = $uidExists["usersEmail"];

    header("location: ../index.php");
    exit();
  }

}
