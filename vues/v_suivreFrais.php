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
            <option value="<?php echo $visiteur ?>"><?php echo  $nom." ".$prenom ?> </option>
          <?php 
        }
      ?>      
    </select>
    <input id="ok" type="submit" value="Valider" size="20" />
  </form>
</div>