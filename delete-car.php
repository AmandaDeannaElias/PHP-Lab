<?php
use Cars\Model\{Database, Cars};
require_once 'vendor/autoload.php';



if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $s = new Cars();
    $count = $s->deleteCar($id, $db);
    if($count){
        header("Location: list-cars.php");
    }
    else {
        echo " problem deleting";
    }


}