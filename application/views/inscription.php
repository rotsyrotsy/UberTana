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
                    <form action="">
                        <div style="display: flex;">
                            <div class="col-md-6">
                                <input type="text" placeholder="Nom" style="font-size: 15px; padding: 4px; border-color: black;" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Prénom" style="font-size: 15px; padding: 4px; border-color: black;" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="email" placeholder="Email" style="border-color: black;font-size: 15px; padding: 4px;" />
                        </div>
                        <div class="col-md-12">
                            <input type="password" placeholder="Mot de passe" style="border-color: black;font-size: 15px; padding: 4px;" />
                        </div>
                        <div style="display: flex;">
                            <div style="" class="col-md-2">
                                <label class="col-form-label" style="font-size: 16px; color: black;">+261</label>
                            </div>
                            <div class="col-md-10">
                                <input type="tel" placeholder="Téléphone" style="border-color: black;font-size: 15px; padding: 4px;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <select style="border-color: black;font-size: 15px; padding: 4px; width:100%; background-color: rgba(0,0,0,0);">
                                <option>Sexe</option>
                                <option>Homme</option>
                                <option>Femme</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label style="color: black;" class="col-form-label">Date de Naissance : </label>
                            <div style="display: flex; justify-content: space-between;">
                                <div style="width: 30%;">
                                    <select class="col" style="border-color: black; background-color: rgba(0,0,0,0); font-size: 14px; padding: 4px;">
                                        <option>Jour</option>
                                        <?php printJourMois(1, 2001); ?>
                                    </select>
                                </div>
                                <div style="width: 30%;">
                                    <select class="col" style="border-color: black; background-color: rgba(0,0,0,0); font-size: 14px; padding: 4px;">
                                        <option>Mois</option>
                                        <?php printMois(); ?>
                                    </select>
                                </div>
                                <div style="width: 30%;">
                                    <select class="col" style="border-color: black; background-color: rgba(0,0,0,0); font-size: 14px; padding: 4px;">
                                        <option>Année</option>
                                        <?php printAnnees(1900); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex ">
                            <button>
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>