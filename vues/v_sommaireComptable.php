<!-- Division pour le sommaire -->
<div id="menuGauche">
   <div id="infosUtil">
      <h2>
      </h2>
   </div>  
   <ul id="menuList">
		<li >
			Comptable :<br>
			<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
		</li>
      <li class="smenu">
         <a href="index.php?uc=suivreFrais&action=selectionVisiteur" title="Suivre une fiche de frais">Suivre une fiche de frais</a>
      </li>
      <li class="smenu">
         <a href="index.php?uc=rembourserFrais&action=voirTouslesFrais" title="Consultation de mes fiches de frais">Rembourser fiches de frais</a>
      </li>
 	   <li class="smenu">
         <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
      </li>
   </ul>
</div>
    