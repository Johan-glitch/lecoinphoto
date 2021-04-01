<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "Simplon974";
$dbname = "lecoinphoto";
$id = "id";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = "DELETE FROM users WHERE id=$id ";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Votre compte a bien été supprimé.";
  sleep(5);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

header('Location: login.php');
exit();


?>