<?php 
require_once "vendor/autoload.php";
require_once "../framework/autoload.php"; 
require_once "../controllers/MainController.php"; 
require_once "../controllers/ObjectController.php"; 

require_once "../controllers/volcanoController.php";
require_once "../controllers/volcanoImageController.php";
require_once "../controllers/volcanoInfoController.php"; 
require_once "../controllers/PompeiiController.php";
require_once "../controllers/PompeiiImageController.php";
require_once "../controllers/PompeiiInfoController.php"; 
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=outer_space;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/volcano", volcanoController::class);
$router->add("/space-object/(?P<id>\d+)", ObjectController::class); 

$router->get_or_default(Controller404::class);