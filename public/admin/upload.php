<?
require_once('functions.php');
require_once('connection.php');
$mas = ['image/jpeg','image/png','image/gif'];


if(isset($_POST)) extract($_POST);


$photo = $_FILES['photo'];
$photo_name = translit($photo['name']);
$path_big = '/db/images/big/';
$path_small = '/db/images/small/';

if(in_array($photo['type'], $mas)) {
    if (move_uploaded_file($photo['tmp_name'],PATH_ROOT.$path_big.$photo_name)) {
        imageresize(PATH_ROOT.$path_small.$photo_name,PATH_ROOT.$path_big.$photo_name,320,320,75);
        $big = $path_big.$photo_name;
        $small = $path_small.$photo_name;
        $query = "INSERT INTO `products` (`id`, `title`, `description`, `category`, `price`, `path_big`, `path_small`) VALUES (NULL, '$title', '$desc', '$category', '$price', '$big', '$small');";
        $result = mysqli_query($connection, $query);
        if($result) header("Location: ".PATH_ROOT."/admin/index.php");
        else {
            echo 'Ошибка записи в БД ';
            var_dump($connection->error);

        }
    }
}
else echo 'Можно загрузить только изображения в формате .jpg, .png или .gif';