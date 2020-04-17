<?php
$result = array();
function permute($str, $l, $r)
{
    if ($l == $r) {
        // for($i=0;$i<count($str);$i++){  
        //         echo $str[$i];
        //     }
       global $result;
       array_push($result,$str);
        //     echo '<br>';
        
 
    } else {
        for ($i = $l; $i <= $r; $i++) {
            $str = swap($str, $l, $i);
            permute($str, $l + 1, $r);
            $str = swap($str, $l, $i);
        }
    }
}
function swap($a, $i, $j)
{
    $temp = $a[$i];
    $a[$i] = $a[$j];
    $a[$j] = $temp;
    return $a;
}

$str =array(1,2,3,4,5); 
permute($str, 0, count($str)- 1) ;
print_r ($result);

?>
