<?php
class LoginController {
    private $db;
    public $errors = [];
    public function __construct($db) { $this->db = $db; }
    public function index() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username=?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user || !password_verify($password, $user['password'])) {
                $errors[] = "Hibás felhasználónév vagy jelszó!";
            } else {
                $_SESSION['user'] = [
    'firstname' => $user['firstname'],
    'lastname'  => $user['lastname'],
    'username'  => $user['username']
];
                header("Location: index.php?page=home");
                exit;
            }
        }
    }
}
?>