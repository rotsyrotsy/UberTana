<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container container-bg">
        <div style="position: relative; width: 100%;">
            <h3 style="text-align: center;">Êtes-vous :</h3>
        </div>
      <div class="row">
        <div class="col-md-6 col-lg-6 px-0">
          <form action="<?php echo base_url("ClientController/login"); ?>" method="post">
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
            <div><?php if (isset($errorLogin)){ echo $errorLogin; } ?></div>
          </form>
        </div>
        <div class="col-md-6 col-lg-6 px-0" style="background-color: lightgray;">
          <form action="<?php echo base_url("ChauffeurController/login"); ?>" method="post">
              <h2>Chauffeur</h2>
            <div>
              <input type="email" name="idChauffeur" placeholder="Email" />
            </div>
            <div>
              <input type="password" name="mdp" placeholder="Mot de passe" />
            </div>
            <div class="d-flex ">
              <button>
                SE CONNECTER
              </button>
            </div>
            <div><?php if(isset($errorLoginDriver)){ echo $errorLoginDriver; } ?></div>
          </form>
        </div>
        
      </div>
    </div>
  </section>