<?php
session_start();
require('model/frontend/connexion.php');

function incipit(){

   require('view/frontend/incipit.php');
}
function carte($id){
   $mesVoyagesAll=mesVoyages($id);
   suppr($id);
 
   require('view/frontend/carte.php'); 
}
function connexion(){
   if(isset($_POST['btnConnexion'])){
      $mailconnect =htmlspecialchars($_POST['email']) ;   
      $mdpconnect=htmlspecialchars($_POST['mdp']);

        if(isset($mailconnect) AND !empty($mdpconnect)) {         
         $userexist=mailConnex($mailconnect);
                        
          
                 if($userexist == 1) {     
                  $userinfo=usersInfo($mailconnect);
                  if(password_verify($mdpconnect,$userinfo['mdp'])){       
                   
                     $_SESSION['mdp']=$userinfo['mdp']; 
                     $_SESSION['email']=$userinfo['email'];                 
                     $_SESSION['id']=$userinfo['id']; 
                     $_SESSION ['users']= $mailconnect;          
                  
              var_dump( $_SESSION['id']);
              $erreur = "Bravo";
                
                  }  
                 
                  else{
                      $erreur = "Mauvais mail ou mot de passe !";
                     
                   
                  } 
                                
      
               } else {
                 $erreur = "Mauvais mail ou mot de passe !";
                
                   }
           
           
   } else {
    $erreur = "Tous les champs doivent être complétés !";
  
   
   }
   //   header('location:index.php?action=page&amp;id='.$userinfo['id']);
 
}    

   require('view/frontend/connexion.php');  
}

function inscription(){
      if(isset($_POST['btnInscription'])){
      
          $email = htmlspecialchars($_POST['email']);
          $mdp=$_POST['mdp'];
          $mdp2=$_POST['mdp2'];       
          $token="";
       
          if(!empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {  

          
                   if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $mailexist=subscribe($email);
                      if($mailexist == 0) {
                         if($mdp == $mdp2) {
                           $mdp= password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                           $mdp2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);
                           $mailconnect =htmlspecialchars($_POST['email']) ;   
                           $insertmbr=member($email,$mdp,$token);   
                                     
                            $erreur = "Votre compte a bien été créé !";
                         } else {
                            $erreur = "Vos mots de passe ne correspondent pas !";
                         }
                      } else {
                         $erreur = "Adresse mail déjà utilisée !";
                      }
                   } else {
                      $erreur = "Votre adresse mail n'est pas valide !";
                   }              
             
          
        
     } else {
        $erreur = "Tous les champs doivent être complétés !";
     }
  
  }   
      require('view/frontend/inscription.php'); 
  }
  function token(){
   if(isset($_POST['email'])){
      $token=uniqid();
      $url="http://localhost/photosCarte/index.php?action=nouveauMdp&token=$token";
      $message="Bonjour, voici votre lien pour la réinitialisation de votre mot de passe:".$url;
      $headers='Content-Type:text/plain;charset="utf-8"'." ";
      if(mail($_POST['email'],'Mot de passe oublié',$message,$headers)){
                     miseAjourToken($token,$_POST['email']);
                     var_dump($token);
      }else{
         echo"Une erreur est survenue !";
      }
  }

   require('view/frontend/token.php');
}
function changeMdp($token){
   
   if(isset($_GET['token']) && $_GET['token']!=""){
      $reqMail=verificationToken($token);
      var_dump($reqMail);
    if($reqMail==1){
if(isset($_POST['btnMail'])){
   $email = htmlspecialchars($_POST['email']);
   $mdp1=$_POST['mdp'];
   $token=$_GET['token'];
   if(isset($_POST['email'])  && isset($_POST['mdp']) ){
   
      $mdp1= password_hash($_POST['mdp'], PASSWORD_DEFAULT);
      nouveauMdp($mdp1,$email);
   }else{
      $erreur="Tous les champs doivent être remplis !";
   }
  
}
    }
   
   }   
   require('view/frontend/mail.php');
}
function insertEpingle($id){
   if(isset($_POST['btnEpingle'])){
      $lat=htmlspecialchars($_POST['lat']);
      $lon=htmlspecialchars($_POST['lon']); 
      $ville=htmlspecialchars($_POST['ville']);    
      $user_id=$_SESSION['id'];
      $insertmot=epingle($lat,$lon,$ville,$user_id);      
   var_dump($_SESSION['id']);
      }
      $mesVoyagesAll=mesVoyages($id);
  require('view/frontend/carte.php');
}

function supprimer($id){ 
 $mesVoyagesAll=mesVoyages($id);
   suppr($id);
   header('location:index.php');
require('view/frontend/carte.php');

}