<?php

include_once 'connect.php';
$id = $_GET['id'];
$query = 'SELECT * FROM `quote` WHERE id=' . $id;
$result = mysqli_query($link, $query);
$data = mysqli_fetch_assoc($result);
unlink($data['quote_picture']);
$query = 'DELETE FROM `quote` WHERE id=' . $id;
$result = mysqli_query($link, $query);

if ($result) {
    header('location:index.php');
}else{
    die('can\'t delete');
}

?>