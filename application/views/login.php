<style>
    body {
        background-image: url('<?php echo site_url('assets/images/vladimir-proskurovskiy-T5PvaqELSww-unsplash.jpg') ?>');
        background-repeat: no-repeat;
        background-size: contain;
        background-color: lightgray;
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
        <div class="row justify-content-center col-md-8 container-bg" style="margin: auto; background-color: rgba(100, 100, 100, 0.5); ">
            <div class="col-md-12" id="client_panel" style="padding: 0;">
                <a class="col-md-10" id="vers_chauffeur" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                    Se connecter en tant que Chauffeur
                </a>
                <div class="col-md-12">
                    <div class="" style="">
                        <div style="">
                            <form action="">
                                <h2>Client</h2>
                                <div>
                                    <input style="color: white;" id="champ_email_client" type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input style="color: white;" id="champ_mdp_client" type="password" placeholder="Mot de passe" />
                                </div>
                                <div class="d-flex ">
                                    <button id="bt_connect_client">
                                        SE CONNECTER
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="chauffeur_panel" style=" display : none;">
                <a class="col-md-10" id="vers_client" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                    Se connecter en tant que Client
                </a>
                <div class="col-md-12">
                    <div class="" style="">
                        <div style="">
                            <form action="">
                                <h2>Chauffeur</h2>
                                <div>
                                    <input id="champ_email_client" type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input id="champ_mdp_client" type="password" placeholder="Mot de passe" />
                                </div>
                                <div class="d-flex ">
                                    <button id="bt_connect_chauffeur">
                                        SE CONNECTER
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <center><a href="<?php echo site_url('Inscription/index')?>">Pas encore membre ? Inscrivez-vous</a></center>
        </div>
        <p></p>
    </div>
</section>
<script>
    $client_panel = $('#client_panel');
    $vers_chauffeur = $('#vers_chauffeur');
    $chauffeur_panel = $('#chauffeur_panel');
    $vers_client = $('#vers_client');

    $vers_chauffeur.on('click', function (event) {
        event.preventDefault();
        $client_panel.slideToggle();
        $chauffeur_panel.slideToggle();
    });

    $vers_client.on('click', function (event) {
        event.preventDefault();
        $chauffeur_panel.slideToggle();
        $client_panel.slideToggle();
    })
</script>