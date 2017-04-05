<?php

$host = 'localhost';
$user = 'admin';
$password = 'admin';
$database = 'squote';

$link = new mysqli($host, $user, $password, $database);
if ($link->connect_errno) {
    $eror = $link->connect_error;
    die('can\'t connect to database cause : ' . $eror);
}
?>