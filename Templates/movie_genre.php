<?php

header("Access-Control-Allow-Origin: *"); # enable Cross Origin [CORS]
$url = "https://data-imdb1.p.rapidapi.com/genres/"; # API Link

$ch = curl_init(); # initialize curl object
curl_setopt($ch, CURLOPT_URL, $url); # set url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); # receive server response
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # do not verify SSL
curl_setopt($ch, CURLOPT_HTTPHEADER,["x-rapidapi-host: data-imdb1.p.rapidapi.com",
"x-rapidapi-key: 9710db4639mshad86acb4ff1c606p19f6bfjsn6ab45d4148d5"]);
$data = curl_exec($ch); # execute curl
$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE); # http response status code
curl_close($ch); # close curl

//echo "Errors: ".curl_error($ch)."<br>"; # Print errors if any
//echo "Status: ".$httpstatus."<br>"; # Print Response Status Code
echo $data; # Print Response Data


?>