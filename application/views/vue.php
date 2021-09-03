
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
	<h1>Admin</h1>
	<?php for ($i=0; $i < count($liste_admin) ; $i++) { ?>
		<p><?php echo $liste_admin[$i]['email']; ?></p>
		<p><?php echo $liste_admin[$i]['mdp']; ?></p>
	<?php } ?>

	<h1>Passager</h1>
	<?php for ($i=0; $i < count($liste_passager) ; $i++) { ?>
		<p><?php echo $liste_passager[$i]['email']; ?></p>
		<p><?php echo $liste_passager[$i]['nom']; ?></p>
		<p><?php echo $liste_passager[$i]['mdp']; ?></p>
	<?php } ?>

	<h1>Client</h1>
	<?php for ($i=0; $i < count($liste_client) ; $i++) { ?>
		<p><?php echo $liste_client[$i]['email']; ?></p>
		<p><?php echo $liste_client[$i]['nom']; ?></p>
		<p><?php echo $liste_client[$i]['mdp']; ?></p>
	<?php } ?>

	<h1>Paiement</h1>
	<?php for ($i=0; $i < count($liste_paiement) ; $i++) { ?>
		<p><?php echo $liste_paiement[$i]['idPaiement']; ?></p>
		<p><?php echo $liste_paiement[$i]['emailClient']; ?></p>
		<p><?php echo $liste_paiement[$i]['valeur']; ?></p>
	<?php } ?>

	<h1>Depot</h1>
	<?php for ($i=0; $i < count($liste_depot) ; $i++) { ?>
		<p><?php echo $liste_depot[$i]['idDepot']; ?></p>
		<p><?php echo $liste_depot[$i]['emailClient']; ?></p>
		<p><?php echo $liste_depot[$i]['valeur']; ?></p>
	<?php } ?>

	<h1>Note</h1>
	<?php for ($i=0; $i < count($liste_note) ; $i++) { ?>
		<p><?php echo $liste_note[$i]['emailClient']; ?></p>
		<p><?php echo $liste_note[$i]['emailPassager']; ?></p>
		<p><?php echo $liste_note[$i]['note']; ?></p>
	<?php } ?>
</body>
</html>