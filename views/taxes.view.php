<h1 class="text-center">Taxes Transporteur</h1>
<?php ?>

<table class="table text-center">
        <tr class="table-dark">
                <th>Nom de taxe</th>
                <th>Valeur taxe</th>
                <th>Transporteur</th>
                <th>Modifier</th>
                <th>Supprimer</th>

        <?php for($i=0; $i < count($taxes);$i++) : ?>
        <tr>
                <td class="align-middle"><a href="<?= URL ?>taxesTransporteur/v/<?= $taxes[$i]->getIdTaxe(); ?>"><?= $taxes[$i]->getNomTaxe(); ?></a></td>
                <td class="align-middle"><?= $taxes[$i]->getValeurTaxe(); ?>
                <td class="align-middle"><?= $taxes[$i]->getNomTransporteur(); ?>
                <td class="align-middle"><a href="<?= URL ?>taxesTransporteur/mt/<?= $taxes[$i]->getIdTaxe(); ?>" class="btn btn-warning">Modifier</a></td>
                <td class="align-middle">
                
                <form method="POST" action="<?= URL ?>taxesTransporteur/st/<?= $taxes[$i]->getIdTaxe(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer la taxe ?');">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
                </td>
        </tr>  
        <?php endfor; ?>
</table>
<a href="<?= URL ?>taxesTransporteur/at" class="btn btn-success d-block">Ajouter</a>