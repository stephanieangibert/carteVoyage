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

</head>
<body>
    <nav>
        <div class="logo"><img src="public/images/logo.png" alt=""></div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=connexion" >Connexion</a></li>
            <li>Photos</li>
        </ul>
        <div class="toggle">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    <div class="container">

        <aside>
            <div class="recherche">
                <label for="search">Inscris ta ville</label>
           <input type="text" id="search">
           <input type="range"  min="1" max="22" id="kms">
         
   
           <p id="valeur"></p>
           <button id="monde">Monde</button>
           <button id="europe">Europe</button>
           <button id="france">France</button>
        </div>
        </aside>
        <form action="index.php?action=epingle&amp=id=" method="post" class="maCarte">   
    <div id="mapid"></div>
    <input type="hidden" name="lat" id="lat">
    <input type="hidden" name="lon" id="lon">
    <input type="hidden" name="ville" id="ville">
    <div class="acquies">
    <p>Souhaites-tu accrocher tes photos sur la carte ?</p>
    <input type="submit" value="ok" class="btnAcquies" name="btnEpingle">
    </div>
    
    </form>
    <input type="hidden" id="userCache" value=<?php echo $_SESSION['id'];?>>    

</div>
<div class="infosUsers">
<p class="titreVille">Les villes choisies sont :</p>
<div class="contVille">
<div class="villeUsers">

</div>
<div class="btnSuppCont">
<?php
if(isset($_SESSION['id'])){
    while ($data = $mesVoyagesAll->fetch())
{
?>
    
<a href="index.php?action=supprimer&amp;id=<?php echo($data['id']);?>">Supprimer</a> 


<?php
} 
    
}?>
</div>
</div>

</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>  
<script src="public/js/app.js"></script>

</body>
</html>