<?
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_base = 'land_form';
$db_port = '3307';
$charset = 'utf8';
$emailFrom = "piligrim16@mail.ru";
$config = [
    'defaultFrom' => 'piligrim16@mail.ru',
    'transports'  => [
        ['file', 'dir'  => __DIR__ .'/mails'],

        ['smtp', 'host' => 'smtp.mail.ru', 'ssl' => true, 'port' => '465', 'login' => 'piligrim16@mail.ru', 'password' => 'u0610008'],
    ],
];
?>