<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Libs\App();

$app->addRoute('/', 'HomeController@index')
    ->addRoute('/teste', 'HomeController@teste')
    ->addRoute('/outro/teste/{id}/', 'HomeController@outroTeste');

$routes = $app->getRoutes();
$uri = $app->getUri();

echo "<pre>";
print_r($routes);
echo "</pre>";

echo "<pre>";
print_r($uri);
echo "</pre>";

$app->start();

