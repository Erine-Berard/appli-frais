<div id="contenu">
  <h2>Choix fiches de frais</h2>
  <h3>Sélectionnez un visiteur : </h3>
  <form action="index.php?uc=suivreFrais&action=voirFraisVisiteur" method="post">
	  <label for="lstVisiteur" accesskey="n">Visiteur : </label>
    <select id="lstVisiteur" name="lstVisiteur">
      <?php
        foreach ($lesVisiteurs as $unVisiteur)
        {
          $visiteurid = $unVisiteur['id'];
          $nom =  $unVisiteur['nom'];
          $prenom =  $unVisiteur['prenom'];
          ?>
            <option value="<?php echo $visiteurid ?>"><?php echo  $nom." ".$prenom ?> </option>
          <?php 
        }
      ?>      
    </select>
    <input id="ok" type="submit" value="Valider" size="20" />
  </form>

  <h2>Frais de <?php echo $visiteur['nom'].' '.$visiteur['prenom'];?> :</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Mois</th>
        <th scope="col">Dernière modification</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($tabFrais as $frai)
        {
          $mois = $frai['mois'];
          $dateModif =  $frai['dateModif'];
          ?>
            <tr>
              <th scope="row"><?php echo $mois; ?></th>
              <td><?php echo $dateModif; ?></td>
            </tr>
          <?php 
        }
      ?> 
    </tbody>
  </table>
</div>