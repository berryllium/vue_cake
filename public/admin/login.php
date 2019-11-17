<?php
require_once('connection.php');
session_start();
if($_GET['exit']){
  unset($_SESSION['admin']);
  session_destroy();
 }
if($_SESSION['admin']){
  header("Location: index.php");
  exit;
 }
$admin = 'admin';
$pass = '97006ae2d5a568ad0e03386d770c8db6';
$sault = 'wtrg5yw4q%42';

if($_POST['submit']){
  if($admin == $_POST['user'] AND $pass == md5($_POST['pass'].$sault)){
   $_SESSION['admin'] = $admin;
   header("Location: index.php");
   exit;
  }else echo '<p>Логин или пароль неверны!</p>';
 }



?>

<form method="post">
  Username: <input type="text" name="user" /><br />
  Password: <input type="password" name="pass" /><br />
  <input type="submit" name="submit" value="Войти" />
</form>

