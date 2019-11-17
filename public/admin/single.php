<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}
?>
<?php require_once 'connection.php';
require_once 'functions.php';

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

<!DOCTYPE html>
<html lang="en">

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
      <h1>Административная панель - Редактирование товара</h1>
    </header>
    <main class="container">
      <div class="row">



        <div class="form col-md-6 col-12">
          <form action="upload.php" method="POST" enctype="multipart/form-data" class="flex columns">
            <input hidden name="id" value=<?= $id ?>>
            <input type="text" name="title" id="title" placeholder="Название" value="<?= $title ?>" required>
            <select name="category" id="category" required>
              <option value="торт" <?= $category == 'торт' ? 'selected' : '' ?>>торт</option>
              <option value="пирожное" <?= $category == 'пирожное' ? 'selected' : '' ?>>пирожное</option>
              <option value="панкейк" <?= $category == 'панкейк' ? 'selected' : '' ?>>панкейк</option>
            </select>
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


      </div>

      </div>
    </main>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</body>

</html>