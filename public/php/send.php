<?php
require_once('../admin/connection.php');

$query = 'SELECT `email` FROM contacts WHERE `contacts`.`id` = 1';
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_row($result);
$address =  $row[0];

function sendMail($sub, $message, $address)
{
  $email = 'info.тортик-надо.рф'; // от кого
  $header = "Content-type:text/plain; charset = utf-8\r\nFrom:Заказ тортиков <$email>";
  if(mail($address, $sub, $message, $header)) return true;
}

$data = json_decode(file_get_contents('php://input'));
if (is_array($data)) {
  $info = $data[0];
  $cart = $data[1];
  $goods = '';
  foreach ($cart as $good) {
    $goods .= "Торт $good->name ($good->count кг.), ";
  }
  $goods = mb_substr($goods, 0, -2);
} else $info = $data;

extract((array) $info);
if ($email == '') $email = 'не указан';


if ($source == 'Корзина') {
  $text = "Новый заказ\nИмя: $name\nТелефон: $phone\nEmail: $email\nЗаказ: $goods";
} elseif ($source == 'Контакты') {
  $text = "Сообщение от клиента\nИмя: $name\nТелефон: $phone\nEmail: $email\nСообщение: $message";
} elseif ($source == 'Главная') {
  $text = "Заявка с главной страницы\nИмя: $name\nТелефон: $phone\nEmail: $email\n";
}

$subj = "Тортик-надо.рф ($source)";

if (sendMail($subj, $text, $address)) {
  echo 'OK';
}
else echo 'Ошибка отправки формы';
