<h2>Choisir votre transporteur</h2>
<label for="choixTransporteur" class="fs-6 fw-normal">Transporteur :</label>
<form action="<?= URL ?>facturation/c/" method="POST">
        <select
        id="idTransporteur"
        name="idTransporteur"
        class="form-select"
        aria-label="Default select example"
        >
            <?php for($i=0; $i < count($transporteurs);$i++) : ?>
                <option value="<?= $transporteurs[$i]->getIdTransporteur(); ?>"><?= $transporteurs[$i]->getNomTransporteur(); ?></option>
            <?php endfor; ?>
        </select>

        <button type="submit" class="btn btn-outline-success btnaccess fst-italic">Choisir</button>
</form>