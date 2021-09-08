
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Uber</title>
</head>
<body>

	<p>CONNEXION CLIENT</p>
	<form action="<?php echo site_url('DatabaseController/connexionClient') ?>" method="post">
		<label for="login">Login</label>
		<input type="text" name="login" id="login" placeholder="email....">
		<br>
		<label for="mdp">Mot de passe</label>
		<input type="text" name="mdp" id="mdp" placeholder="mot de passe...">
		<br><br>
		<p>
			<?php if($erreur != null) {?>
                <p><?php echo $erreur;?><p>
            <?php }?>
                	
        </p>
		<input type="submit" name="connexion" value="Connexion">
	</form>
	<br>
	<p>CONNEXION ADMIN</p>
	<form action="<?php echo site_url('DatabaseController/connexionAdmin') ?>" method="post">
		<label for="login">Login</label>
		<input type="text" name="login" id="login" placeholder="email....">
		<br>
		<label for="mdp">Mot de passe</label>
		<input type="text" name="mdp" id="mdp" placeholder="mot de passe...">
		<br><br>
		<p>
			<?php if($error != null) {?>
                <p><?php echo $error; ?><p>
            <?php }?>
                	
        </p>
		<input type="submit" name="connexion" value="Connexion">
	</form>
	<br>

	<p>STATISTIQUE</p>
	<br>
	<form action="Statistique/statNoteChauffeur" method="post">
		<button type="submit" style="width: 20%;height: 40px;background-color: #E0EEEE;border-radius: 5px">Chauffeur</button>
	</form>
	<form action="Statistique/statNotePassager" method="post">
		<button type="submit" style="width: 20%;height: 40px;background-color: #E0EEEE;border-radius: 5px">Passager</button>
	</form>
	<form action="Statistique/chiffreAffaire" method="post">
		<button type="submit" style="width: 20%;height: 40px;background-color: #E0EEEE;border-radius: 5px">Chiffre d'affaire</button>
	</form>
</body>
</html>