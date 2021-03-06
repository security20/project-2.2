<?php
// Made by Jeroen - © 2019

/**
 * Handles requests for specific variables based on station, date and time.
 *
 * @param Message $msg The previous message
 */
function handleDataRequest($msg){
  if(isset($_GET["stn"]) && isset($_GET["var"]) && isset($_GET["date"]) && isset($_GET["time"])){
    $stn = $_GET["stn"];
    $date = $_GET["date"];
    $time = $_GET["time"];
    $var = $_GET["var"];

    $dateE = explode('-', $date);
    $timeE = explode(':', $time);


    // Get station data based on year-month-day-hour-minute-second
    $info = getStationData($stn, $var, $dateE[2], $dateE[1], $dateE[0], $timeE[0], $timeE[1], $timeE[2]);

    if($info->error == false){
      $msg->error = false;
      $msg->data = $info->data;
      $msg->toJson();
    }else{
      $msg->message = 'Couldn\'t find station or data: ' . $date . ' - ' . $time;
      $msg->toJson();
    }
  }else{
    $msg->message = 'Parameters aren´t complete!';
    $msg->toJson();
  }
}


/**
 * Handles request for multiple data types. From multiple stations
 *
 * @param Message $msg The previous message
 */
function handleMultipleData($msg){
  // TODO: Finishing the function if needed!

  if(isset($_GET["var"]) && isset($_GET["date"]) && isset($_GET["time"])){
    $date = $_GET["date"];
    $time = $_GET["time"];
    $var = $_GET["var"];

    $dateE = explode('-', $date);
    $time = explode(':', $time);

    $var = explode('|', $var);
    var_dump($var);

    return;

    // Get station data based on year-month-day-hour-minute-second
    $info = getStationData($stn, $var, $dateE[2], $dateE[1], $dateE[0], $time[0], $time[1], $time[2]);

    if($info->error == false){
      $msg->error = false;
      $msg->data = $info->data;
      $msg->toJson();
    }else{
      $msg->message = 'Couldn\'t find station or data: ' . $date;
      $msg->toJson();
    }
  }else{
    $msg->message = 'Parameters aren´t complete!';
    $msg->toJson();
  }
}
?>
