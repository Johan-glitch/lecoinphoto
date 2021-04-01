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
    <!--Font Icons-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--Navbar-->
    <nav class="navbar">
        <img src="logo_color.png" class="logo" alt="">
        <a class="nav-link" href="index.php">Le Coin Photographique</a>
        <?php
        if (isset($_SESSION['username'])) {
  echo "Hello ".$_SESSION['username']."";
}
        ?>
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

    <div class="row">
        <a href="post.php">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <p>Créer une nouvelle publication</p></a>
    </div>



        <?php
    $bdd = new PDO('mysql:host=localhost;dbname=lecoinphoto;charset=utf8', 'phpmyadmin', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM publication');
    while ($donnees = $reponse->fetch()) {
        echo "<div class=\"row\">\n";
        echo "    <div class=\"card\" style=\"width: 28rem;\">\n";
        echo "        <img class=\"card-img-top\" src=\"" . $donnees['photo'] . "\" alt=\"Card image cap\">\n";
        echo "        <div class=\"card-body\">\n";
        echo "            <h3 class=\"card-title\"><b>" . $donnees['titre'] . "</b></h3>\n";
        echo "            <p class=\"card-text\">" . $donnees['description'] . "</p>\n";
        echo "    <p class=\"card-text\">" . $donnees['lieu'] . "</p>\n";
        echo "        </div>\n";
        echo "    </div>\n";
        echo "</div>";
    }
?>







</body>

</html>