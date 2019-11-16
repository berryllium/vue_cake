<?php
define('HOST', 'localhost');
define('DB', 'u435826_tortik');
define('LOGIN', 'u435826_tortik');
define('PASSWORD', '0V9u5A9k');

$connection = mysqli_connect(HOST,LOGIN,PASSWORD,DB) or die ('Ошибка подлючения к БД');
