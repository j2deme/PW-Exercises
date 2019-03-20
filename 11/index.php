<?php
include_once "config.inc.php";
$sesionIniciada = (isset($_SESSION['logeado'])) ? true : false;

if($sesionIniciada) {
  header("Location:home.php"); // Redirección
} else {
  header("Location:login.php");
}
