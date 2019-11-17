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
  if($result) echo 'данные сохранены';
  else die ('ошибка сохранения данных');
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

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Тортик.рф</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <body>
    <header>
      <h1>Административная панель - Редактирование контактной информации</h1>
    </header>
    <main class="container">
      <div class="row">



        <div class="form col-md-6 col-12">
          <form method="post" class="flex columns">
            <input type="phone" name="phone" id="phone" placeholder="Телефон" value="<?= $phone ?>" required>
            <input type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>" required>
            <input type="text" name="address" id="address" placeholder="Адрес" value="<?= $address ?>" required>
            <input type="text" name="work" id="work" placeholder="Режим работы" value="<?= $work ?>" required>
            <textarea name="about" id="about" placeholder="О нас" required><?= $about ?></textarea>
            <textarea name="delivery" id="delivery" placeholder="Доставка"required><?= $delivery ?></textarea>
            <input type="submit" name="contacts" value="Внести изменения">
          </form>
        </div>


      </div>

      </div>
    </main>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</body>

</html>