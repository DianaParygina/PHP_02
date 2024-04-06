<?php 
require_once "vendor/autoload.php";
require_once "../controllers/MainController.php"; 
require_once "../controllers/MermaidController.php";
require_once "../controllers/MermaidImageController.php";
require_once "../controllers/MermaidInfoController.php"; 
require_once "../controllers/PompeiiController.php";
require_once "../controllers/PompeiiImageController.php";
require_once "../controllers/PompeiiInfoController.php"; 

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER['REQUEST_URI'];

$title = "";
$template = "";
$context = [];

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

// if ($url == "/") {
//     $controller = new MainController($twig);
// } elseif (preg_match("#^/volcano/image#", $url)) { 
//     $controller = new MermaidImageController($twig);
// } elseif (preg_match("#^/volcano/info#", $url)) {
//     $controller = new MermaidInfoController($twig);
// } elseif (preg_match("#^/volcano#", $url)) {
//     $controller = new MermaidController($twig);
//     $title = "volcano";
// } elseif (preg_match("#^/pompeii/image#", $url)) { 
//     $controller = new UranusImageController($twig);
// } elseif (preg_match("#^/pompeii/info#", $url)) {
//     $controller = new UranusInfoController($twig);
// } elseif (preg_match("#^/pompeii#", $url)) {
//     $controller = new UranusController($twig);
//     $title = "pompeii";
// } 

if ($url == "/") {
    $template = "main.twig";
} elseif (preg_match("#^/volcano#", $url)) {
    $template = "__object.twig";
    $title = "volcano";
    $context['title'] = "volcano";

    $is_info = $url == '/volcano/info';
    $is_image = $url == '/volcano/image';
    $context['is_info'] = $is_info;
    $context['is_image'] = $is_image;

if($is_image) {
    $template = "base_image.twig";
    $context['image_url'] = '/images/volcano.jpg';
}elseif($is_info){
    $template = "volcano_info.twig";
}



} elseif (preg_match("#^/pompeii#", $url)) {
    $template = "__object.twig";
    $title = "pompeii";
    $context['title'] = "pompeii";

    $is_info = $url == '/pompeii/info';
    $is_image = $url == '/pompeii/image';
    $context['is_info'] = $is_info;
    $context['is_image'] = $is_image;

    if($is_image) {
        $template = "base_image.twig";
        $context['image_url'] = '/images/pompeii.jpg';
    }elseif($is_info){
        $template = "pompeii_info.twig";
    }
}

$context['title'] = $title;
echo $twig->render($template, $context);
