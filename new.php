<?php

$fname=($_REQUEST['name']);

$email=$_REQUEST['email'];

echo $fname;

$ch = curl_init();

$url="https://www.googleapis.com/customsearch/v1?key=AIzaSyCbYqyMrJXq-BHNDs2LXh-4jg6-d8po8Qk&cx=77b02b6a73c7a4b7b&q=$fname";

//curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/customsearch/v1?key=AIzaSyCbYqyMrJXq-BHNDs2LXh-4jg6-d8po8Qk&cx=77b02b6a73c7a4b7b&q=$fname");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

 

curl_setopt($ch, CURLOPT_URL, $url);

 

$result = curl_exec($ch);

 

$json_obj = json_decode($result,true);

 

echo var_dump($json_obj);

 

echo "End of code";

?>