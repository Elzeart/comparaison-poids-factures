<form method="POST" action="<?= URL ?>transporteur/atv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nomTransporteur">Nom Transporteur : </label>
        <input type="text" class="form-control" id="nomTransporteur" name="nomTransporteur">
    </div>
    <div class="form-group">
        <label for="calcul">Calcul : </label>
        <input type="text" class="form-control" id="calcul" name="calcul">
    </div>
    <div class="form-group">
        <label for="colonnePoidsCsv"> Colonne Poids Csv: </label>
        <input type="text" class="form-control" id="colonnePoidsCsv" name="colonnePoidsCsv">
    </div>
    <div class="form-group">
        <label for="colonneRefCsv">Colonne Ref Csv : </label>
        <input type="text" class="form-control" id="colonneRefCsv" name="colonneRefCsv">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>