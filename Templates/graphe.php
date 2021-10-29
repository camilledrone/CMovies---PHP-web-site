<?php

// Standard inclusions     
include("pChart/pData.class");  
include("pChart/pChart.class");  

//API
header("Access-Control-Allow-Origin: *"); # enable Cross Origin [CORS]
$url = 'https://the-one-api.dev/v2/book?'; # API Link

$ch = curl_init(); # initialize curl object
curl_setopt($ch, CURLOPT_URL, $url); # set url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); # receive server response
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # do not verify SSL

$data = curl_exec($ch); # execute curl
$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE); # http response status code
curl_close($ch); # close curl

//echo "Errors: ".curl_error($ch)."<br>"; # Print errors if any
//echo "Status: ".$httpstatus."<br>"; # Print Response Status Code

// separate the results 
$l=[];
$b = false;
$s= $data;
while(!$b){
    $s = strpbrk($s, '_');
    $i = strpos($s,'}',0);
    $p= str_split($s,$i);
    //print_r($p);
    $w = $p[0];
    // echo $i;
    $s = substr($s,$i);
    //echo $w;
    array_push($l,$w);
    if(!strpbrk($s, '_')){
        $b = true;
    }
}
//print_r($l);

// sperate the datas of each results (same principe)

$name=[];
foreach($l as $x){
    $y = strpbrk($x, ',');
    $x = substr($y,8);  
    array_push($name,$x);
    echo $x; 
}
print_r($name);

$sale=[60,45,65];
$d=[];

print_r($name[1]);
/*
for($i=0; i<=2; i++){
    echo $name[$i];
    //array_push($d,["label" => $name[$i], "y" => $sale[$i]]);
}
print_r($d);
*/


?>