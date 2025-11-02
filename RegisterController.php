<?php
class RegisterController {
    private $db;
    public $errors = [];
    public function __construct($db) { $this->db = $db; }
    public function index() {
         $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg'])) {
    $lastname = trim($_POST['lastname'] ?? '');
    $firstname = trim($_POST['firstname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

        if (empty($errors)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users (lastname, firstname, username, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$lastname, $firstname, $username, $email, $hash]);

            // SIKERES REGISZTRÁCIÓ - IDE ALSÓ KÓDOT ILLESZD BE:
            header("Location: index.php?page=login");
            exit;
        } else {
            // Ha hibák vannak, azok itt megvannak a $errors tömbben
            // Ezeket a view fogja megjeleníteni (lásd alább)
        }
    }
    }
}
?>
