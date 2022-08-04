<form method="POST" name="idTransporteur" action="<?= URL ?>tarifsTransporteur/atv" enctype="multipart/form-data">
    <select name="idTransporteur">
<!--         <option value="1">GLS</option>
        <option value="2">DHL</option>
        <option value="3">CHRONOPOST</option> -->
        <?php for($i=0; $i < count($transporteurs);$i++) : ?>                        
            <option value="<?= $transporteurs[$i]->getIdTransporteur(); ?>"><?= $transporteurs[$i]->getNomTransporteur(); ?></option>
        <?php endfor; ?>
    </select>
    <div class="form-group">
        <label for="valeurPoids">Valeur Poids : </label>
        <input type="text" class="form-control" id="valeurPoids" name="valeurPoids">
    </div>
    <div class="form-group">
        <label for="valeurPrix">Valeur Prix : </label>
        <input type="text" class="form-control" id="valeurPrix" name="valeurPrix">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>

</form>