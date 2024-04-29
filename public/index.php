<?php 
require_once "vendor/autoload.php";
require_once "../framework/autoload.php"; 
require_once "../controllers/MainController.php"; 
require_once "../controllers/ObjectController.php"; 
require_once "../controllers/SearchController.php"; 
require_once "../controllers/SpaceObjectCreateController.php"; 
require_once "../controllers/ObjectTypeController.php"; 
require_once "../controllers/SpaceObjectDeleteController.php"; 
require_once "../controllers/SpaceObjectUpdateController.php"; 
// require_once "../middlewares/LoginRequiredMiddleware.php"; 

require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=outer_space;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/search", SearchController::class);

$router->add("/create", SpaceObjectCreateController::class);
    // ->middleware(new LoginRequiredMiddleware());
$router->add("/space-object/(?P<id>\d+)/edit", SpaceObjectUpdateController::class);
    // ->middleware(new LoginRequiredMiddleware());
$router->add("/space-object/(?P<id>\d+)/(?P<showMode>\w+)", ObjectController::class);
$router->add("/space-object/(?P<id>\d+)", ObjectController::class); 
$router->add("/space-object/(?P<id>\d+)/", ObjectController::class); 
$router->add("/object_types/create", ObjectTypeController::class);
    // ->middleware(new LoginRequiredMiddleware());
$router->add("/space-object/delete", SpaceObjectDeleteController::class);
    // ->middleware(new LoginRequiredMiddleware());

$router->get_or_default(Controller404::class);
