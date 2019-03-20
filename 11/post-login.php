<?php
include_once "config.inc.php";
//print_r($_POST);

if($conf['username'] == $_POST['user']){
  if($conf['password'] == $_POST['password']){
    $_SESSION['logeado'] = true;
    header("Location:home.php");
    die();
  }
}

$_SESSION['error'] = "Datos de acceso incorrectos";
header("Location:login.php");
?>
