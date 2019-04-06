<?php
include_once "db.inc.php";
//var_dump($_GET);
$id = (int) $_GET['id'];
$db->delete("usuarios", "id = $id");
header("Location:index.php");
?>
