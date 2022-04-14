<?php
include("vues/v_sommaireComptable.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'selectionVisiteur':{
		$lesVisiteurs = $pdo->getLesVisiteurs();
		include("vues/v_suivreFrais.php");
		break;
	}
	case 'voirFraisVisiteur':{
		//Tableau avec tous les visiteurs 
		$lesVisiteurs = $pdo->getLesVisiteurs();

		//Tableau avec les informations sur un visiteur 
		$idVisiteur = $_REQUEST['lstVisiteur'];
		$visiteur = $pdo->getInfosVisiteurId($idVisiteur);

		//Tableau avec tous les frais validé et mis en payement d'un visiteur 
		$frais = $pdo->getLesFraisVisiteur($idVisiteur);
		$tabFrais = array(); 
		foreach ($frais as $frai)
        {
			$mois = $frai['mois'];
			$dateModif =  $frai['dateModif'];
			$tabFrai = array(
				'mois' => getMois2($mois),
				'dateModif' => $dateModif,
			);
		  	array_push($tabFrais, $tabFrai);
		}

		//var_dump($pdo->getLesFraisVisiteur($idVisiteur));
		include("vues/v_suivreFraisVisiteur.php");
	}
}
?>