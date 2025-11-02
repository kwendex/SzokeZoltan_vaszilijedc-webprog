<?php
class ContactController {
    private $db;
    public $errors = [];

    public function __construct($db){
        $this->db = $db;
    }

    public function index() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
            // Bemenő mezők
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');

            // Szerveroldali validáció
            if ($name === '') $errors[] = "A név kötelező!";
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Érvénytelen e-mail cím!";
            if ($message === '') $errors[] = "Az üzenet mező kötelező!";

            if (empty($errors)) {
                // Adatbázisba mentés
                $stmt = $this->db->prepare('INSERT INTO messages (name, email, message, sent_at) VALUES (?, ?, ?, NOW())');
                $stmt->execute([$name, $email, $message]);
                // Session-be mentjük az adatokat, hogy az uzenet_kuldve oldalon megjelenhessen
                $_SESSION['last_contact'] = compact('name', 'email', 'message');
                header('Location: index.php?page=uzenet_kuldve');
                exit;
            }
        }
        // Itt hívd meg a nézetet, hibák átadásával:
    }
}
?>