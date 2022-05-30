<h1 class="text-center">Gestion des transporteurs</h1>
<?php ?>

<table class="table text-center">
        <tr class="table-dark">
                <th>Nom du transporteur</th>
                <th>Calcul</th>
                <th>Colonne Poids Csv</th>
                <th>Colonne Ref Csv</th>
                <th>Modifier</th>
                <th>Supprimer</th>

        <?php for($i=0; $i < count($transporteurs);$i++) : ?>
        <tr>
                <td class="align-middle"><a href="<?= URL ?>transporteur/v/<?= $transporteurs[$i]->getIdTransporteur(); ?>"><?= $transporteurs[$i]->getNomTransporteur(); ?></a></td>
                <td class="align-middle"><?= $transporteurs[$i]->getCalcul(); ?>
                <td class="align-middle"><?= $transporteurs[$i]->getColonnePoidsCsv(); ?>
                <td class="align-middle"><?= $transporteurs[$i]->getColonneRefCsv(); ?>
                <td class="align-middle"><a href="<?= URL ?>transporteur/mt/<?= $transporteurs[$i]->getIdTransporteur(); ?>" class="btn btn-warning">Modifier</a></td>
                <td class="align-middle">
                <form method="POST" action="<?= URL ?>transporteur/st/<?= $transporteurs[$i]->getIdTransporteur(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le produit ?');">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form> 
                </td>
        </tr>  
        <?php endfor; ?>
</table>
<a href="<?= URL ?>transporteur/at" class="btn btn-success d-block">Ajouter</a>




