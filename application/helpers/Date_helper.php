<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    function printJourMois ($mois, $annee) {
        $nbJour = nbJMois($mois, $annee);
        for ($i=1; $i<=$nbJour; $i++) {
            echo "<option value='".$i."'>".$i."</option>";
        }
    }

    function printMois () {
        $mois = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Août',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre'
        ];
        for ($i=0; $i<count($mois); $i++) {
            echo "<option value='".($i+1)."'>".$mois[$i]."</option>";
        }
    }

    function printAnnees ($min) {
        for ($i=date('Y')-1; $i>=$min; $i--) {
            echo "<option value='".$i."'>".$i."</option>";
        }
    }

    function nbJMois ($mois, $annee) {
        switch ($mois) {
            case 1: return 31;
            case 2: return $annee%4==0?29:28;
            case 3: return 31;
            case 4: return 30;
            case 5: return 31;
            case 6: return 30;
            case 7: return 31;
            case 8: return 31;
            case 9: return 30;
            case 10: return 31;
            case 11: return 30;
            case 12: return 31;
        }
        return 30;
    }
?>