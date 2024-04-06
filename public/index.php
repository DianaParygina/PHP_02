<?php 
require_once "vendor/autoload.php";
require_once "../controllers/MainController.php"; 
require_once "../controllers/volcanoController.php";
require_once "../controllers/volcanoImageController.php";
require_once "../controllers/volcanoInfoController.php"; 
require_once "../controllers/PompeiiController.php";
require_once "../controllers/PompeiiImageController.php";
require_once "../controllers/PompeiiInfoController.php"; 
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER['REQUEST_URI'];

$title = "";
$template = "";

$menu['menu_items'] = [
    [
        "title" => "Главная",
        "url_title" => "/",
    ],
    [
        "title" => "Вулкан",
        "url_title" => "/volcano",
    ],
    [
        "title" => "Помпеи",
        "url_title" => "/pompeii",
    ]
];
$context = [];

$controller = null;

if ($url == "/") {
    $controller = new MainController($twig);
} elseif (preg_match("#^/volcano/image#", $url)) { 
    $controller = new volcanoImageController($twig);
} elseif (preg_match("#^/volcano/info#", $url)) {
    $controller = new volcanoInfoController($twig);
} elseif (preg_match("#^/volcano#", $url)) {
     $controller = new volcanoController($twig);
} elseif (preg_match("#^/pompeii/image#", $url)) { 
    $controller = new PompeiiImageController($twig);
} elseif (preg_match("#^/pompeii/info#", $url)) {
    $controller = new PompeiiInfoController($twig);
} elseif (preg_match("#^/pompeii#", $url)) {
    $controller = new PompeiiController($twig);
 } 

if ($controller) {
    $controller->get();
}