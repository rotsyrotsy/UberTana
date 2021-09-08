<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container">
        <div class="row justify-content-center col-md-8 container-bg" style="margin: auto;">
            <div class="col-md-12" id="client_panel" style="">
                <a class="col-md-10" id="vers_chauffeur" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                    <NOBR>Guide d'utilisation d'UberTana en tant que Chauffeur</NOBR>
                </a>
                <div class="col-md-12">
                    <h1>Chauffeur</h1>
                    <ul>
                        <li>Envoyer vos coordonnées avec l'aide de la carte </li>
                        <li>Vous recevez ensuite la liste des potentiels passagers qui sont à votre proximité (rayon de 1 kilomètre)</li>
                        <li>Vous proposez ensuite vos prix (en coin) aux passagers auxquels vous souhaitez emmener</li>
                        <li>Vous attendez la confirmation de votre client (Match)</li>
                        <li>Lorsqu' un client accepte votre offre, vous payez le prix d'un match et vous pouvez allez récupérer votre Client </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-12" id="chauffeur_panel" style=" display : none;">
                <a class="col-md-10" id="vers_client" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                    <NOBR>Guide d'utilisation d'UberTana en tant que Client</NOBR>
                </a>
                <div class="col-md-12">
                    <div class="" style="">
                    <h1>Client</h1>
                    <ul>
                        <li>Envoyer vos coordonnées actuelles et vos coordonées de destination avec l'aide de la carte </li>
                        <li>Vous attendez la réponse d'un chauffeur à proximité et il vous propose son prix</li>
                        <li>Vous choisissez ensuite le chauffeur qui vous convient</li>
                        <li>Vous attendez l'arrivée de votre chauffeur</li>
                        <li>Lorsqu' un client accepte votre offre, vous payez le prix d'un match et vous pouvez allez récupérer votre Client </li>
                    </ul>
                    </div>
                </div>
            </div>
            
          </form>
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