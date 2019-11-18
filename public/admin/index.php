<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

require_once 'connection.php';
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

?>

<?php include_once('header.php') ?>
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
  <?php
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
        <td> <a class="delete-link" href="<?= 'upload.php?delete=&id=' . $item['id'] . '&small=' . $item['path_small'] . '&big=' . $item['path_big'] ?>">&times;</a></td>

      </tr>
  <?php endforeach;
  else : echo '<h3 class="col">добавьте товары</h3>';
  endif; ?>
</table>

<?php include_once('footer.php') ?>