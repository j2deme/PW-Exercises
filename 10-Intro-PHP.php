<?php
$now = new DateTime("now");
require "10-A.php";
require_once "10-A.php";
?>
<body>
  <h2>Hobbies</h2>
  <p>Mis hobbies son:</p>
  <ul>
    <?php
    $hobbies = ["Programar","Ver anime","Cocinar","Ver películas de zombies", "Dibujar","Escuchar música en inglés"];
    foreach ($hobbies as $hobbie) {
      echo "<li>{$hobbie}</li>";
    }
    ?>
  </ul>
  <hr>
  <?php include "10-B.php"; ?>
</body>
</html>
<?php
/*$name = 'Jaime';
if ($name == 'Jaime') {
  echo "Hello {$name}<br/>";
} else {
  echo "Hello World!<br/>";
}

for ($i=1; $i <= 20; $i++) {
  echo "$i,";
}*/
?>
