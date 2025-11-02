<?php
require_once 'config.php';
require_once __DIR__ . '/includes/Database.php';

include 'includes/header.php';

$db = Database::getInstance()->getConnection();
//


$pages = [
    'home' => [
        'controller' => 'HomeController',
        'view' => 'home.php'
    ],
    'about' => [
        'controller' => 'AboutController',
        'view' => 'about.php'
    ],
    'videos' => [
        'controller' => 'VideosController',
        'view' => 'videos.php'
    ],
    'register' => [
        'controller' => 'RegisterController',
        'view' => 'register.php'
    ],
    'login' => [
        'controller' => 'LoginController',
        'view' => 'login.php'
    ],
    'logout' => [
    'controller' => 'LogoutController',
    'view' => 'home.php'
],
    'upload' => [
        'controller' => 'UploadController',
        'view' => 'upload.php'
    ],
    'contact' => [
        'controller' => 'ContactController',
        'view' => 'contact.php'
    ],
    'kepek' => [
        'controller' => 'KepekController',
        'view' => 'kepek.php'
    ],
    'uzenetek' => [
        'controller' => 'UzenetekController',
        'view' => 'uzenetek.php'
]
];

// Aktuális oldal eldöntése (= ha nincs paraméter vagy hibás, akkor a home jelenik meg!)
$page = isset($_GET['page']) && array_key_exists($_GET['page'], $pages) ? $_GET['page'] : 'home';

$controllerName = $pages[$page]['controller'];
$viewFile = $pages[$page]['view'];

$controllerPath = __DIR__ . '/controllers/' . $controllerName . '.php';
$viewPath = __DIR__ . '/views/' . $viewFile;

// Controller betöltése (ha létezik)
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    if (class_exists($controllerName)) {
        $controller = new $controllerName($db);
        if (method_exists($controller, 'index')) {
            $controller->index();
        }
    }
}

// Nézet (view) betöltése (ha létezik)
if (file_exists($viewPath)) {
    include $viewPath;
} else {
    echo 'A nézet fájl nem található: ' . htmlspecialchars($viewPath);
}
?>
<?php include 'includes/footer.php'; ?>