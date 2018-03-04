<?php 

include_once 'functions.php';


function add_bike(&$error){
    
    $owner_id = $_SESSION['user'][0];
    $type = $_POST['biketype'];
    $price = $_POST['price'];
    $manufacturer = $_POST['manufacturer'];
    $year = $_POST['year'];
    
    $check= ['#', '>', '<', '^', '*', '%', '$', '&', '/'];

    $bike = new Bike($owner_id, $type, $price, $manufacturer, $year);
    /*checks if the input data is free from special characters*/
    if(validateInput($manufacturer,$check))    
    {
        $bike->save($error);
    }
}
    
?>