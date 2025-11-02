<div class="container mt-4">
  <h2>Regisztráció</h2>
  <form method="post" action="index.php?page=register">
    <div class="mb-3">
      <label for="lastname" class="form-label">Vezetéknév</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Vezetéknév">
    </div>

    <div class="mb-3">
      <label for="firstname" class="form-label">Keresztnév</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Keresztnév">
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Felhasználónév</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Felhasználónév">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Jelszó</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó">
    </div>

    <div class="mb-3">
      <label for="password2" class="form-label">Jelszó újra</label>
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Jelszó újra">
    </div>

    <button type="submit" name="reg" class="btn btn-primary">Regisztráció</button>
  </form>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger mt-3">
      <?php foreach ($errors as $error): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
</form>
<div style="color:red">
  <?php if (!empty($errors)): ?>
    <div style="color:red;">
        <?php foreach ($errors as $error): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</div>