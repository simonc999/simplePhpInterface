<?php
require_once "config.php";
function nav($back){   // ↑ helper adds the two buttons
    echo '<p><a class="btn" href="'.$back.'">← Back</a> ';
    echo '<a class="btn" href="interface.html">🏠 Home</a></p>';
    exit;              // ensure nothing else is printed afterwards
}

$username = trim($_POST['username'] ?? '');
$mail     = trim($_POST['mail']     ?? '');
$nome     = trim($_POST['nome']     ?? '');
$cogn     = trim($_POST['cogn']     ?? '');
$psw      = trim($_POST['psw']      ?? '');
$cpsw     = trim($_POST['cpsw']     ?? '');

if (!$username || !$mail || !$psw || !$cpsw){
    echo "Please complete every required field."; nav('registerForm.php');
}
if ($psw !== $cpsw){
    echo "Passwords do not match."; nav('registerForm.php');
}
if (strlen($psw) < 8){
    echo "Password is too short (min 8 chars)."; nav('registerForm.php');
}

/* uniqueness check */
$stmt = $mysqli->prepare("SELECT id FROM utenze WHERE mail=?");
$stmt->bind_param("s",$mail); $stmt->execute(); $stmt->store_result();
if ($stmt->num_rows){
    echo "E‑mail already registered."; nav('registerForm.php');
}
$stmt->close();

/* insert */
$stmt = $mysqli->prepare(
  "INSERT INTO utenze (username,mail,nome,cogn,psw)
   VALUES (?,?,?,?,?)"
);
$stmt->bind_param("sssss",$username,$mail,$nome,$cogn,$psw);
if ($stmt->execute()){
    echo "✅  Registration successful!";
} else {
    echo "❌  Error: ".$stmt->error;
}
$stmt->close();
nav('registerForm.php');      // show buttons at the end too
?>
