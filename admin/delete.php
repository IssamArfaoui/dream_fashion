
<?php 

require_once "../required/configue.php";

$id = $_GET['id'];

$delete = "DELETE FROM `products` WHERE `id`= ?";
$sql = $connect ->prepare($delete);
$sql->execute([$id]);

header('location: products.php');