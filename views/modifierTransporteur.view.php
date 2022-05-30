<form method="POST" action="<?= URL ?>transporteur/mtv" enctype="multipart/form-data">
    <h3>Modifier un transporteur : </h3>
    <div class="form-group">
        <label for="nomTransporteur">Nom Transporteur: </label>
        <input type="text" class="form-control" id="nomTransporteur" name="nomTransporteur" value="<?= $transporteur->getNomTransporteur() ?>">
    </div>
    <div class="form-group">
        <label for="calcul">Calcul : </label>
        <input type="text" class="form-control" id="calcul" name="calcul" value="<?= $transporteur->getCalcul() ?>">
    </div>
    <div class="form-group">
        <label for="colonnePoidsCsv">Colonne Poids Csv: </label>
        <input type="text" class="form-control" id="colonnePoidsCsv" name="colonnePoidsCsv" value="<?= $transporteur->getColonnePoidsCsv() ?>">
    </div>
    <div class="form-group">
        <label for="colonneRefCsv">Colonne Ref Csv : </label>
        <input type="text" class="form-control" id="colonneRefCsv" name="colonneRefCsv" value="<?= $transporteur->getColonneRefCsv() ?>">
    </div>
    <input type="hidden" name="idTransporteur" value="<?= $transporteur->getIdTransporteur(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

