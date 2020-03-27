<?php

    $driving_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=106台北市大安區仁愛路四段10號&destinations=105台灣台北市松山區八德路四段36巷52號&key=" ";
    $result = file_get_contents($driving_url);
    $data = json_decode($result);
    /*
    echo "起點 ".$data['origin_addresses'][0].'<br>';
    echo "目的地 ".$data['destination_addresses'][0].'<br>';
    echo "距離 ".$data['rows'][0]['elements'][0]['distance']['text'].'<br>';
    echo "時間 ".$data['rows'][0]['elements'][0]['duration']['text'].'<br>';
    */
    echo $data->rows[0]->elements[0]->duration->text;
    /*
    include "./data_base/data.php";
    include "./data_base/get_address.php";
    $getAddress = new GetAddress();
    $stmt = $getAddress->get_address_name();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);

    $start = $_GET["start"];
    $startclean = str_replace(" ", "+", $start);
    
    for($i=0; $i<count($data);$i++){
        $driving_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$startclean."&destinations=".$data[$i][address]."&key=AIzaSyB8kBxTI4-IP2ikLYNdKcLBTc-xOeDxeHE";
        $get_url = file_get_contents($driving_url);
        $result = json_decode($get_url,true);
        $distance[] = $result['rows'][0]['elements'][0]['distance']['text'];
        $time[] = $result['rows'][0]['elements'][0]['duration']['text']; 
    }
    echo min($distance);
    echo min($time);
    */
    
?>
