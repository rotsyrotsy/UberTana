<?php
$prix_coin = 1000;
?>
<style>
    .icone {
        height: 40px;
    }

    .payp {
        height: 80px;
    }
</style>
<div class="container">
    <div class="row container-bg justify-content-center">
        <div class="col-md-6"style="background-color: rgba(251,251,251); padding: 30px; border-radius: 15px; border: 1px solid rgb(251,251,251);">
            <?php if(isset($error)){ ?>
            <p class="alert alert-danger"><?php echo $error ?></p>
            <?php }else if(isset($succes)){ ?>
            <p class="alert alert-success"><?php echo $succes ?></p>
            <?php } ?>

            <h2>Achat de coin</h2>

            <form action="<?php echo site_url('ChauffeurController/depot');?>" method="post">

            <div style="display: flex; flex-wrap: nowrap; margin-top: 40px;">
                <label style="margin-right: 10px;" class="col-form-label">Coin : </label>
                <input style="margin-right: 5px;" id="champ_nb_coin" type="number" min="0" value="0" name="valeur">
                <button style="margin-right: 2px;" class="btn btn-danger" id="minus_bt">-</button>
                <button class="btn btn-success" id="plus_bt">+</button>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 45px;">
                <p>Total :</p>
                <p>MGA <span id="prix_total">10.0</span></p>
            </div>
            <hr style="margin-top: 0;">
            <label style="margin-top: 20px;">Moyen de paiement</label>
            <div style="margin-top: 0;">
                <input type="radio" name="moyen">
                <img src="<?php echo site_url('assets/images/visa.png'); ?>" class="icone">
                <img src="<?php echo site_url('assets/images/mastercard.png'); ?>" class="icone">
                <input type="radio" name="moyen">
                <img src="<?php echo site_url('assets/images/paypal.png'); ?>" class="payp">
            </div>

            <fieldset style="border: 2px; border-style: solid; border-color: black; padding: 10px;">
                <legend>Carte de crédit</legend>
                <div>
                    <label class="col-form-label">Numéro de Carte  : </label>
                    <input type="text" name="numero">
                </div>
                <div>
                    <label class="col-form-label">Mot de Passe : </label>
                    <input type="password" name="mdp">
                </div>
            </fieldset>

            <button type="submit" style="margin-top: 40px;" class="btn btn-secondary">Confirmer l'achat</button>
            </form>

            

        </div>
    </div>
</div>
<script>
    // $champ_nb_coin = $('#champ_nb_coin');
    // $bt_plus = $('#plus_bt');
    // $bt_minus = $('#minus_bt');
    // $bt_minus.on('click', (event) => {
    //     event.preventDefault();
    //     $val = $champ_nb_coin.value;
    //     console.log($val);
    // });
    let prix_coin = <?php echo $prix_coin; ?>;
    let champ_nb_coin = document.getElementById('champ_nb_coin');
    let bt_plus = document.getElementById('plus_bt');
    let bt_minus = document.getElementById('minus_bt');
    let prix_total = document.getElementById('prix_total');

    bt_minus.addEventListener('click', function(event) {
        event.preventDefault();
        var val = champ_nb_coin.value;
        var nouvelleValeur = (val * 1 - 1);
        if (nouvelleValeur >= 0) {
            champ_nb_coin.value = nouvelleValeur;
            afficherPrixTotal(nouvelleValeur);
        }
    });
    bt_plus.addEventListener('click', function(event) {
        event.preventDefault();
        var val = champ_nb_coin.value;
        nouvelle = val * 1 + 1;
        champ_nb_coin.value = nouvelle;
        afficherPrixTotal(nouvelle);
    });

    function afficherPrixTotal(nbCoin) {
        prix_total.innerHTML = nbCoin * prix_coin;
    }
</script>