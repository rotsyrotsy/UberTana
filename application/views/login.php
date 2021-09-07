<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container">
        <div class="row justify-content-center col-md-8 container-bg" style="margin: auto;">
            <div class="col-md-12" id="client_panel" style="">
                <a class="col-md-10" id="vers_chauffeur" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                    <NOBR>Se connecter en tant que Chauffeur</NOBR>
                </a>
                <div class="col-md-8">
                    <div class="" style="">
                        <div style="">
                            <form action="">
                                <h2>Client</h2>
                                <div>
                                    <input id="champ_email_client" type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input id="champ_mdp_client" type="password" placeholder="Mot de passe" />
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
                    <NOBR>Se connecter en tant que Client</NOBR>
                </a>
                <div class="col-md-8">
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
                                    <button id="bt_connect_client">
                                        SE CONNECTER
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        <a href="inscription">Pas encore membre ? Inscrivez-vous</a>
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