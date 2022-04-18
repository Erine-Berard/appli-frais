<div id="contenu">
  <h2>Choix fiches de frais</h2>
  <h3>Sélectionnez un visiteur : </h3>
  <form action="index.php?uc=suivreFrais&action=voirFraisVisiteur" method="post">
	  <label for="lstVisiteur" accesskey="n">Visiteur : </label>
    <select id="lstVisiteur" name="lstVisiteur">
      <?php
        foreach ($lesVisiteurs as $unVisiteur)
        {
          $visiteur = $unVisiteur['id'];
          $nom =  $unVisiteur['nom'];
          $prenom =  $unVisiteur['prenom'];
          ?>
            <option value="<?php echo $visiteur; ?>"><?php echo  $nom." ".$prenom ;?> </option>
          <?php 
        }
      ?>      
    </select>
    <label for="lstMois" accesskey="n">Mois : </label>
    <select id="lstMois" name="lstMois">
      <?php 
        
        foreach ($lesMois as $unMois)
        {
          
          ?>
            <option selected value="<?php echo $unMois; ?>"><?php echo getMois2($unMois); ?> </option>
          <?php 
        }  
      ?>    
    </select>
    <input id="ok" type="submit" value="Valider" size="20" />
  </form>

  <?php
    if($lesInfosFicheFrais != null && $libEtat == 'Saisie clôturée'){
  ?>
  <h3>Fiche de frais de <?php echo $nom." ".$prenom;?> du <?php echo $numMois."-".$numAnnee;?> :</h3>
  <form method="POST"  action="index.php?uc=suivreFrais&action=modification&idVisiteur=<?php echo $idVisiteur;?>&leMois=<?php echo $leMois;?>">
    <div class="corpsForm">
      <fieldset>
        <legend>Eléments forfaitisés</legend>
        <?php
          foreach ($lesFraisForfait as $unFrais)
          {
            $idFrais = $unFrais['idfrais'];
            $libelle = $unFrais['libelle'];
            $quantite = $unFrais['quantite'];
        ?>
        <p>
          <label for="idFrais"><?php echo $libelle ?></label>
          <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
        </p>
        <?php
          }
        ?>
      </fieldset>
    </div>
    <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
    </div>
  </form>
  <table class="listeLegere">
  	<caption>Descriptif des éléments hors forfait</caption>
    <tr>
      <th class="date">Date</th>
			<th class="libelle">Libellé</th>  
      <th class="montant">Montant</th>  
      <th class="action">&nbsp;</th>   
      <th class="action">&nbsp;</th>           
    </tr>
    <?php    
      foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
      {
        $libelle = $unFraisHorsForfait['libelle'];
        $date = $unFraisHorsForfait['date'];
        $montant=$unFraisHorsForfait['montant'];
        $id = $unFraisHorsForfait['id'];
    ?>		
    <tr>
      <td> <?php echo $date ?></td>
      <td><?php echo $libelle ?></td>
      <td><?php echo $montant ?></td>
      <td>
        <a href="index.php?uc=suivreFrais&action=refuserFrais&idFrais=<?php echo $id ?>&mois=<?php echo $leMois ?>&idVisiteur=<?php echo $idVisiteur ?>" 
  	       onclick="return confirm('Voulez-vous vraiment refuser ce frais?');">
           Refuser ce frais
        </a>
      </td>
      <td>
        <a href="index.php?uc=suivreFrais&action=reporterFrais&idFrais=<?php echo $id ?>&mois=<?php echo $leMois ?>&idVisiteur=<?php echo $idVisiteur ?>" 
  	       onclick="return confirm('Voulez-vous vraiment reporter ce frais?');">
           Reporter ce frais
        </a>
      </td>
    </tr>
	  <?php		 
      }
	  ?>	  
  </table>
  <div class="d-flex justify-content-end">
    <?php
      echo '<a 
              href="index.php?uc=suivreFrais&action=changerEtat&mois='.$leMois.'&idVisiteur='.$idVisiteur.'" 
              class="m-2 btn btn-outline-secondary ">
                Valider
            </a>';
    ?>
  </div>
  <?php
    }
    else{
  ?>
    <div class="alert alert-warning" role="alert">
      Pas de fiche de frais pour ce visiteur ce mois
    </div>
  <?php
    }
  ?>
</div>