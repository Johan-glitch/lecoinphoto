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
        <img src="logo_color.png" width="70" height="70" alt="">
        <a class="nav-link" href="index.php">Le Coin Photographique</a>
        <?php
        if (isset($_SESSION['username'])) {
  echo "Bonjour ".$_SESSION['username']."";
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
        <h1 class="title-connexion">Publication</h1>
    </div>


    <div class="row row-connexion">
        <form method="post" name="login">
        <div class="row">
                <label for="fileSelect">Choisir une image</label>
                <input name="photo" type="file" class="form-control"  id="fileSelect">
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif, .png sont autorisés à un maximum de 5 MB.</p>

            </div>
            <div class="row">
                <label for="titre" class="center">Titre</label>
                <input name="titre" type="text" class="form-control">

            </div>
            <div class="row">
                <label for="description">Légende</label>
                <input name="description" type="text" class="form-control">

            </div>
            <div class="row">
                <label for="lieu">Lieu</label>
                <input name="lieu" type="text" class="form-control">

            </div>
            <div class="row">
                <input type="submit" value="Publier" name="submit" class="btn">
            </div>
        </form>
    </div>


    <?php
require('config.php');
if (isset( $_REQUEST['photo'], $_REQUEST['titre'], $_REQUEST['description'], $_REQUEST['lieu'])){
    // récupérer l'image et supprimer les antislashes ajoutés par le formulaire
    $photo = stripslashes($_REQUEST['photo']);
    $photo = mysqli_real_escape_string($conn, $photo);
    // récupérer le titre et supprimer les antislashes ajoutés par le formulaire
    $titre = stripslashes($_REQUEST['titre']);
    $titre = mysqli_real_escape_string($conn, $titre); 
    // récupérer le description et supprimer les antislashes ajoutés par le formulaire
    $description = stripslashes($_REQUEST['description']);
    $description = mysqli_real_escape_string($conn, $description);
    // récupérer le lieu et supprimer les antislashes ajoutés par le formulaire
    $lieu = stripslashes($_REQUEST['lieu']);
    $lieu = mysqli_real_escape_string($conn, $lieu);
    //requéte SQL 
    $query = "INSERT into `publication` (photo, titre, description, lieu)
              VALUES ('$photo', '$titre', '$description', '$lieu')";
    // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
    echo "<div class='row'>
         <h3>Vous avez publié avec succès.</h3>
        </div>
         <div class='row'>
         <p center>Cliquez ici pour aller sur votre <a href='galerie.php'>galerie</a></p>
         </div>";
        }
}


  if($rows==1){
    $_SESSION['username'] = $username;
    header("Location: profil.php");
}
?>
</body>

</html>