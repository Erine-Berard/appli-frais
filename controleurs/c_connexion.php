<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdpAv = $_REQUEST['mdp'];
		$mdp = md5($mdpAv);
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array($visiteur)){ // Vérifie si le mp et login est correct
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom); // Connect l'utilisateur 
			if ($visiteur['statut'] == 0){ // Si l'utilisateur est un visiteur
				include("vues/v_sommaire.php");
			}
			else { // Si l'utilisateur est un comptable 
				include("vues/v_sommaireComptable.php");
			}
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>