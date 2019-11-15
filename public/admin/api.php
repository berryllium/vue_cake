<?php
require_once('functions.php');
require_once('connection.php');

$query = 'SELECT * FROM products';
      $result = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
          'id' => $row['id'],
          'name' => $row['title'],
          'description' => $row['description'],
          'category' => $row['category'],
          'price' => $row['price'],
          'img_big' => $row['path_big'],
          'img_small' => $row['path_small'],
        ];
      }

json_encode($data);