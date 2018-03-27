<?php
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors','On');

require 'vendor/autoload.php';
require 'config/config.php';
require 'config/constants.php';


$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer('resouces/views/');//setar um uma classe de view (precisa instalar);

require 'app/routes.php';

$app->run();

?>
