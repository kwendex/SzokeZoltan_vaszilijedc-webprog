<?php
session_start();
if (!isset($_SESSION['user'])) {
    die("Csak bejelentkezett felhasználó tölthet fel képet.");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $target_dir = "uploads/photos/"; // <-- főmappás útvonal!
    $target_file = $target_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        echo "Kép sikeresen feltöltve!<br><a href=\"index.php?page=kepek\">Vissza a galériába</a>";
    } else {
        echo "Hiba a képfeltöltésnél.<br><a href=\"index.php?page=kepek\">Vissza a galériába</a>";
    }
} else {
    header("Location: index.php?page=kepek");
    exit;
}
?>

