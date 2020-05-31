<?php
$now = strtotime("now");
$end_date = strtotime("+1 year");

while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
    $day_index = date("w", $now);
    if ($day_index == 5) {
        // Print or store the weekends here
        echo date("Y-m-d",$now)."<br>";
        $arr[]=date("Y-m-d",$now);
        
        
    }
    $now = strtotime(date("Y-m-d", $now) . "+1 day");
}
print_r($arr);
?>