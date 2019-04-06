<?php
include_once "header.php";
?>
<h1>Nuevo usuario</h1>
<form action="new-user-post.php" method="post" class="ui form">
  <label for="nombre">Nombre</label>
  <input type="text" id="nombre" name="nombre" class="ui">
  <label for="usuario">Usuario</label>
  <input type="text" id="usuario" name="usuario" class="ui">
  <label for="password">Contrase&ntilde;a</label>
  <input type="password" id="password" name="password" class="ui">
  <button class="ui primary icon button">Guardar&nbsp;<i class="ui save icon"></i></button>
</form>
<?php
include_once "footer.php";
?>
