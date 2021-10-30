<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMovies - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
 
    <body>
 
    <?php include('header.php'); ?>
    
    <!-- Le corps -->
    
    <div id="corps">
        <h1>CMovies</h1>
        
        <p>
            Welcome on CMovies!<br />
            You're looking for a movie, a genre, an actor .. you're in the right way !
        </p>

        <h3> Choose a genre </h3>
        <?php include('genre/movie_genre.php'); ?>
    </div>
    
    <!-- Le pied de page -->
    
    <?php include('footer.php'); ?>
    
    </body>
</html>