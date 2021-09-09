<?php 
$chauffeur = null;
  if ($this->session->userdata('chauffeur')==null){
    redirect(site_url());
  }else{
    $chauffeur =  $this->session->userdata('chauffeur');
  }
?>
<style>
    .titre {
        margin-top: 30px;
    }

    .info {
        font-weight: bolder;
    }
</style>
<div style='margin-bottom: 76px;' class='container'>
    <div class='row container-bg justify-content-center' style=''>
        <div class='col-md-6' style="background-color: rgba(251,251,251); padding: 30px; border-radius: 15px; border: 1px solid rgb(251,251,251);">
            <div style='display: flex; justify-content: space-between;' class='titre'>
                <h3>Informations de compte</h3>
                <a href='#' id='bt_modif_compte'><i class='bi bi-pencil-square'></i></a>
            </div>
            <hr style='margin-top: 0;'>
            <div>
                <label>Email : </label>
                <input value='<?php echo $chauffeur['email']; ?>'>
            </div>
            <div>
                <label>Téléphone : </label>
                <input value='<?php echo $chauffeur['numtel']; ?>'>
            </div>
            <div id='personnelles_panel'>
                <div style='display: flex; justify-content: space-between;' class='titre'>
                    <h3>Informations personnelles</h3>
                    <a href='#' id='bt_modif_personnelles'><i class='bi bi-pencil-square'></i></a>
                </div>
                <hr style='margin-top: 0;'>
                <p>Nom : <span class='info'><?php echo $chauffeur['nom']; ?></span></p>
                <p>Prénom : <span class='info'><?php echo $chauffeur['prenom']; ?></span></p>
                <p>Date de naissance : <span class='info'><?php echo $chauffeur['dtn']; ?></span></p>
                <p>Sexe : <span class='info'><?php echo $chauffeur['sexe']; ?></span></p>
                <p>Nationalité : <span class='info'><?php echo $chauffeur['nationalite']; ?></span></p>
            </div>
            <div id="voiture_panel">
                <div style='display: flex; justify-content: space-between;' class='titre'>
                    <h3>Voiture</h3>
                    <a href='#' id='bt_modif_voiture'><i class='bi bi-pencil-square'></i></a>
                </div>
                <hr style='margin-top: 0;'>
                <p>Modèle : <span class='info'><?php echo $chauffeur['modele']; ?></span></p>
                <p>Matricule : <span class='info'><?php echo $chauffeur['matricule']; ?></span></p>
            </div>

            <div style='display: flex; justify-content: space-between;' class='titre'>
                <h3>Informations de paiement</h3>
                <a href='#' id='bt_modif_paiement'><i class='bi bi-pencil-square'></i></a>
            </div>
            <hr style='margin-top: 0;'>
            <label>Numéro de carte : </label>
            <input value='4253*****14'>
            <br>
            <br>
        </div>
    </div>
</div>
<script>
    let bt_modif_voiture = document.getElementById('bt_modif_voiture');
    let voiture_panel = document.getElementById('voiture_panel');

    bt_modif_voiture.addEventListener('click', function(event) {
        event.preventDefault();
        charger_form('<?php echo site_url('fiche_chauffeur_traitement/fiche'); ?>');
    })

    function charger_form(url) {
        httpRequest = new XMLHttpRequest();
        if (httpRequest == null) {
            alert('impossible de creer xmlhttprequest');
        }
        httpRequest.onreadystatechange = afficher_form;
        httpRequest.open('POST', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send();
    }

    function afficher_form() {
        if (httpRequest.readyState == XMLHttpRequest.DONE) {
            if (httpRequest.status == 200) {
                var reponse = httpRequest.responseText;
                voiture_panel.innerHTML = reponse;
                modifierVoiture();
            } else {
                alert('requête impossible');
            }
        }
    }

    function modifierVoiture() {
        var bt = document.getElementById('bt_confirmer_modif_voiture');
        var champ_modele = document.getElementById('champ_modele');
        var champ_matricule = document.getElementById('champ_matricule');

        bt.addEventListener('click', function() {
            requestModifierVoiture('<?php echo site_url('fiche_chauffeur_traitement/modifier') ?>', champ_modele.value, champ_matricule.value);
        });
    }

    function requestModifierVoiture(url, modele, matricule) {
        httpRequest = new XMLHttpRequest();
        if (httpRequest == null) {
            alert('impossible de creer xmlhttprequest');
        }
        httpRequest.onreadystatechange = retourModifVoiture;
        httpRequest.open('POST', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('modele=' + modele + '&matricule=' + matricule);
    }

    function retourModifVoiture() {
        voiture_panel = document.getElementById('voiture_panel');
        if (httpRequest.readyState == XMLHttpRequest.DONE) {
            if (httpRequest.status == 200) {
                var reponse = httpRequest.responseText;
                voiture_panel.innerHTML = reponse;
                voiture_panel = document.getElementById('voiture_panel');
                bt_modif_voiture = document.getElementById('bt_modif_voiture');
                bt_modif_voiture.addEventListener('click', function(event) {
                    event.preventDefault();
                    charger_form('<?php echo site_url('fiche_chauffeur_traitement/fiche'); ?>');
                });
            } else {
                alert('requête impossible');
            }
        }
    }
</script>
<script>
    let bt_modif_personnelles = document.getElementById('bt_modif_personnelles');
    let personnelles_panel = document.getElementById('personnelles_panel');

    bt_modif_personnelles.addEventListener('click', function(event) {
        event.preventDefault();
        vers_modif_personnelle();
    });

    function vers_modif_personnelle() {
        personnelles_panel.innerHTML = "<div>    <div style='display: flex; justify-content: space-between;' class='titre'>        <h3>Informations personnelles</h3>    </div>    <hr style='margin-top: 0;'>    <div style='display: flex;'>        <label style='margin-right: 10px;' class='col-form-label'>Nom : </label>        <input value='Rabesandratana'>    </div>    <div style='display: flex;'>        <label style='margin-right: 10px;' class='col-form-label'>Prénom : </label>        <input value='Eric'>    </div>    <div>        <label style='margin-right: 10px;' class='col-form-label'>Date de naissance : </label>        <div>            <select>                <option>18</option>            </select>            <select>                <option>Février</option>            </select>            <select>                <option>1993</option>            </select>        </div>    </div>    <div>        <label style='margin-right: 10px;' class='col-form-label'>Sexe : </label>        <select>            <option>Homme</option>            <option>Homme</option>            <option>Femme</option>        </select>    </div>    <div>        <label style='margin-right: 10px;' class='col-form-label'>Nationalité</label>        <input value='Malagasy'>    </div>    <button id='confirmer_modif_personnelle' class='btn btn-success'>Confirmer</button></div>"
    }
</script>