<?php
session_start();
require_once 'connection.php';
$sault = 'wtrg5yw4q%42';
if ($_POST['submit']) {
    $pass_old = $_POST['pass_old'];
    $pass_new = $_POST['pass_new'];
    $pass_reply = $_POST['pass_new'];

    if ($pass_new !== $pass_reply) {
        echo 'пароли не совпадают';
    } else {

        $user = $_SESSION['admin'];
        $md5_new = md5($pass_new . $sault);
        $query = "UPDATE `users` SET `pass` = '$md5_new' WHERE login = '$user'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        if ($result) {
            print_r($row);
            // header("Location: index.php");
        } else {
            echo '<p>Смена пароля не состоялась</p>';
        }
    }
}

?>

<?php include_once 'header.php'?>
<div class="login-form">
  <form method="post">
    <label for="pass_old">Старый пароль: </label><input type="password" name="pass_old" id="pass_old" /><br />
    <label for="pass_new">Новый пароль: </label><input type="password" name="pass_new" id="pass_new" /><br />
    <input type="submit" name="submit" value="Сменить пароль" />
  </form>
</div>
<?php include_once 'footer.php'?>