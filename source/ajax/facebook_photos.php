<?php

  header('Content-Type: application/json'); //Necessary for jQuery to understand we're sending JSON
  header('Access-Control-Allow-Origin: *');

  require_once('Facebook/facebook.php');

  $app_id   = '780151942110229';
  $app_secret = '30f119fa8ad46f250fa0727a1321a9c9';

  $facebook = new FacebookGraphV2(array(
    'appId'  => $app_id,
    'secret' => $app_secret,
  ));

  $fields = array('images', 'name', 'link');
  $count = 30;

  $response = $facebook->api('/434164346653119/photos', 'get', array('limit' => $count, 'fields' => $fields));

  $photos = $response['data'];

  echo json_encode($photos);

?>