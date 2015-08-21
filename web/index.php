<?php

require('../vendor/autoload.php');
require('api/roll.php');
$app = new \Slim\Slim(array(
    'mode' => 'development',
    'debug' => true
));
$app->response->headers->set('Access-Control-Allow-Origin', '*');
$app->response->headers->set('Content-Type', 'application/json');

$app->get('/', function () {
    echo "Hi there";
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

// API group
$app->group('/api', function () use ($app) {

    $app->get('/roll', function () {
    	echo(search("chinese", "Waterloo"));
    });

    $app->get('/rollbyll/:latitude/:longitude', function ($latitude, $longitude) {
    	echo(searchByLL($latitude, $longitude));
    });

});

$app->run();
?>