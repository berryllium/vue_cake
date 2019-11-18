<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Админка</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Административная панель</h1>
  </header>
  <main class="container">
    <div class="row">
      <div class="col-12">
      <?php if ($_SESSION['admin']): ?>
        <a class="menu-link" href="login.php?exit=exit">Выход</a>
        <a class="menu-link" href="changepass.php">Смена пароля</a>
        <a class="menu-link" href="index.php">Каталог</a>
        <a class="menu-link" href="categories.php">Категории товаров</a>
        <a class="menu-link" href="units.php">Единицы измерения</a>
        <a class="menu-link" href="contacts.php">Мои контакты</a>
      <?php endif;?>
      </div>