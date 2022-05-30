<h2>Comparer Les Fichiers</h2>
<script>
        var facture = <?= $myFacture ?>; 
        var valeurBase = <?= $myValeurBase ?>; 
        var taxe = <?= $myTaxes ?>; 
        var colonnesPoidsRefCsv = <?= $colonnesPoidsRefCsv ?>; 
</script>

<hr />
<form action="#" method="#">
  <div class="container d-flex">
    <div class="d-flex flex-column">
      <div class="col-8">
        <div id="ship" >
          <label for="numero_transporteur" class="fs-6 fw-normal">Shippingbo</label>
          <input type="file" class="form-control" id="files" name="files" accept=".csv"/>
        </div>
      <div class="col-8">
        <label for="numero_shippingbo" class="fs-6 fw-normal">Choisir numéro commande shippingbo</label>
        <select id="numero_shippingbo" class="form-select" aria-label="Default select example">
          <option>--Choisisez un numéro commande shippingbo--</option>
        </select>
      </div>
          <br/>
      <div class="col-8">
        <label for="poids_shippingbo" class="fs-6 fw-normal">Choisir poids shippingbo</label>
        <select id="poids_shippingbo" class="form-select" aria-label="Default select example">
          <option>--Choisisez un poids shippingbo--</option>
        </select>
          <br />
      </div>
      </div>
</div>
        <div class="d-flex flex-column">
          <div class="col-8">
            <label for="numero_transporteur" class="fs-6 fw-normal"
              >Charger le fichier transporteur</label
            >
            <input
              type="file"
              class="form-control"
              id="files1"
              nme="files1"
              accept=".csv"
            />
            <br />
          </div>
<!--      // Backup menu déroulant JS     
          <div class="col-8">
            <label for="numero_transporteur" class="fs-6 fw-normal"
              >Choisir numéro commande transporteur</label
            >
            <select
              id="numero_transporteur"
              class="form-select"
              aria-label="Default select example"
            >
              <option>--Choisisez un numéro commande transporteur--</option>
            </select>
            <br />
          </div>
          <div class="col-8">
            <label for="poids_transporteur" class="fs-6 fw-normal"
              >Choisir poids transporteur</label
            >
            <select
              id="poids_transporteur"
              class="form-select"
              aria-label="Default select example"
            >
              <option>--Choisisez un poids transporteur--</option>
            </select>
          </div>
 -->
          <div class="col-8 d-flex justify-content-end mt-3">

            <div class="me-2">
            
              <button type="reset" id="reset"  class="btn btn-secondary">Reset</button> <br />
            </div>
            <div>
              <button
                type="submit"
                class="btn btn-outline-success btnaccess fst-italic"
                id="submit"
              >
                valider
              </button>
            </div>
  
          </div>
        </div>

        <!------------------------------------------->
        <div class="card" style="width: 25rem">
          <div class="card-body">
            <h5 class="card-title">Note</h5>
          
            <table id="table2" style="width: 22rem">
                <tbody id="table2_body"></tbody>
              </table>
            
          </div>
          <input type="file" id="files3" nme="files3" accept=".csv" /> <br />
        </div>
        <!------------------------------------------->
      </div>
      <hr />

      <br />
      <br /><br />

      <br />
      
      
      <br />
      <br />


      <article class="match">
        <p id="error">Aucune correspondance trouvée</p>
    </article>
    <article class="match">
      <div id="content">

        
        
        <!--btn telecharger-->
        <div   class="d-flex justify-content-start">
          
          
          
          <div class="me-2">
            
            <button type="submit" class="btn btn-info" id="clearTableau">
              Clear Tableau
            </button>
          </div>
          <div>
            <a href="" id="btn" class="btn btn-primary">Telecharger</a>
            
          </div>
          
          
        </div>
        
    
      <table id="table">
      
        </table>
        
        <section >
          
        <table id="table4">
          <div >
            <h2 >Différences de poids</h2>
          </div>
    
        <thead>
          <tr>
            <th>Numéro de commande</th>
            <th>Poids Shippingbo</th>
            <th>Poids Transporteur</th>
            <th>Différences de poids</th>
            <!-- <th>Calcul de la somme des taxes transporteur</th> -->
            <th>Calcul coût shippingbo-BDD (taxes incluses)</th>
          </tr>
        </thead>
      </table>
      
      <table id="table3">
        <div >
          <h2 >Les poids correspondent</h2>
        </div>
        <thead>
          <tr>
            <th>Numéro de commande</th>
            <th>Poids Shippingbo</th>
            <th>Poids Transporteur</th>
          </tr>
        </thead>
      </table>
    </article>
  </section>
    </div>  
</form>

    
<!-- <form class="form-control text-center" action="" method="post"> -->
        <!-- premier  -->
        <!-- <label class="title">ShippingBo</label>
            <input type="file" id="files" name="files" accept=".csv">
        <label class="title">Choix Autres Fournisseurs</label>
            <input type="file" id="files1" name="files1" accept=".csv"> <br><br>

        <label for="numero_shippingbo" class="label">Choisir numéro commande shippingbo</label><br>
        <select id="numero_shippingbo">
            <option>--Choisisez un numéro commande shippingbo--</option>
        </select>
        <br>

        <label for="poids_shippingbo" class="label">Choisir poids shippingbo</label><br>
        <select id="poids_shippingbo">
            <option>--Choisisez un poids shippingbo--</option>
        </select>
        <br>

        <label for="numero_transporteur" class="label">Choisir numéro commande transporteur</label><br>
        <select id="numero_transporteur">
            <option>--Choisisez un numéro commande transporteur--</option>
        </select> 
        <br>

        <label for="poids_transporteur" class="label">Choisir poids transporteur</label><br>
        <select id="poids_transporteur">
            <option>--Choisisez un poids transporteur--</option>
        </select> 
        
        <br><br>

        <button type="submit" id="submit">VALIDER</button> <br> <br>

        <label class="title">Sélection Du Fichier</label>
            <input type="file" id="files3" name="files3" accept=".csv"><br> <br>

        <table class="table text-center" id="table"></table>
        <table class="table text-center"  id="table2">
            <tbody id="table2_body">
                
            </tbody>
        </table>


        <section >
            <article class="match">
                <p id="error">Aucune correspondance trouvée</p>
            </article>
            <article class="match">
            <table class="table text-center" id="table4">
                    <h2>Différences de poids</h2>
                    <thead>
                        <tr>
                            <th>Numéro de commande</th>
                            <th>Poids Shippingbo</th>
                            <th>Poids Transporteur</th>
                            <th>Différences de poids</th>
                        </tr>
                    </thead>
                </table>
                <table class="table text-center" id="table3">
                    <h2>Les poids correspondent</h2>
                    <thead>
                        <tr>
                            <th>Numéro de commande</th>
                            <th>Poids Shippingbo</th>
                            <th>Poids Transporteur</th>
                        </tr>
                    </thead>
                </table>
            </article>
        </section>

    </form> -->
