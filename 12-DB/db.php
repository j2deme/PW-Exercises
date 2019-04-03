<?php
class DB {
  private $db;

  //$db = new DB("root","root12345","demo");
  function DB($user, $password, $dbName, $host = "127.0.0.1", $driver = null, $port = null){
    $this->db = null;
    $driver = (is_null($driver)) ? "mysql" : $driver;
    $port = (is_null($port)) ? "3306" : $port;
    try {
      $this->db = new PDO("$driver:host=$host;dbname=$dbName;port=$port", $user, $password);
    } catch (PDOException $e){
      echo $e->getMessage();
      die();
    }
  }

  //$db->select("usuarios","name,password","WHERE id = 2");
  public function select($table, $columns = "*", $where = "1"){
    if(!is_null($this->db)){
      $sql = "SELECT $columns FROM $table WHERE $where";
      try {
        $st = $this->db->prepare($sql);
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $st->execute();
        return $st->fetchAll();
      } catch (PDOException $e) {
        echo "Error: $sql ({$e->getMessage()})";
      }
    }

    throw new Exception("No hay conexión la BD");
  }

  public function first($table, $columns = "*", $where = "1"){
    $res = $this->select($table, $columns, $where);
    if(count($res) >= 1){
      return $res[0];
    } else {
      return [];
    }
  }

  public function save($table, $columns, $values){
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    try {
      $st = $this->db->prepare($sql);
      $st->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function update($table, $pares, $id = null){
    if(!is_null($id)){
      $id = (int) $id;
      try {
        $sql = "UPDATE $table SET $pares WHERE id = $id";
        $st = $this->db->prepare($sql);
        $st->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

  public function delete($table, $cond){
    if(!empty($cond)){
      try {
        $st = $this->db->prepare("DELETE FROM $table WHERE $cond");
        $st->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

  public function sql($sql){
    try {
      $sql = trim($sql);
      $isSelect = (strtoupper($sql[0]) == 'S');
      $st = $this->db->prepare($sql);
      if($isSelect){
        $st->setFetchMode(PDO::FETCH_ASSOC);
      }
      $st->execute();
      if($isSelect){
        return $st->fetchAll();
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
//print_r(PDO::getAvailableDrivers());
//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'SUPASSWORD';

//var_dump($db);

// Obtener datos de una tabla
/*$st = $db->prepare("SELECT * FROM usuarios");
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
}*/
?>
