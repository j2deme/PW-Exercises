<?php
require_once "db.inc.php";

//var_dump(function_exists("json_encode"));

if(isset($_GET['id']) and !empty($_GET['id'])){
  $id = (int) $_GET['id'];
  $user = $db->first("usuarios","*","id = $id");
  echo json_encode($user);
} else {
  $users = $db->select("usuarios");
  echo json_encode($users);
}
?>
