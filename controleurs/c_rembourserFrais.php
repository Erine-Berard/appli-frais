<?php
include("vues/v_sommaireComptable.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'voirTouslesFrais':{
		$lignes = $pdo->getFraisVA();
		include("vues/v_listeFraisVA.php");
		break;
	}
	case 'voirUneFicheDeFrais':{
		//Récupère le mois et l'ID du visiteur de la fiche
			$leMois = $_GET['mois']; 
			$idVisiteur = $_GET['idVisiteur'];
		
		//Hors Forfait
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois); //Retourne toutes les lignes hors forfait

		// Forfait
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois); //Retourne toutes les lignes forfait

		// Information sur la fiche 
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois); //Retourne les infos de la fiche
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);

		//Recupère le mois et l'année 
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);

		include("vues/v_etatFraisVA.php");
		break;
	}
	case 'changerEtat':{
		//Modifie l'etat de la fiche
		$leMois = $_GET['mois']; 
		$idVisiteur = $_GET['idVisiteur'];
		$lignes = $pdo->majEtatFicheFrais($idVisiteur,$leMois,'RB');

		$lignes = $pdo->getFraisVA();
		include("vues/v_listeFraisVA.php");
		break;
	}
}
?>