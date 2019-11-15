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
    <div class="row">
      <?php require_once 'connection.php';
      require_once 'functions.php';
      $query = 'SELECT * FROM products';
      $result = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $arr_photo[] = [
          'id' => $row['id'],
          'title' => $row['title'],
          'description' => $row['description'],
          'category' => $row['category'],
          'price' => $row['price'],
          'path_big' => $row['path_big'],
          'path_small' => $row['path_small'],
        ];
      }

      // вывод товаров из базы
      // if(!$arr_photo) die ('нет файлов');
      foreach ($arr_photo as $key => $item) : ?>
        <div class="item col-md-4 col-sm-6 col-12">
          <a class="example-image-link" href="<?= PATH_ROOT . $item['path_big'] ?>" data-lightbox="example-set">
            <img class="example-image" src="<?= PATH_ROOT . $item['path_small'] ?>" alt="<?= $item['title'] ?>" />
          </a>
          <div><b>Название </b><?= $item['title'] ?></div>
          <div><b>Категория </b><?= $item['category'] ?></div>
          <div><b>Описание </b><?= $item['description'] ?></div>
          <div><b>Цена  </b><?= $item['price'] ?></div>
        </div>
      <?php endforeach; ?>

    </div>
    <div class="form col-md-6 col-12">
      <form action="upload.php" method="POST" enctype="multipart/form-data" class="flex columns">
        <input type="text" name="title" id="title" placeholder="Название" required>
        <select name="category" id="category" required>
          <option value="торт">торт</option>
          <option value="пирожное">пирожное</option>
          <option value="панкейк">панкейк</option>
        </select>
        <input type="number" name="price" id="price" placeholder="Цена" required>
        <textarea type="text" name="desc" id="decs" placeholder="Описание" required></textarea>
        <input type="file" name="photo" id="photo" accept="image/jpeg" required>
        <input type="submit" value="Добавить товар">  
      </form>
    </div>
    </div>
  </main>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>