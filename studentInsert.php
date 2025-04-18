<?php
require_once "config.php";

$cf      = trim($_POST['cf']      ?? '');
$nome    = trim($_POST['nome']    ?? '');
$cogn    = trim($_POST['cogn']    ?? '');
$datan   = trim($_POST['datan']   ?? '');
$cell    = trim($_POST['cell']    ?? '');
$telCasa = trim($_POST['telCasa'] ?? '');

if ($cf === '') {
    exit("CF is mandatory. <a href='studentForm.php'>Back</a>");
}

$stmt = $mysqli->prepare(
    "INSERT INTO studente (cf, nome, cogn, datan, cell, telCasa)
     VALUES (?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param("ssssss", $cf, $nome, $cogn, $datan, $cell, $telCasa);
if ($stmt->execute()) {
    echo "✅  Student inserted!";
} else {
    echo "❌  Error: " . $stmt->error;
}
$stmt->close();
?>
<br><br><a href="interface.html">Return to home</a>
