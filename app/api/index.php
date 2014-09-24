<?php
require __DIR__ . '/../../vendor/autoload.php';

$environment = getenv('APP_ENV') ?: 'prod';

$app = new Silex\Application();

if($environment == 'dev') {
    $app['debug'] = true;
}

$app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__ . "/../../config/config_$environment.yml"));

//register an API endpoint
$app->get('/me', 'Temp\\TempApp\\Home::me');

$app->run();
