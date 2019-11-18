<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

require_once 'connection.php';

if (isset($_POST['contacts'])) {
  extract($_POST);
  $query = "UPDATE `contacts` SET `phone` = '$phone', `email` = '$email', `address` = '$address', `work` = '$work', `about` = '$about', `delivery` = '$delivery' WHERE `contacts`.`id` = 1";
  $result = mysqli_query($connection, $query);
  if ($result) echo 'данные сохранены';
  else die('ошибка сохранения данных');
}

$query = 'SELECT * FROM contacts WHERE `contacts`.`id` = 1';
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $phone = $row['phone'];
  $email = $row['email'];
  $address = $row['address'];
  $work = $row['work'];
  $about = $row['about'];
  $delivery = $row['delivery'];
}

?>
<?= include_once('header.php') ?>
<h2>Контактная информация</h2>
<div class="form col-md-6 col-12">
  <form method="post" class="flex columns">
    <input type="phone" name="phone" id="phone" placeholder="Телефон" value="<?= $phone ?>" required>
    <input type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>" required>
    <input type="text" name="address" id="address" placeholder="Адрес" value="<?= $address ?>" required>
    <input type="text" name="work" id="work" placeholder="Режим работы" value="<?= $work ?>" required>
    <textarea name="about" id="about" placeholder="О нас" required><?= $about ?></textarea>
    <textarea name="delivery" id="delivery" placeholder="Доставка" required><?= $delivery ?></textarea>
    <input type="submit" name="contacts" value="Внести изменения">
  </form>
</div>
