<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><title>User registration</title>
<link rel="stylesheet" href="style.css">
<style>
.pwd   {position:relative;display:inline-block}
.eye   {position:absolute;right:8px;top:50%;transform:translateY(-50%);
        cursor:pointer;font-size:1rem;user-select:none}
</style>
<script>
function toggle(id){
  const f=document.getElementById(id);
  f.type = (f.type === 'password') ? 'text' : 'password';
}
</script>
</head>
<body>
<h1>User registration</h1>

<form action="register.php" method="post">
  <label>Username*   <input name="username" required></label><br>
  <label>Email*      <input name="mail" type="email" required></label><br>
  <label>First name  <input name="nome"></label><br>
  <label>Last name   <input name="cogn"></label><br>

  <label>Password*<span class="pwd">
      <input type="password" name="psw" id="psw" minlength="8" required>
      <span class="eye" onclick="toggle('psw')">0</span>
  </span></label><br>

  <label>Confirm password*<span class="pwd">
      <input type="password" name="cpsw" id="cpsw" minlength="8" required>
      <span class="eye" onclick="toggle('cpsw')">0</span>
  </span></label><br>

  <button type="submit">Create</button>
</form>

<p>Fields marked * are mandatory.</p>
<p>
  <a class="btn" href="interface.html">Home</a>
</p>
</body>
</html>
