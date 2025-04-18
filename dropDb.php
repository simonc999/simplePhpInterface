<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'test_1';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS);
if ($mysqli->connect_errno) {
    die("Connection failed: ".$mysqli->connect_error);
}

$dbExists = $mysqli->query("SHOW DATABASES LIKE '$DB_NAME'")->num_rows > 0;

if ($dbExists) {
    if ($mysqli->query("DROP DATABASE `$DB_NAME`")) {
        echo "Database <strong>$DB_NAME</strong> dropped successfully.";
    } else {
        echo "Error dropping database: ".$mysqli->error;
    }
} else {
    echo "Database <strong>$DB_NAME</strong> does not exist.";
}
$mysqli->close();
?>
<br><br>
<a class="btn" href="interface.html">Home</a>
