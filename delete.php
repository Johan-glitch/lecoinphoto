<?php
$id=$_GET['id'];
// Connexion à la base de données
$link = mysqli_connect("localhost", "phpmyadmin", "Simplon974", "lecoinphoto");
 $link -> set_charset('utf8');
// Vérification de la connexion
if($link === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
 
// Attempt delete query execution
$sql = "DELETE FROM users WHERE id=".$id."";
if(mysqli_query($link, $sql)){
    echo "Votre compte a été supprimé avec succès.";
} else{
    echo "ERREUR : Impossible d’exécuter $sql. " . mysqli_error($link);
}
?>