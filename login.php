<?php
require_once "config.php";
session_start();

function nav(){   // always goes back to login form + home
  echo '<p><a class="btn" href="loginForm.php">← Back</a> ';
  echo '<a class="btn" href="interface.html">🏠 Home</a></p>';
  exit;
}

$u = trim($_POST['username'] ?? '');
$p = trim($_POST['psw']      ?? '');

if ($u==='' || $p===''){ echo "Fill in every field."; nav(); }

$stmt = $mysqli->prepare(
  "SELECT username FROM utenze WHERE username=? AND psw=?"
);
$stmt->bind_param("ss",$u,$p);
$stmt->execute(); $stmt->store_result();

if ($stmt->num_rows){
  $_SESSION['user']=$u;
  echo "Welcome, <strong>$u</strong>!";
} else {
  echo "Wrong username or password.";
}
$stmt->close();
nav();                         // show Back + Home buttons
?>
