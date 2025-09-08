
<?php

require_once "../required/configue.php";

$id = $_GET['id'];

$delete = "DELETE FROM `checkout` WHERE `id`= ?";
$sql = $connect ->prepare($delete);
$sql->execute([$id]);

header("location: orders.php");