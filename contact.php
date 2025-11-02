<div class="container mt-4">
  <h2>Kapcsolatfelvétel</h2>
  <form method="post" action="index.php?page=contact">
    <div class="mb-3">
      <label for="name" class="form-label">Név</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Név">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Üzenet</label>
      <textarea class="form-control" id="message" name="message" rows="3" placeholder="Üzenet"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Küldés</button>
  </form>

  <!-- Cím, telefonszám megjelenítés -->
  <div class="mt-4">
    <p>Cím: Kecskemét, Izsáki út 10, 6000</p>
    <p>Telefon: (06 76) 516 300</p>
  </div>

  <!-- Google-térkép beágyazás ugyanúgy, opcionálisan "ratio" osztállyal -->
  <div class="ratio ratio-16x9 mt-3" style="max-width:600px;">
    <iframe   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6484.406952409542!2d19.668344496425046!3d46.89569146407625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sNeumann%20J%C3%A1nos%20Egyetem%20GAMF%20M%C5%B1szaki%20%C3%A9s%20Informatikai%20Kar!5e0!3m2!1shu!2shu!4v1762088542169!5m2!1shu!2shu"
</div>
<div id="formErrors" class="text-danger mt-2">
<?php if (!empty($errors)) echo implode('<br>', $errors); ?>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Beadandóhoz elég a visszaigazolás
    echo "<p>Köszönjük az üzenetet, hamarosan válaszolunk!</p>";
}
?>
<!-- Egyéb kapcsolati adatok -->
<p>Cím: Kecskemét, Izsáki út 10, 6000</p>
<p>Telefon: (06 76) 516 300</p>
<!-- Google Térkép -->
<iframe
  width="600"
  height="450"
  style="border:0;"
  allowfullscreen=""
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    let errors = [];
    if (!document.querySelector('[name="name"]').value.trim()) errors.push("A név kötelező.");
    if (!document.querySelector('[name="email"]').value.trim()) errors.push("Az e-mail kötelező.");
    if (!document.querySelector('[name="message"]').value.trim()) errors.push("Az üzenet kötelező.");
    if (errors.length) {
        e.preventDefault();
        document.getElementById('formErrors').innerHTML = errors.join('<br>');
    }
});
</script>
