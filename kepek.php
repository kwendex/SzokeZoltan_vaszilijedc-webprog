<h2>Képgaléria</h2>
<?php
// Képek listázása
$files = glob("uploads/photos/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
foreach ($files as $file) {
    echo "<img src='$file' class='img-fluid'>";
}
?>

<?php if (isset($_SESSION['user'])): ?>
    <div class="container mt-4">
  <h2>Képgaléria</h2>
  <div class="row">
    <?php
    $files = glob("uploads/photos/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
    foreach ($files as $file) {
      echo '<div class="col-md-4 col-lg-3 mb-4">';
      echo "<img src='$file' class='img-fluid rounded shadow-sm' alt='Galéria kép'>";
      echo '</div>';
    }
    ?>
  </div>

  <?php if (isset($_SESSION['user'])): ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data" class="mt-3">
      <div class="mb-3">
        <input type="file" class="form-control" name="image" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Kép feltöltése</button>
    </form>
  <?php endif; ?>
</div>
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="image" accept="image/*" required>
  <button type="submit">Kép feltöltése</button>
</form>
<?php endif; ?>