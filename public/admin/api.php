<?php
require_once('functions.php');
require_once('connection.php');

$query = 'SELECT * FROM products';
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $object = new stdClass();
  $object->id = (int)$row['id'];
  $object->name = $row['title'];
  $object->desc = $row['description'];
  // $object->category = $row['category'];
  $object->price = (int)$row['price'];
  $object->img = $row['path_big'];
  // $object->img_small = $row['path_small'];
  $data[] = $object;
}
// print_r($data);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
