<?php
require('controller/frontend.php');
try{
if(isset($_GET['action'])){
    if(($_GET['action']=='connexion')){
        connexion();
    }
    if(($_GET['action']=='inscription')){
        inscription();
    }
    if(($_GET['action']=='token')){
        token();
    }
    if($_GET['action']=='nouveauMdp'){
        changeMdp($_GET['token']);
    }
    if($_GET['action']=='epingle') {
        if(isset($_SESSION['id'])){
            insertEpingle($_SESSION['id']);   
        }
    }
    if($_GET['action']=='supprimer'){
            supprimer($_GET['id']);
             }          
    

  


}else{
    if(isset($_SESSION['id'])){
        carte($_SESSION['id']);
    }else{
        incipit();
    }
   
}
}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}