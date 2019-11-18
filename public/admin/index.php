<?php
session_start();

if(!$_SESSION['admin']){
 header("Location: login.php");
 exit;
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Админка Тортики</title>
</head>

<body>
  <header>
    <h1>Административная панель</h1>
  </header>
  <main class="container">
      <a href="login.php?exit=exit">Выход</a>
      <a href="contacts.php">Мои контакты</a>
    <div class="form col-md-6 col-12">
      <form action="upload.php" method="POST" enctype="multipart/form-data" class="flex columns">
        <input type="text" name="title" id="title" placeholder="Название" required>
        <select name="category" id="category" required>
          <option value="торт">торт</option>
          <option value="пирожное">пирожное</option>
          <option value="панкейк">панкейк</option>
        </select>
        <input type="number" name="price" id="price" placeholder="Цена" required>
        <select name="units" id="units" placeholder="Единицы" required>
          <option value="шт.">шт.</option>
          <option value="набор">набор</option>
          <option value="кг.">кг.</option>
          <option value="100 г.">100 г.</option>
        </select>
        <textarea type="text" name="desc" id="decs" placeholder="Описание" required></textarea>
        <input type="file" name="photo" id="photo" accept="image/jpeg" required>
        <input type="submit" value="Добавить товар">
      </form>
    </div>
    <table class="col-12">
      <tr>
        <th>Фото</th>
        <th>Название</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Цена</th>
        <th>Единицы</th>
        <th>Редактировать</th>
        <th>Удалить</th>
      </tr>
      <?php require_once 'connection.php';
      require_once 'functions.php';

      if (isset($_GET['id'])) {
        $single = $_GET['id'];
        $query = "SELECT * FROM products WHERE id = '$single'";
        $action = "edit";
      } else {
        $query = 'SELECT * FROM products';
        $action = "create";
      }

      $result = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $arr_photo[] = [
          'id' => $row['id'],
          'title' => $row['title'],
          'description' => $row['description'],
          'category' => $row['category'],
          'price' => $row['price'],
          'units' => $row['units'],
          'path_big' => $row['path_big'],
          'path_small' => $row['path_small'],
        ];
      }

      // вывод товаров из базы
      if ($arr_photo) :
        foreach ($arr_photo as $key => $item) : ?>
          <tr>
            <td> <img class="example-image" src="<?= PATH_ROOT . $item['path_small'] ?>" alt="<?= $item['title'] ?>" /> </td>
            <td> <?= $item['title'] ?> </td>
            <td><?= $item['category'] ?> </td>
            <td> <?= $item['description'] ?> </td>
            <td> <?= $item['price'] ?> </td>
            <td> <?= $item['units'] ?> </td>
            <td> <a class="edit-link" href="<?= 'single.php?id=' . $item['id'] ?>" target="_blank">Редактировать</a></td>
            <td> <a class="delete-link" href="<?= 'upload.php?delete=&id=' . $item['id'] . '&small=' . $item['path_small'] . '&big=' . $item['path_big']?>">&times;</a></td>

          </tr>
      <?php endforeach;
      else : echo '<h3 class="col">добавьте товары</h3>';
      endif; ?>
    </table>

    </div>
  </main>
  <script src="jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>