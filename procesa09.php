<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
$masas = [
  'cl' => "clásica",
  'cr' => "crunchy",
  'li' => "light",
];
$sinopsis = "";
$sinopsis .= "El usuario {$_POST['usuario']} pidió una pizza {$_POST['tamano']}, con masa {$masas[$_POST['masa']]}, el costo total: \${$_POST['costo']}";

echo $sinopsis;
