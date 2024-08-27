<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurant = $_POST["restaurant"];
    $time = $_POST["time"];
    $tel = $_POST["tel"];
    $detail = $_POST["detail"];
}


echo "Name: " . $name;
echo "Time: " . $time;
echo "Tel: " . $tel;
echo "Detail: " . $detail;

?>
