
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
	<h1>Passager</h1>
	<?php for ($i=0; $i < count($liste_passager) ; $i++) { ?>
		<p><?php echo $liste_passager[$i]['email']; ?></p>
		<p><?php echo $liste_passager[$i]['nom']; ?></p>
		<p><?php echo $liste_passager[$i]['mdp']; ?></p>
	<?php } ?>


</body>
</html>