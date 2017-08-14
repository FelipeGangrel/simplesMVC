<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Core\App();

$app->route('get','/teste/{i}', 'HomeController@teste', ['id'] );

$app->run();

