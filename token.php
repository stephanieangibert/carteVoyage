<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conserve tes photos de vacances</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/styleConnexion.css">

</head>
<body>
    <nav>
        <div class="logo"><img src="public/images/logo.png" alt=""></div>
        <ul>
            <li><a href="index.php?action=carte">Accueil</a></li>
            <li><a href="index.php?action=connexion">Connexion</a></li>
            <li>Photos</li>
        </ul>
        <div class="toggle">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
<div class="containerConnexion">  
<form action="" method="post">
<form action="" method="POST">
    <div>Récupérez votre mot de passe</div>   
    <input type="mail" placeholder="Saississez votre email" name="email">
    <input type="submit" value="Envoyer" name="btnToken">
  </form>
</form>
<a href="index.php?action=connexion">Connexion</a>
<?php if(isset($erreur)){
    echo $erreur;
}?>

</div>  

</body>
</html>