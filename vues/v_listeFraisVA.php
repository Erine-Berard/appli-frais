<div id="contenu">
  <h2>Toutes les demandes validé et mise en payement</h2>
  <?php
    if ($lignes != null){
      echo ' <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nom et Prénom</th>
                  <th scope="col">Date</th>
                  <th scope="col">Voir</th>
                </tr>
              </thead>
              <tbody>';
      foreach ($lignes as $ligne){
        $visiteur = $pdo->getInfosVisiteurId($ligne['idVisiteur']);
        echo '  <tr>
                  <th scope="row">'.$visiteur['nom'].' '.$visiteur['prenom'].'</th>
                  <td>'.getMois2($ligne['mois']).'</td>
                  <td>
                    <a href="index.php?uc=rembourserFrais&action=voirUneFicheDeFrais&mois='.$ligne['mois'].'&idVisiteur='.$ligne['idVisiteur'].'" class="btn btn-outline-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-right white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
                      </svg>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>';
      }
    }
    else {
      echo '<div class="alert alert-warning" role="alert">
              Pas de fiches de frais
            </div>';
    }
  ?>
</div>
  