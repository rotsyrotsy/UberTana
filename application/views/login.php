<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container container-bg">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12" id="client">
                <a class="col-md-10" id="vers_chauffeur" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                <br>    
                <NOBR>Se connecter en tant que Chauffeur</NOBR>
                </a>
                <div class="" style="border-style: solid;">
                    <div style="border-style:solid;">
                        <form action="<?php echo base_url("ClientController/index"); ?>" method="post">
                            <h2>Client</h2>
                            <div>
                                <input id="champ_email_client" name="idPassager" type="email" placeholder="Email" />
                            </div>
                            <div>
                                <input id="champ_mdp_client" name="mdp" type="password" placeholder="Mot de passe" />
                            </div>
                            <div class="d-flex ">
                                <button id="bt_connect_client">
                                    SE CONNECTER
                                </button>
                            </div>
                        </form>
                        <div><?php if (isset($errorLogin)){ echo $errorLogin; } ?></div>
                    </div>
                </div>



        <!-- <div style="position: relative; width: 100%;">
            <h3 style="text-align: center;">Êtes-vous :</h3>
        </div>
      <div class="row">
        <div class="col-md-6 col-lg-6 px-0">
          <form action="" method="post">
              <h2>Client</h2>
            <div>
              <input type="email" name="idPassager" placeholder="Email" />
            </div>
            <div>
              <input type="password" name="mdp" placeholder="Mot de passe" />
            </div>
            <div class="d-flex ">
              <button>
                SE CONNECTER
              </button>
            </div>
            
          </form>
        </div>
        <div class="col-md-6 col-lg-6 px-0" style="background-color: lightgray;">
          <form action="<?php echo base_url("ChauffeurController/index"); ?>" method="post">
              <h2>Chauffeur</h2>
            <div>
              <input type="email" name="idChauffeur" placeholder="Email" />
            </div>
            <div>
              <input type="password" name="mdp" placeholder="Mot de passe" />
            </div>
            <div class="col-md-8 col-sm-12" id="chauffeur" style="display: none;">
                <a class="col-md-10" id="vers_client" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                    <NOBR>Se connecter en tant que Client</NOBR>
                </a>
                <div class="" style="border-style: solid;">
                    <div style="border-style:solid;">
                        <form action="">
                            <h2>Chauffeur</h2>
                            <div>
                                <input type="email" placeholder="Email" />
                            </div>
                            <div>
                                <input type="password" placeholder="Mot de passe" />
                            </div>
                            <div class="d-flex ">
                                <button>
                                    <NOBR>SE CONNECTER</NOBR>
                                </button>
                            </div>
                        </form>
                        <div><?php if(isset($errorLoginDriver)){ echo $errorLoginDriver; } ?></div>
                    </div>
                </div>
            </div> -->
            
        </div>
        <a href="<?php echo site_url('Accueil/inscription'); ?>">Pas encore membre ? Inscrivez-vous</a>
    </div>
</section>
<script>
    var httprequest = null;
    var email_client = document.getElementById('champ_email_client');
    var mdp_client = document.getElementById('champ_mdp_client');
    var bt_client = document.getElementById('bt_connect_client');

    bt_client.addEventListener('click', function() {
        connectClient('TraitementLogin',email_client.value,mdp_client.value);
    });

    function connectClient (url, email, mdp) {
            httpRequest = new XMLHttpRequest();
            if (httpRequest == null) {
                alert('impossible de creer xmlhttprequest');
            }
            httpRequest.onreadystatechange = retour_connect_client;
            httpRequest.open('POST', url);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send('email=' + encodeURIComponent(email)+"&mdp="+encodeURIComponent(mdp));
            // console.log(cle);
        }

        function retour_connect_client () {
            if (httpRequest.readyState == XMLHttpRequest.DONE) {
                if (httpRequest.status == 200) {
                    var reponse = JSON.parse(httpRequest.responseText);
                    alert (reponse.retour+'\n'+reponse.utilisateur+'\n'+reponse.mdp);
                    // retour.innerHTML += '<p>'+reponse.retour+'</p>';
                } else {
                    alert ('requête impossible');
                }
            }
        }
</script>
<script>
    $client_panel = $('#client');
    $chauffeur_panel = $('#chauffeur');
    $vers_chauffeur = $('#vers_chauffeur');
    $vers_client = $('#vers_client');

    // $vers_chauffeur.on('click', function(event) {
    //     // $vers_chauffeur.hide();
    //     event.preventDefault();
    //     $client_panel.animate({
    //         width: 'hide'
    //     }, function() {
    //         $chauffeur_panel.animate({
    //             width: 'show'
    //         }, function() {
    //             // $vers_client.show();
    //         });
    //     });
    // });
    // $vers_client.on('click', function(event) {
    //     // $vers_client.hide();
    //     event.preventDefault();
    //     $chauffeur_panel.animate({
    //         width: 'hide'
    //     }, function() {
    //         $client_panel.animate({
    //             width: 'show'
    //         }, function() {
    //             // $vers_chauffeur.show();
    //         });
    //     });
    // });

    // $(this).show("slide", { direction: "left" }, 1000);
</script>