<?php include_once "config.inc.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $conf['appName']; ?></title>
</head>
<body>
<?php
if(isset($_SESSION['error'])){
  echo "<p>{$_SESSION['error']}</p>";
  unset($_SESSION['error']);
}
?>
<form action="post-login.php" method="post">
  <label for="user">Usuario</label>
  <input type="text" id="user" name="user"><br>
  <label for="password">Contraseña</label>
  <input type="password" name="password" id="password"><br>
  <button type="submit">Iniciar sesión</button>
</form>
</body>
</html>
