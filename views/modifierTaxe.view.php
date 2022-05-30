<form method="POST" action="<?= URL ?>taxesTransporteur/mtv" enctype="multipart/form-data">
    <h3>Modifier une Taxe : </h3>
    <div class="form-group">
        <label for="nomTaxe">Nom Taxe : </label>
        <input type="text" class="form-control" id="nomTaxe" name="nomTaxe" value="<?= $taxe->getNomTaxe() ?>">
    </div>
    <div class="form-group">
        <label for="valeurTaxe">Valeur : </label>
        <input type="text" class="form-control" id="valeurTaxe" name="valeurTaxe" value="<?= $taxe->getValeurTaxe() ?>">
    </div>
    <div class="form-group">
        <label for="nomTransporteur">Transporteur : </label>
        <input type="text" class="form-control" disabled="disabled" id="nomTransporteur" name="nomTransporteur" value="<?= $taxe->getNomTransporteur() ?>">
    </div>
    <input type="hidden" name="idTaxe" value="<?= $taxe->getIdTaxe(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

