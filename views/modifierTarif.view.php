<form method="POST" action="<?= URL ?>tarifTransporteur/mtv" enctype="multipart/form-data">
    <h3>Modifier un tarif : </h3>
<!--     <div class="form-group">
        <label for="idPrixPoids">Id Prix Poids : </label> -->
        <input type="hidden" class="form-control" id="idPrixPoids" name="idPrixPoids" value="<?= $tarif->getIdPrixPoids() ?>">
<!--     </div> -->
    <div class="form-group">
        <label for="valeurPoids">Valeur Poids : </label>
        <input type="text" class="form-control" id="valeurPoids" name="valeurPoids" value="<?= $tarif->getValeurPoids() ?>">
    </div>
    <div class="form-group">
        <label for="valeurPrix">Valeur Prix: </label>
        <input type="text" class="form-control" id="valeurPrix" name="valeurPrix" value="<?= $tarif->getValeurPrix() ?>">
    </div>
<!--     <div class="form-group">
        <label for="idTransporteur">Colonne Ref Csv : </label> -->
        <input type="hidden" class="form-control" id="idTransporteur" name="idTransporteur" value="<?= $tarif->getIdTransporteur() ?>">
    <!-- </div> -->
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

