<?php
  // Initialiser la session
  session_start();
  include('config.php');
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page d'accueil'
  if(!isset($_SESSION["username"])){
    header("Location: index.php");
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
        <a href="logout.php" class="nav-link">Déconnexion</a>
    </nav>
    <nav class="nav">
        <a class="btn-menu" href="#">Accueil</a>
        <a class="btn-menu" href="#">Recherche</a>
        <a class="btn-menu" href="#">Profil</a>
        <a class="btn-menu" href="#">Galerie</a>
    </nav>
</head>


<body>
    <div class="row">
        <h1 class="title-connexion">Modifier le profil</h1>
    </div>

<div class="row row-connexion">
<form method="post">
            <div class="row">
            <label for="username">Nom d'utilisateur</label>
                    <input name="username" type="text" class="form-control">
            </div>
            <div class="row">
            <label for="email">E-mail</label>
                    <input name="email" type="text" class="form-control">
            </div>
            <div class="row">
            <label for="photo_pro">Photo de profil </label>
                    <input name="photo_pro" type="file" class="form-control">
            </div>
            <div class="row">
            <label for="password">Mot de passe</label>
                    <input name="password" type="text" class="form-control">
            </div>
            <div class="row">
                    <input type="submit" value="Modifier" name="submit"
                        class="btn">
            </div>
        </form>
</div>
       




</body>
<?php
            if (isset($_POST['initial-titre'])) {
                $bdd = new PDO('mysql:host=localhost;dbname=lecoinphoto;charset=utf8', 'phpmyadmin', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM users');
                
                $requete = 'UPDATE info SET All(NULL,"'. $_POST['username'] . '","' . $_POST['email'] . '","' . $_POST['password']. '")';
                $resultat = $bdd->query($requete);

            
            }
?>

</html>