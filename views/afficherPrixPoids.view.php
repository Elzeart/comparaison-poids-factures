<h1 class="text-center">Tarifs : Prix/Poids</h1>
<?php ?>
<form class="form-control" name="select"  method="POST" >
        <label for="idTransporteur">Choisissez Le Transporteur Pour Afficher Les Tarifs :</label>
        <select id="idTransporteur" name="idTransporteur">
                <option selected value="">-- Sélectionnez --</option>;<!--c'est toujours bien de prévoir quand on a rien choisi avant-->
                <?php for($i=0; $i < count($transporteurs);$i++) : ?>                        
                        <option value="<?= $transporteurs[$i]->getIdTransporteur(); ?>"><?= $transporteurs[$i]->getNomTransporteur(); ?></option>
                <?php endfor; ?>
        </select>
        <input type="submit" value="Valider"></input>
</form>
<table class="table text-center">
        <tr class="table-dark">
                <th>Poids</th>
                <th>Prix</th>
                <th>Modifier</th>
                <th>Supprimer</th>
                                        
        <?php for($i=0; $i < count($tarifs); $i++) : ?>

                <tr>
                        <td class="align-middle border"><?= $tarifs[$i]->getValeurPoids(); ?> kg
                        <td class="align-middle border"><?= $tarifs[$i]->getValeurPrix(); ?> €
                        <td class="align-middle border"><a href="<?= URL ?>tarifTransporteur/mt/<?= $tarifs[$i]->getIdPrixPoids(); ?>" class="btn btn-warning">Modifier</a></td>
                        <td class="align-middle border">
                        <form method="POST" action="<?= URL ?>tarifTransporteur/st/<?= $tarifs[$i]->getIdPrixPoids(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le produit ?');">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form> 
                        </td>
                </tr>  
        <?php endfor; ?>
</table>
<a href="<?= URL ?>tarifTransporteur/at" class="btn btn-success d-block">Ajouter</a>