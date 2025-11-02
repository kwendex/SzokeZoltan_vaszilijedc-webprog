<div class="container mt-4">
  <h2>Bejelentkezés</h2>
  <form method="post" action="index.php?page=login">
    <div class="mb-3">
      <label for="username" class="form-label">Felhasználónév</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Felhasználónév">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Jelszó</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó">
    </div>
    <button type="submit" name="login" class="btn btn-primary">Bejelentkezés</button>
  </form>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger mt-3">
      <?php foreach ($errors as $error): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
<div style="color:red">
  <?php if (!empty($errors)) echo implode('<br>', $errors); ?>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'includes/Database.php';
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['username'], $_POST['username']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['username'];
        echo "<p>Sikeres bejelentkezés!</p>";
    } else {
        echo "<p>Hibás adatok!</p>";
    }
}
?>