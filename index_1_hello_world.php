<!-- - ->
<html>
<head>
</head>

<body>
  <h1 style="color: green"> Pasta raiz do Slim </h1>
</body>
</html>  -->

<?php/* */
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function ( $request,  $response) {
    $name = $request->getAttribute("name");
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->run(); /* */
?>
