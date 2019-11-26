<?php
$servername = "localhost";
$username = "root";
$database = "rpg";
$password = "";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $servidor = new PDO($sql, $username, $password, $dsn_Options);
} catch (PDOException $error) {
  echo 'Erro na conexão com o Servidor! Tente novamente mais tarde.' . $error->getMessage();
}

?>