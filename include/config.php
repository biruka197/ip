<?php
require_once("default.php");
try {
$dbuser=DBUSER;
$dbname=DBNAME;
//$dbpass=DBPASSWORD;
$dbhost=DBHOST;
$con= new PDO("mysql:host=$dbhost;dbname=$dbname;",$dbuser);//$dbpass);

} catch (PDOException $e) {
  echo $e->getMessage();
}
