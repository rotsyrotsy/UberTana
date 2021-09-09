<style>
    body {
        background-image: url('<?php echo site_url('assets/images/mark-cruz-z5QwjwMzPdY-unsplash (2).jpg') ?>');
        background-repeat: no-repeat;
        background-size: 100%;
        background-color: lightgray;
        background-attachment: fixed;
    }
    a {
        color: white;
    }
    h2 {
        color: white;
    }
    label {
        color : gray;
    }
    input {
        color : gray;
    }
    input::placeholder {
        color: white;
        opacity: 1;
    }
</style>
<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container">
        <div class="container-bg col-md-6 justify-content-center" style="margin:auto; background-color: rgba(255,255,255,0.375);">
            <div class="row">
                <div class="" style="margin:auto">
                    <h4 style="text-align: center; margin-top: 10px;">S'inscrire</h4>
                    <form action="<?php echo site_url('ClientController/inscription'); ?>" method="post">
                        <div style="display: flex;">
                            <div class="col-md-6">
                                <input type="text" name="nom" placeholder="Nom" style="font-size: 15px; padding: 4px;" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="prenom" placeholder="Prénom" style="font-size: 15px; padding: 4px;" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="email" name="email" placeholder="Email" style="font-size: 15px; padding: 4px;" />
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="mdp" placeholder="Mot de passe" style="font-size: 15px; padding: 4px;" />
                        </div>
                        <div style="display: flex;">
                            <div style="" class="col-md-2">
                                <label class="col-form-label" style="font-size: 16px; color: black;">+261</label>
                            </div>
                            <div class="col-md-10">
                                <input type="tel" name="numtel" placeholder="Téléphone" style="font-size: 15px; padding: 4px;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <select style="font-size: 15px; padding: 4px; width:100%;" name="sexe">
                                <option value="">Sexe</option>
                                <option value="H">Homme</option>
                                <option value="F">Femme</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <input type="text" name="nationalite" placeholder="Nationalite" style="font-size: 15px; padding: 4px;" />
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Date de Naissance : </label>
                            <div style="display: flex; justify-content: space-between;">
                                <div style="width: 30%;">
                                    <select class="col" style="font-size: 14px; padding: 4px;" name="jour">
                                        <option>Jour</option>
                                        <?php printJourMois(1, 2001); ?>
                                    </select>
                                </div>
                                <div style="width: 30%;">
                                    <select class="col" style="font-size: 14px; padding: 4px;" name="mois">
                                        <option>Mois</option>
                                        <?php printMois(); ?>
                                    </select>
                                </div>
                                <div style="width: 30%;">
                                    <select class="col" style="font-size: 14px; padding: 4px;" name="annee">
                                        <option>Année</option>
                                        <?php printAnnees(1900); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                            <button>
                                S'inscrire
                            </button>
                        </div>
                    </form>
                    <?php if (isset($errorLogin)){ ?>
                        <div class='alert alert-error' role='alert'>
                            <?php echo $errorInscriptionDriver; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>