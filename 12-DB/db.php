<?php
//print_r(PDO::getAvailableDrivers());
//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'SUPASSWORD';
try {
  $dbUser = "root"; // Usuario del docente
  $dbPassword = "root12345"; // Contraseña del docente
  $db = new PDO("mysql:host=127.0.0.1;dbname=demo;port=3306", $dbUser, $dbPassword);
} catch (PDOException $e){
  echo $e->getMessage();
}
//var_dump($db);

// Obtener datos de una tabla
$st = $db->prepare("SELECT * FROM usuarios");
$st->setFetchMode(PDO::FETCH_ASSOC); //PDO::FETCH_OBJ
$st->execute();
$usuarios = $st->fetchAll(); //*fetch* para un solo registro

print_r($usuarios);

if(count($usuarios) == 1) {
  try {
    $st = $db->prepare("INSERT INTO usuarios (nombre, usuario, password) VALUES ('Juan Lopez','jlopez','12345')");
    $st->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
} else {
  try {
    $st = $db->prepare("UPDATE usuarios SET password = 'abcd' WHERE usuario = 'jlopez'");
    $st->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

$st = $db->prepare("SELECT COUNT(*) AS cantidad FROM usuarios WHERE usuario = 'jlopez'");
$st->setFetchMode(PDO::FETCH_ASSOC);
$st->execute();
$res = $st->fetch();
$existe = ($res['cantidad'] >= 1) ? true : false;
//if($res['cantidad'] >= 1) { $existe = true; } else { $existe = false; }

if($existe){
  try {
    $st = $db->prepare("DELETE FROM usuarios WHERE usuario = 'jlopez' AND password = 'abcd'");
    $st->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>
