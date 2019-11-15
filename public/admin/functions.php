<?php

define('PATH_ROOT', '..');

// отправка писем
function sendMail($sub, $message)
{
  $address = "gorkundp@yandex.ru";
  $email = 'australia@freestuff47.ru'; // от кого
  $header = "Content-type:text/plain; charset = utf-8\r\nFrom:Заказ тортиков <$email>";
  if(mail($address, $sub, $message, $header)) return true;
}


//транслитерация
function translit($str)
{
  $arr = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => '', ' ' => '_'];
  preg_match_all('/./u', $str, $matches);
  $str = $matches[0];
  $result = [];

  foreach ($str as $symbol) {
    foreach ($arr as $t_symbol => $value) {
      if ($t_symbol == $symbol) $symbol = $value;
    }
    $result[] = $symbol;
  }
  $result = implode($result);
  return $result;
}

function imageresize($outfile,$infile,$neww,$newh,$quality) {
    $im=imagecreatefromjpeg($infile);
    $k1=$neww/imagesx($im);
    $k2=$newh/imagesy($im);
    $k=$k1>$k2?$k2:$k1;

    $w=intval(imagesx($im)*$k);
    $h=intval(imagesy($im)*$k);

    $im1=imagecreatetruecolor($w,$h);
    imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
    }

