<?php
    /*$driving_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=106台北市大安區仁愛路四段10號&destinations=105台灣台北市松山區八德路四段36巷52號&key=AIzaSyB8kBxTI4-IP2ikLYNdKcLBTc-xOeDxeHE";
    $result = file_get_contents($driving_url);
    $data = json_decode($result);
    echo "起點 ".$data['origin_addresses'][0].'<br>';
    echo "目的地 ".$data['destination_addresses'][0].'<br>';
    echo "距離 ".$data['rows'][0]['elements'][0]['distance']['text'].'<br>';
    echo "時間 ".$data['rows'][0]['elements'][0]['duration']['text'].'<br>';
    echo "距離".$data->rows[0]->elements[0]->distance->text.'<br>';
    echo "時間 ".$data->rows[0]->elements[0]->duration->text.'<br>';
    */
    include "./data_base/data.php";
    include "./data_base/get_address.php";
    $getAddress = new GetAddress();
    $stmt = $getAddress->get_address_name();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $distance=[];
    $time=[];
    $route=[];

    $origin="106台北市大安區仁愛路四段10號";
    for($i=0; $i<count($data);$i++){
        $destination = $data[$i]['address'];
        $driving_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$origin&destinations=$destination&key=AIzaSyB8kBxTI4-IP2ikLYNdKcLBTc-xOeDxeHE";
        $get_url = file_get_contents($driving_url);
        $result = json_decode($get_url);
        $distanceVal=$result->rows[0]->elements[0]->distance->text;
        $timeVal=$result->rows[0]->elements[0]->duration->text;
        array_push($distance,$distanceVal);
        array_push($time,$timeVal); 
    }
    for ($i = 0; $i < count($time) - 1; $i++) {
        for ($j = $i + 1; $j < count($time); $j++) {
            if ((int) $time[$j] < (int) $time[$i]) {
                $tmp = $time[$i];
                $time[$i] = $time[$j];
                $time[$j] = $tmp;
            }
        }
    }
    for($i = 0; $i < count($time); $i++){
        echo $time[$i].'<br>';
    }


    for ($i = 0; $i < count($distance) - 1; $i++) {
        for ($j = $i + 1; $j < count($distance); $j++) {
            if ((float) $distance[$j] < (float) $distance[$i]) {
                $tmp = $distance[$i];
                $distance[$i] = $distance[$j];
                $distance[$j] = $tmp;
            }
        }
    }
    for($i = 0; $i < count($distance); $i++){
        echo $distance[$i].'<br>';
    }
    
?>
