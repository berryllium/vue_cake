<?php
require_once('functions.php');
require_once('connection.php');

if (isset($_GET['contacts'])) {

  $query = 'SELECT * FROM contacts WHERE `contacts`.`id` = 1';
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $object = new stdClass();
    $object->phone = $row['phone'];
    $object->email = $row['email'];
    $object->address = $row['address'];
    $object->header = $row['header'];
    $object->hometext = $row['hometext'];
    $object->work = $row['work'];
    $object->about = $row['about'];
    $object->delivery = $row['delivery'];
    $data = $object;
  }

  echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
  if (isset($_GET['category']))  {
  $category = $_GET['category'];
  $query = "SELECT * FROM products WHERE `category` = '$category' INNER JOIN categories ON products.category_id = categories.id_cat;";
  }
  else $query = 'SELECT * FROM products INNER JOIN categories ON products.category_id = categories.id_cat;';
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $object = new stdClass();
    $object->id = (int) $row['id'];
    $object->name = $row['title'];
    $object->desc = $row['description'];
    $object->category = $row['category'];
    $object->price = (int) $row['price'];
    $object->units = $row['units'];
    $object->img = $row['path_small'];
    $object->img_big = $row['path_big'];
    $data[] = $object;
  }
  echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
