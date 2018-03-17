<?php
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require './config/config.php';
require './config/constants.php';


$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer('./resouces/views/');//setar um uma classe de view (precisa instalar);

$app->get('/', function ($request,  $response) {
     $vars['page'] = "home";

     $response = $this->view->render($response, 'template.phtml', $vars);

     return $response;
});

$app->get('/sobre', function ( $request,  $response) {
    $vars['page'] = "sobre";

    $response = $this->view->render($response, 'template.phtml', $vars);

    return $response;
});

$app->get('/contato', function ( $request,  $response) {
    $vars['page'] = "contato";

    $response = $this->view->render($response, 'template.phtml', $vars);

    return $response;
});

$app->run();
/*

*/
?>
