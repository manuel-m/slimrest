<?php
require 'vendor/autoload.php';

include 'src/casting.php';

$app = new \Slim\Slim();

function APIrequest(){
    $app = \Slim\Slim::getInstance();
    $app->view(new \JsonApiView());
    $app->add(new \JsonApiMiddleware());
}

$app->get('/', function() use ($app) {
    echo '<h1>Winter is coming</h1>';
});

$app->get('/item', 'APIrequest', function() use ($app) {
    $item = array('data'=>'value');
    $app->render(200,array(
        'item' => $item
    ));
});


$app->get('/cast','APIrequest',function() use ($app, $casting_php) {
    $app->render(200,array(
        'casting' => $casting_php
    ));
});


$app->run();
