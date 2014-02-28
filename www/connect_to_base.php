<?php
$link = mysql_connect('10.3.31.171', 'apolonka_mysql', 'cdwjnzzj');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
printf("Тип соединения с MySQL: %s\n", mysql_get_server_info());
?>