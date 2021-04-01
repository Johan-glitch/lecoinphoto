<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="javascript.js">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

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
        <h1 class="title-connexion">Galerie</h1>
    </div>

    <div class="row">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <?php
        $bdd = new PDO('mysql:host=localhost;dbname=lecoinphoto;charset=utf8', 'phpmyadmin', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM publication');
        while ($donnees = $reponse->fetch()) {


          echo "    <div class=\"carousel-item active\">\n";
          echo "      <img src=\"" . $donnees['photo'] . "\" class=\"d-block w-50\" alt=\"...\">\n";
          echo "      <div class=\"carousel-caption d-none d-md-block\">\n";
          echo "        <h5>" . $donnees['titre'] . "</h5>\n";
          echo "              <p>" . $donnees['description'] . "</p>\n";
          echo "              <p>" . $donnees['lieu'] . "</p>\n";
          echo "      </div>\n";
          echo "    </div>\n";
                  
              
}

?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


</body>

</html>