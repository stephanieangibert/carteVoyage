<?php
require_once __DIR__ .'/config.php';
class API{
    function Select(){
        $db=new Connect;
        $ville = array();
        $data = $db->prepare('SELECT * FROM epingle');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
           $ville[$OutputData['id']]=array(
               'id'=>$OutputData['id'],
               'lat'=>$OutputData['lat'],
               'lon'=>$OutputData['lon'],
               'ville'=>$OutputData['ville'],
               'user_id'=>$OutputData['user_id']
           );
        }
        return json_encode($ville);
    }
}
$API = new API;
header("Content-Type: application/json; charset=UTF-8");
echo $API->Select();
?>