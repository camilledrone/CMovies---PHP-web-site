<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMovies - Genre</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
 
    <body style="background-color:#D7D5D8;">
 
    <?php include('header.php'); ?>
    
    <!-- Le corps -->
    
    <div id="corps">
        <h1 style="color:#7E5F9D;">Genre</h1>

        <h3> Choose a genre</h3>
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
//echo $data; # Print Response Data

// extract the results (27 genre of movies)
$l=[];
$b = false;
$s= $data;
while(!$b){
    $s = strpbrk($s, 'g');
    $i = strpos($s,'}',0);
    $p= str_split($s,$i);
    //print_r($p);
    $w = $p[0];
    // echo $i;
    $s = substr($s,$i);
    //echo $w;
    array_push($l,$w);
    if(!strpbrk($s, 'g')){
        $b = true;
    }
}
//print_r($l);

// put the extracted results in an array
$genre=[];
foreach($l as $x){
    $y = strpbrk($x, ':');
    $x = substr($y,2);
    $x = substr($x,0,-1);
    array_push($genre,$x);
    //echo $x; 
}

/////////////////////////////////////////////////////////////////////////////////
// get movie by genre 


  // Variable qui ajoutera l'attribut selected de la liste déroulante
  $selected = '';
 
  // Parcours du tableau
  echo '<select name="genre">',"\n";
  for($i=0; $i<=26; $i++)
  {
    // Affichage de la ligne
    echo "\t",'<option value="', $i ,'"', $selected ,'>', $genre[$i] ,'</option>',"\n";
    // Remise à zéro de $selected
    $selected='';
  }
  echo '</select>',"\n";

?>
    </div>
    
    <!-- Le pied de page -->
    
    
    </body>
</html>
