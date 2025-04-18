<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><title>Insert student</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Insert student</h1>

<form action="studentInsert.php" method="post">
   <label>CF (tax code)      <input name="cf" required></label><br>
   <label>First name         <input name="nome"></label><br>
   <label>Last name          <input name="cogn"></label><br>
   <label>Date of birth (YYYY‑MM‑DD) <input name="datan"></label><br>
   <label>Mobile             <input name="cell"></label><br>
   <label>Home phone         <input name="telCasa"></label><br>
   <button type="submit">Insert</button>
</form>

<p><a class="back" href="interface.html">← Back to home</a></p>
</body>
</html>
