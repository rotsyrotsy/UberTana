<?php
defined('BASEPATH') or exit('No direct script access allowed');
//require_once('Base_Controller.php');
class fiche_chauffeur_traitement extends CI_Controller
{
    public function fiche()
    {
?>
        <div id="voiture_panel">
            <div style='display: flex; justify-content: space-between;' class='titre'>
                <h3>Voiture</h3>
            </div>
            <hr style='margin-top: 0;'>
            <div>
                <label class="col-form-label" style="margin-right: 10px;">Modèle : </label>
                <input id="champ_modele" value="Ford K">
            </div>
            <div>
                <label class="col-form-label" style="margin-right: 10px;">Matricule : </label>
                <input id="champ_matricule" value="4556 TV">
            </div>
            <button id="bt_confirmer_modif_voiture" class="btn btn-success">Modifier</button>
        </div>
    <?php
    }

    public function modifier()
    {
        $modele = $_POST['modele'];
        $matricule = $_POST['matricule'];

    ?>
        <div id="voiture_panel">
            <div style='display: flex; justify-content: space-between;' class='titre'>
                <h3>Voiture</h3>
                <a href='#' id='bt_modif_voiture'><i class='bi bi-pencil-square'></i></a>
            </div>
            <hr style='margin-top: 0;'>
            <p>Modèle : <span class='info'>Ford K</span></p>
            <p>Matricule : <span class='info'>4556 TV</span></p>
        </div>
<?php
    }
}
?>