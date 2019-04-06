<?php
include_once "db.inc.php";
//var_dump($_POST);
// Se sugiere añadir validación y sanitización de las variables
$db->save("usuarios", "nombre, usuario, password",
  "'{$_POST['nombre']}',
  '{$_POST['usuario']}',
  '{$_POST['password']}'"
);

header("Location: index.php");
?>
