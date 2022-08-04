<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!--<> ON VERIFIE SI L'UTILISATEUR EST CONNECTE POUR L'AFFICHAGE DES PAGES <>--->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= URL ?>facturation/">Comparer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= URL ?>transporteurs">Gestion des transporteurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= URL ?>taxesTransporteur">Taxes transporteur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= URL ?>tarifsTransporteur">Tarifs transporteurs</a>
            </li>
        </ul>
      </ul>
    </div>
  </div>
</nav>

<style>
nav{
  width: 85%;
  height:5em;
  margin-top: 2em;
}


</style>