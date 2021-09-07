<?php
  if (!isset($page_admin) || $page_admin == null) {
    $page_admin = 'gestion_admin_accueil';
  }
  // echo $page;
?>
<section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container px-0">
      <div class="heading_container">
        <h2 class="">
          Ge<span>sti</span>on
        </h2>
      </div>

    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-md-5 col-lg-4 px-0" class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chauffeur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Coin</a>
                </li>
                </ul>
                
        </div>
        
        <div class="col-lg-8 col-md-7 px-0">
            <?php include $page_admin.".php"; ?>

            
            
        </div>
        
      </div>
    </div>
  </section>