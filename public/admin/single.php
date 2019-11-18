<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

require_once 'connection.php';
require_once 'functions.php';

$allCategories = getAllCategories($connection);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM products WHERE id = '$id'";
} else header("Location: " . PATH_ROOT . "/admin/index.php");

$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $arr = [
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
if (!$arr) header("Location: " . PATH_ROOT . "/admin/index.php");
extract($arr);
?>
<?php include_once('header.php') ?>
<h2 class="col-12">Редактирование товара</h2>
<div class="form col-md-6 col-12">
  <form action="upload.php" method="POST" enctype="multipart/form-data" class="flex columns">
    <input hidden name="id" value=<?= $id ?>>
    <input type="text" name="title" id="title" placeholder="Название" value="<?= $title ?>" required>
    <select name="category" id="category" required>
      <?php foreach($allCategories as $el => $value):?>
        <option value="<?= $value['id_cat'] ?>"><?= $value['category'] ?></option>
      <?php endforeach; ?>
    <input type="number" name="price" id="price" placeholder="Цена" value="<?= $price ?>" required>
    <select name="units" id="units" placeholder="Единицы" value="<?= $units ?>" required>
      <option value="шт." <?= $category == 'шт.' ? 'selected' : '' ?>>шт.</option>
      <option value="набор" <?= $category == 'набор' ? 'selected' : '' ?>>набор</option>
      <option value="кг." <?= $category == 'кг.' ? 'selected' : '' ?>>кг.</option>
      <option value="100 г." <?= $category == '100 г.' ? 'selected' : '' ?>>100 г.</option>
    </select>
    <textarea type="text" name="desc" id="decs" placeholder="Описание" required><?= $description ?></textarea>
    <input type="file" name="photo" id="photo" accept="image/jpeg">
    <input type="submit" value="Внести изменения">
  </form>
</div>
<?php include_once('footer.php') ?>