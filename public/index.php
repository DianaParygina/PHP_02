<?php 
require_once "vendor/autoload.php";
require_once "../controllers/MainController.php"; 
require_once "../controllers/MermaidController.php";
require_once "../controllers/MermaidImageController.php";
require_once "../controllers/MermaidInfoController.php"; 
require_once "../controllers/UranusController.php";
require_once "../controllers/UranusImageController.php";
require_once "../controllers/UranusInfoController.php"; 

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER['REQUEST_URI'];

$title = "";
$template = ""; 

$menu = [ 
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Русалка",
        "url" => "/mermaid",
    ],
    [
        "title" => "Уран",
        "url" => "/uranus",
    ]
];
$context = [];

$controller = null;

if ($url == "/") {
    $controller = new MainController($twig);
} elseif (preg_match("#^/mermaid/image#", $url)) { 
    $controller = new MermaidImageController($twig);
} elseif (preg_match("#^/mermaid/info#", $url)) {
    $controller = new MermaidInfoController($twig);
} elseif (preg_match("#^/mermaid#", $url)) {
    $controller = new MermaidController($twig);
} elseif (preg_match("#^/uranus/image#", $url)) { 
    $controller = new UranusImageController($twig);
} elseif (preg_match("#^/uranus/info#", $url)) {
    $controller = new UranusInfoController($twig);
} elseif (preg_match("#^/uranus#", $url)) {
    $controller = new UranusController($twig);
} 

if ($controller) {
    $controller->get();
}