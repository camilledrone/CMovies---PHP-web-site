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

        <form method="GET">
        <div>
            <label for="genre">Genre</label>
            <input type="genre" name="genre">
        </div>
        <button type="submit">Envoyer</button>
    </form>
    </div>

    
<div>

<?php

if (!isset($_GET['genre']))
{
	echo('Ce genre n\'\ existe pas. Pensez à mettre une majuscule. Si le problème persiste allez voir la liste des genres disponibles dans l\'\onglet genre.');
	
	// Arrête l'exécution de PHP
    return;
}

$search = $_GET['genre'];
header("Access-Control-Allow-Origin: *"); # enable Cross Origin [CORS]


$url = "https://data-imdb1.p.rapidapi.com/movie/byGen/$search/?page_size=50"; # API Link

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
</div>
    
    
    </body>
</html>



  