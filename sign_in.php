<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
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
</head>

<body>
    <div class="row">
        <img src="logo_color.png" width="250" height="250" alt="">
    </div>
    <h1 class="title">Inscrivez-vous !</h1>

    <div class="row row-form">
        <form method="post" name="login">
            <div class="row">
                <label for="username">Nom d'utilisateur</label>
                <input name="username" type="text" class="form-control">
            </div>
            <div class="row">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control">
            </div>
            <div class="row">
                <label for="role">Rôle</label>
                <select class="form-select form-control" name="role" type="text" aria-label=".form-select-lg example">
                    <option selected disabled>Sélectionnez-en un</option>
                    <option>Photographe</option>
                    <option>Modele</option>
                    <option>Coiffeur(euse)</option>
                    <option>Maquilleur(euse)</option>
                    <option>Wedding Planner</option>
                </select>
            </div>
            <div class="row">
                <label for="fileSelect">Choisir une image</label>
                <input name="photo" type="file" class="form-control"  id="fileSelect">
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif, .png sont autorisés à un maximum de 5 MB.</p>
            </div>
            <div class="row">
                <label for="password">Mot de passe</label>
                <input name="password" type="password" class="form-control">
            </div>
            <div class="row">
                <input type="submit" value="S'inscrire" name="submit" class="btn">
            </div>
            <div class="row">
                <p>Déjà inscrit? <a href="login.php">Connectez-vous</a></p>
            </div>
        </form>
    </div>
    <?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['role'], $_REQUEST['password'], $_REQUEST['photo'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
    // récupérer le role et supprimer les antislashes ajoutés par le formulaire
    $role = stripslashes($_REQUEST['role']);
    $role = mysqli_real_escape_string($conn, $role);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    // récupérer la photo et supprimer les antislashes ajoutés par le formulaire
    $photo = stripslashes($_REQUEST['photo']);
    $photo = mysqli_real_escape_string($conn, $photo);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, role, password, photo)
              VALUES ('$username', '$email', '$role', '".hash('sha256', $password)."', '$photo')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='row'>
             <h3>Vous êtes inscrit avec succès.</h3>
             </div
             <div class='row'>
             <p>Cliquez ici pour vous <a href='login.php' class='deep-orange-text'>connecter</a></p>
       </div>";
    }
}
?>

</body>

</html>