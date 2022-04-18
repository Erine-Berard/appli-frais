<?php
include("vues/v_sommaireComptable.php");
$action = $_REQUEST['action'];
switch($action){
	case 'selectionVisiteur':{
		$lesVisiteurs = $pdo->getLesVisiteurs();
		$lesMois = $pdo->getLesMois();
		include("vues/v_suivreFrais.php");
		break;
	}
	case 'voirFraisVisiteur':{ 
		//Tableau avec tous les visiteurs 
		$lesVisiteurs = $pdo->getLesVisiteurs();

		//Tableau avec les mois
		$lesMois = $pdo->getLesMois();

		$idVisiteur = $_REQUEST['lstVisiteur'];
		$visiteur = $pdo->getInfosVisiteurId($idVisiteur);
		$nom = $visiteur['nom'];
		$prenom = $visiteur['prenom'];
		$leMois = $_REQUEST['lstMois'];

		//Hors Forfait
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois); //Retourne toutes les lignes hors forfait

		// Forfait
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois); //Retourne toutes les lignes forfait

		// Information sur la fiche 
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois); //Retourne les infos de la fiche
		if($lesInfosFicheFrais != null){
			$libEtat = $lesInfosFicheFrais['libEtat'];
			$montantValide = $lesInfosFicheFrais['montantValide'];
			$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
			$dateModif =  $lesInfosFicheFrais['dateModif'];
			$dateModif =  dateAnglaisVersFrancais($dateModif);
		}
		
		//Recupère le mois et l'année 
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		
		//var_dump($pdo->getLesFraisVisiteur($idVisiteur));
		include("vues/v_suivreFraisVisiteur.php");
		break;
	}
	case 'modification':{
		$leMois = $_REQUEST['leMois'];
		$idVisiteur = $_REQUEST['idVisiteur'];

		$lesFrais = $_REQUEST['lesFrais'];
		if(lesQteFraisValides($lesFrais)){
	  	 	$pdo->majFraisForfait($idVisiteur,$leMois,$lesFrais);
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}

		//Tableau avec tous les visiteurs 
		$lesVisiteurs = $pdo->getLesVisiteurs();

		//Tableau avec les mois
		$lesMois = $pdo->getLesMois();

		//Hors Forfait
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois); //Retourne toutes les lignes hors forfait

		// Forfait
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois); //Retourne toutes les lignes forfait

		// Information sur la fiche 
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois); //Retourne les infos de la fiche
		if($lesInfosFicheFrais != null){
			$libEtat = $lesInfosFicheFrais['libEtat'];
			$montantValide = $lesInfosFicheFrais['montantValide'];
			$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
			$dateModif =  $lesInfosFicheFrais['dateModif'];
			$dateModif =  dateAnglaisVersFrancais($dateModif);
		}

		//Recupère le mois et l'année 
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);

		include("vues/v_suivreFraisVisiteur.php");
	  	break;
	}
	case 'refuserFrais': {
		$leMois = $_REQUEST['mois'];
		$idVisiteur = $_REQUEST['idVisiteur'];

		$pdo->refuserHorsFrais($_REQUEST['idFrais']);


		//Tableau avec tous les visiteurs 
		$lesVisiteurs = $pdo->getLesVisiteurs();

		//Tableau avec les mois
		$lesMois = $pdo->getLesMois();

		//Hors Forfait
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois); //Retourne toutes les lignes hors forfait

		// Forfait
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois); //Retourne toutes les lignes forfait

		// Information sur la fiche 
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois); //Retourne les infos de la fiche
		if($lesInfosFicheFrais != null){
			$libEtat = $lesInfosFicheFrais['libEtat'];
			$montantValide = $lesInfosFicheFrais['montantValide'];
			$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
			$dateModif =  $lesInfosFicheFrais['dateModif'];
			$dateModif =  dateAnglaisVersFrancais($dateModif);
		}

		//Recupère le mois et l'année 
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		include("vues/v_suivreFraisVisiteur.php");
		break; 
	}
	case 'changerEtat':{
		//Modifie l'etat de la fiche
		$leMois = $_GET['mois']; 
		$idVisiteur = $_GET['idVisiteur'];
		$lignes = $pdo->majEtatFicheFrais($idVisiteur,$leMois,'VA');
		
		$lesVisiteurs = $pdo->getLesVisiteurs();
		$lesMois = $pdo->getLesMois();
		include("vues/v_suivreFrais.php");
		break;
	}
	case 'reporterFrais': {
		$leMois = $_REQUEST['mois'];
		$idVisiteur = $_REQUEST['idVisiteur'];

		$pdo->reporterHorsFrais($_REQUEST['idFrais'],$idVisiteur);


		//Tableau avec tous les visiteurs 
		$lesVisiteurs = $pdo->getLesVisiteurs();

		//Tableau avec les mois
		$lesMois = $pdo->getLesMois();

		//Hors Forfait
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois); //Retourne toutes les lignes hors forfait

		// Forfait
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois); //Retourne toutes les lignes forfait

		// Information sur la fiche 
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois); //Retourne les infos de la fiche
		if($lesInfosFicheFrais != null){
			$libEtat = $lesInfosFicheFrais['libEtat'];
			$montantValide = $lesInfosFicheFrais['montantValide'];
			$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
			$dateModif =  $lesInfosFicheFrais['dateModif'];
			$dateModif =  dateAnglaisVersFrancais($dateModif);
		}

		//Recupère le mois et l'année 
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		include("vues/v_suivreFraisVisiteur.php");
		break; 
	}
}
?>