<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=home">vaszilijezd.hu</a>
    <ul class="navbar-nav">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Menü">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       <ul class="navbar-nav">

  <li class="nav-item"><a class="nav-link" href="index.php?page=home">Főoldal</a></li>
  
  <?php if (!isset($_SESSION['user'])): ?>
    <li class="nav-item"><a class="nav-link" href="index.php?page=register">Regisztráció</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php?page=login">Belépés</a></li>
  <?php else: ?>
    <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Kilépés</a></li>
  <?php endif; ?>

  <li class="nav-item"><a class="nav-link" href="index.php?page=kepek">Galéria</a></li>
  <li class="nav-item"><a class="nav-link" href="index.php?page=videos">Videók</a></li>
  <li class="nav-item"><a class="nav-link" href="index.php?page=contact">Kapcsolat</a></li>
  <li class="nav-item"><a class="nav-link" href="index.php?page=uzenetek">Üzenetek</a></li>
  <li class="nav-item"><a class="nav-link" href="index.php?page=about">Rólunk</a></li>
</ul>

<?php
if (isset($_SESSION['user'])) {
    echo '<span class="navbar-text text-warning ms-3">Bejelentkezett: '
        . htmlspecialchars($_SESSION['user']['lastname']) . ' '
        . htmlspecialchars($_SESSION['user']['firstname']) . ' ('
        . htmlspecialchars($_SESSION['user']['username']) . ')' . '</span>';
}
?>
      </ul>
    </div>
  </div>
</nav>
<hr>