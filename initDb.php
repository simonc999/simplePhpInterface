<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'test_2';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS);
if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

/* ── database check / create ────────────────────────────────── */
$dbExists = $mysqli->query("SHOW DATABASES LIKE '$DB_NAME'")->num_rows > 0;
if (!$dbExists) {
    $mysqli->query("CREATE DATABASE `$DB_NAME`
                    DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
}
echo $dbExists
     ? "Database <strong>$DB_NAME</strong> already existed.<br>"
     : "Database <strong>$DB_NAME</strong> created.<br>";

$mysqli->select_db($DB_NAME);

/* helper ▸ creates table if missing & returns status */
function ensureTable(mysqli $db, string $name, string $ddl): bool {
    $exists = $db->query("SHOW TABLES LIKE '$name'")->num_rows > 0;
    if (!$exists) { $db->query($ddl); }
    return $exists;
}

/* ── utenze ─────────────────────────────────────────────────── */
$utenzeDDL = <<<SQL
CREATE TABLE utenze (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(32) NOT NULL UNIQUE,
    mail     VARCHAR(64) NOT NULL UNIQUE,
    nome     VARCHAR(32),
    cogn     VARCHAR(32),
    psw      VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;
echo ensureTable($mysqli, 'utenze', $utenzeDDL)
     ? "Table <strong>utenze</strong> already existed.<br>"
     : "Table <strong>utenze</strong> created.<br>";

/* ── studente ───────────────────────────────────────────────── */
$studDDL = <<<SQL
CREATE TABLE studente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cf      VARCHAR(16) NOT NULL UNIQUE,
    nome    VARCHAR(32),
    cogn    VARCHAR(32),
    datan   DATE,
    cell    VARCHAR(16),
    telCasa VARCHAR(16)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;
echo ensureTable($mysqli, 'studente', $studDDL)
     ? "Table <strong>studente</strong> already existed.<br>"
     : "Table <strong>studente</strong> created.<br>";

$mysqli->close();
?>
<br><br>
<a class="btn" href="interface.html">Home</a>
