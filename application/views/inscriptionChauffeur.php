<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container">
        <div class="container-bg col-md-6 justify-content-center" style="margin:auto;">
            <div class="row">
                <div class="" style="margin:auto">
                    <h4 style="text-align: center; margin-top: 10px;">S'inscrire</h4>
                    <form action="<?php echo site_url('ChauffeurController/inscription'); ?>" method="post">
                        <div style="display: flex;">
                            <div class="col-md-6">
                                <input type="text" placeholder="Nom" name="nom" style="font-size: 15px; padding: 4px;" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Prénom" name="prenom" style="font-size: 15px; padding: 4px;" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="email" placeholder="Email" name="email" style="font-size: 15px; padding: 4px;" />
                        </div>
                        <div class="col-md-12">
                            <input type="password" placeholder="Mot de passe" name="mdp" style="font-size: 15px; padding: 4px;" />
                        </div>
                        <div style="display: flex;">
                            <div style="" class="col-md-2">
                                <label class="col-form-label" style="font-size: 16px;">+261</label>
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
                        </br>
                        <h4 style="text-align: center; margin-top: 10px;">Les coordonnées de votre voiture</h4>
                            <div class="col-md-12">
                                <input type="text" placeholder="Modèle" name="modele" style="font-size: 15px; padding: 4px;" />
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Immatriculation" name="matricule" style="font-size: 15px; padding: 4px;" />
                            </div>
                        <div class="d-flex ">
                            <button>
                                S'inscrire
                            </button>
                        </div>
                    </form>
                    <?php if (isset($errorInscriptionDriver)){ ?>
                        <div class='alert alert-error' role='alert'>
                            <?php echo $errorInscriptionDriver; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>