<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <!-- <img src="<?= URL; ?>public/first.jpg" width="120" alt="logo du site" /> -->
      <!-- <span class="ms-5 fs-4">D&D</span> -->
    </a>

    <?php require_once "views/common/menu.php"; ?>
  </header>
</div>

<style>
  *{
    margin:0;
    padding:0;
  }

  .container{
    display:flex;
    flex-direction: column;
  }

</style>