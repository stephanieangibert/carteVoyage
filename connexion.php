<?php
function subscribe($email)
{
    $db = dbConnect();
    $reqmail = $db->prepare("SELECT * FROM users WHERE email = ?");
    $reqmail->execute(array($email));
    $mailexist = $reqmail->rowCount();
    return $mailexist;
}
function member($email,$mdp,$token)
{  
    $db = dbConnect();  
    $insertmbr = $db->prepare("INSERT INTO users(email, mdp,token) VALUES(?,?,?)");
    $insertmbr->execute(array($email, $mdp,$token));  
    return  $insertmbr; 
        
}
function mailConnex($mailconnect)
{   
    $db = dbConnect();
    $requser = $db->prepare("SELECT * FROM users WHERE email = ?");
    $requser->execute(array($mailconnect));    
    $userexist = $requser->rowCount();   
    return $userexist;   
    
} 
function usersInfo($mailconnect)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute(array($mailconnect));
    $userinfo = $req->fetch();
    return $userinfo;
} 
function miseAjourToken($token,$email){
    $db = dbConnect();
    $req = $db->prepare("UPDATE users SET token=?  WHERE email= ?");
    $reqToken=$req->execute(array($token,$email));
    return  $reqToken;

}
function  verificationToken($token){
    $db = dbConnect();
    $req = $db->prepare("SELECT email FROM users WHERE token = ?");
    $req->execute(array($token));
    $reqMail = $req->rowCount();  
    return $reqMail;
   
}
function nouveauMdp($mdp1,$email){
    $db = dbConnect();
    $req = $db->prepare('UPDATE users SET mdp=?, token="" WHERE email= ?');
    $reqMdp1=$req->execute(array($mdp1,$email));
    return  $reqMdp1;

}
function  epingle($lat,$lon,$ville,$user_id){
    $db = dbConnect();
    $insert = $db->prepare("INSERT INTO epingle(lat,lon,ville,user_id) VALUES(?, ?,?,?)");
    $insert->execute(array($lat,$lon,$ville,$user_id));  
    return  $insert; 
}
function mesVoyages($id){
    $db = dbConnect();
    $req=$db->prepare("SELECT* FROM users INNER JOIN epingle ON users.id=epingle.user_id WHERE users.id =? ");                        
    $req->execute(array($id));
    return $req;
 }
 function marker($id){
     $db=dbConnect();
     $req=$db->prepare("SELECT * FROM epingle WHERE id = ?");
     $req->execute(array($id));
     return $req;

 }
 
 function  suppr($id){
    $db = dbConnect();
    $marker=$db->prepare("DELETE FROM epingle WHERE id = ? ");
    $supp=$marker->execute(array($id)); 
    return $supp;
 }
 
 
function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=carte;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}