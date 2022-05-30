<form method="POST" action="<?= URL ?>taxesTransporteur/atv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nomTaxe">Nom Taxe : </label>
        <input type="text" class="form-control" id="nomTaxe" name="nomTaxe">
    </div>
    <div class="form-group">
        <label for="valeurTaxe">Valeur Taxe : </label>
        <input type="text" class="form-control" id="valeurTaxe" name="valeurTaxe">
    </div>
    <div class="form-group">
        <label for="idTransporteur">Nom transporteur : </label>
        <select class="form-control" name="idTransporteur" id="idTransporteur">
            <option value="">--Choisir le transporteur--</option>
            <?php foreach ($nomTransporteurVsId as $nomTransport) : ?>
                <option value=<?= $nomTransport['idTransporteur'] ?>><?= $nomTransport['nomTransporteur'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>