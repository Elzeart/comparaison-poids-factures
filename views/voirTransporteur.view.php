<?php 

//---<> PAGE D'AFFICHAGE D'UN TRANSPORTEUR <>---//

?>
<div class="row">
    <div class="col-6">
    <table class="table text-center"> 
            <td><p>Nom Du Transporteur : <?= $transporteur->getNomTransporteur(); ?></p></td>
            <td><p>Calcul : <?= $transporteur->getCalcul(); ?></p></td>
            <td><p>Colonnes Poids Csv : <?= $transporteur->getColonnePoidsCsv(); ?></p></td>
            <td><p>Colonnes Poids Csv: <?= $transporteur->getColonneRefCsv(); ?></p></td>
    </table>
    </div>
</div>

<?php

?>