<?php
$dsn = 'mysql:host=localhost;dbname=test;port=3307';
$username = 'root';
$password = 'usbw';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);

$dbh = new PDO($dsn, $username, $password, $options);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>