<?php
require_once('connection.php');
session_start();
if ($_GET['exit']) {
  unset($_SESSION['admin']);
  session_destroy();
}
if ($_SESSION['admin']) {
  header("Location: index.php");
  exit;
}
$admin = 'admin';
$pass = '97006ae2d5a568ad0e03386d770c8db6';
$sault = 'wtrg5yw4q%42';

if ($_POST['submit']) {
  if ($admin == $_POST['user'] and $pass == md5($_POST['pass'] . $sault)) {
    $_SESSION['admin'] = $admin;
    header("Location: index.php");
    exit;
  } else echo '<p>Логин или пароль неверны!</p>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Вход в админку</title>
</head>
<body>
  <div class="login-form">
  <form method="post">
    <label for="user">Логин: </label><input type="text" name="user" id="user"/><br />
    <label for="user">Пароль: </label><input type="password" name="pass" id="pass"/><br />
    <input type="submit" name="submit" value="Войти" />
  </form>
</div>
</body>
</html>


<style>
  .login-form {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>