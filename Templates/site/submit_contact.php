<h1>Message bien reçu !</h1>
        
<div class="card">
    
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <?php

if (!isset($_GET['email']) || !isset($_GET['message']))
{
	echo('Il faut un email et un message pour soumettre le formulaire.');
	
	// Arrête l'exécution de PHP
    return;
}


?>
        <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
        <p class="card-text"><b>Message</b> : <?php echo $_GET['message']; ?></p>
    </div>
</div>