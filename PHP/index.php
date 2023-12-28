<?php

$basePath = preg_replace('/\/index\.php(?:\/.*)?/i', '', $_SERVER['PHP_SELF']);


# require_once __DIR__ . '/config/config.php'; // Config for the DB
require_once __DIR__ . '/vendor/autoload.php';

//twig
$loader = new \Twig\Loader\FilesystemLoader('Templates');
$twig   = new \Twig\Environment($loader, [
    'cache' => false,
    'debug' => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension()); // Debug

$ctrl = new \Controller\FrontController();