<?php
     
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
    //echo $x; 
}

    
     $dataPoints = array(
         array("label"=> "The Fellowship Of The Ring", "y"=>60),
         array("label"=> "The Two Towers", "y"=> 65),
         array("label"=> "The Return Of The King", "y"=> 46)
     );
     
         
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>  
     <script>
     window.onload = function () {
      
     var chart = new CanvasJS.Chart("chartContainer", {
         animationEnabled: true,
         theme: "light2",
         title: {
             text: "Sells of the books of The Lord of Ring"
         },
         axisY: {
             suffix: "%",
             scaleBreaks: {
                 autoCalculate: true
             }
         },
         data: [{
             type: "column",
             yValueFormatString: "#,##0\"%\"",
             indexLabel: "{y}",
             indexLabelPlacement: "inside",
             indexLabelFontColor: "white",
             dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();
      
     }
     </script>
     </head>
     <body>
     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     </body>
     </html>                              