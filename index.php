<?php
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager;
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors','On');

session_start();
require 'vendor/autoload.php';
//require 'database.php';
require 'config/config.php';
require 'config/constants.php';

$app = new \Slim\App($config);

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer('resouces/views/');//seta uma classe de view (precisa instalar);
/*
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};
*/

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['db']);//Manda o array db para o container
$capsule->bootEloquent();

$capsule->setAsGlobal();
$capsule->bootEloquent();
/**/
require 'app/routes.php';

$app->run();

?>
