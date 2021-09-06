<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container container-bg">
<<<<<<< Updated upstream
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12" id="client">
                <a class="col-md-10" id="vers_chauffeur" href="" style="text-decoration: none; color:cadetblue; margin-left: 10px; margin-top:10px; display: block;">
                    <NOBR>Se connecter en tant que Chauffeur</NOBR>
                </a>
                <div class="" style="border-style: solid;">
                    <div style="border-style:solid;">
                        <form action="">
                            <h2>Client</h2>
                            <div>
                                <input type="email" placeholder="Email" />
                            </div>
                            <div>
                                <input type="password" placeholder="Mot de passe" />
                            </div>
                            <div class="d-flex ">
                                <button>
                                    SE CONNECTER
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
=======
        <div style="position: relative; width: 100%;">
        <br>
            <h3 style="text-align: center;">Êtes-vous :</h3>
        </div>
      <div class="row">
        <div class="col-md-6 col-lg-6 px-0">
          <form action="">
              <h2>Client</h2>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="password" placeholder="Mot de passe" />
            </div>
            <div class="d-flex ">
              <button>
                SE CONNECTER
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-6 col-lg-6 px-0" style="background-color: lightgray;">
          <form action="">
              <h2>Chauffeur</h2>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="password" placeholder="Mot de passe" />
>>>>>>> Stashed changes
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
                    </div>
                </div>
            </div>
            
        </div>
        <a href="inscription">Pas encore membre ? Inscrivez-vous</a>
    </div>
</section>
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