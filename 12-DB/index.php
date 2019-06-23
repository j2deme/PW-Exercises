<?php
include_once "db.inc.php";
//var_dump($db);

$usuarios = $db->select("usuarios");
//var_dump($usuarios);

/*if(count($usuarios) == 2){
  $db->save("usuarios", "nombre,password,usuario", "'Francisco Lopez','12345','flopez'");
}

$ultimo = $db->first("usuarios","*","usuario = 'flopez'");
//var_dump($ultimo);

$db->update("usuarios", "password = 'abcd'", $ultimo['id']);

//$db->delete("usuarios","id = {$ultimo['id']}");
//$db->delete("usuarios", "usuario = 'flopez'");

$res = $db->sql("SELECT COUNT(*) AS cantidad FROM usuarios WHERE nombre LIKE '%lopez%'");*/
//var_dump($res[0]);
include_once "header.php";
?>
<h1>Usuarios</h1>
<a href="new-user.php" class="ui primary icon button">Nuevo usuario <i class="ui user icon"></i></a>

<table class="ui striped table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Usuario</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($usuarios as $u) {
      $id = $u['id'];
      echo "<tr>
        <td>$id</td>
        <td>{$u['nombre']}</td>
        <td>{$u['usuario']}</td>
        <td>
          <a>Actualizar</a>&nbsp;
          <a href=\"delete-user.php?id=$id\">Borrar</a>&nbsp;
          <a href=\"json.php?id=$id\">JSON</a>
        </td>
      </tr>";
    }
    ?>
  </tbody>
</table>

<?php
include_once "footer.php";
?>
