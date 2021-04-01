<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le coin photographique</title>
    <link rel="stylesheet" href="style.css">

      <!--CDN Bootstrap-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!--Navbar-->
    <nav class="navbar">
        <img src="logo_color.png" class="logo" alt="">
        <a class="nav-link" href="index.php">Le Coin Photographique</a>
        <a href="logout.php" class="nav-link">Déconnexion</a>
    </nav>
    <nav class="nav">
        <a class="btn-menu" href="index.php">Accueil</a>
        <a class="btn-menu" href="search.php">Recherche</a>
        <a class="btn-menu" href="profil.php">Profil</a>
        <a class="btn-menu" href="galerie.php">Galerie</a>
    </nav>

</head>

<body>

<h1 class="title">Message privé</h1>
<div class="row">
    <form action="minichat_post.php"  method="post">
        <label for="pseudo"> Vous : </label>
        <input type="text" name="pseudo" class="form-control">
        <label for="message"> Votre message : </label>
        <input type="text" name="message" class="form-control" placeholder="Tapez votre message ici">
        <input type="submit" value="Envoyer" class="btn">
    </form>
</div>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lecoinphoto;charset=utf8', 'phpmyadmin', 'Simplon974');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>

</body>

</html>