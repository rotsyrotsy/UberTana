<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($matchReussi)){
        echo $matchReussi;
    } else{ ?>
        <ul>
        <?php for ($i=0; $i<count($propositions); $i++){  ?>
            <form action="<?php echo base_url("ClientController/matchClientChauffeur"); ?>" method="post">
                <li>idChauffeur: <?php echo $propositions[$i]['iddriver']; ?></li>
                <li>Chauffeur: <?php echo $propositions[$i]['nom']; ?></li>
                <li>Prix: <?php echo $propositions[$i]['proposition']; ?> coin</li>
                <input type="hidden" name="idChauffeur" value="<?php echo $propositions[$i]['iddriver']; ?>">
                <input type="hidden" name="idPassager" value="<?php echo $propositions[$i]['idclient']; ?>">
                <input type="hidden" name="iddrivprop" value="<?php echo $propositions[$i]['iddrivprop']; ?>">
                <p><input type="submit" value="match"></p>
            </form>
        <?php } ?>
        </ul>
    <?php } ?>
    
    <script src="<?php echo getJs("jquery.min.js") ?>"></script>
    <script src="<?php echo getJs("angular.min.js") ?>"></script>
</body>
</html>