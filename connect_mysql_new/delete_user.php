<?php
require 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM user WHERE id = '$id'";
$conn->exec($sql);
header("location:view_user.php");

?>