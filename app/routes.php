<?php
$app->get('/', 'App\Action\HomeAction:index');
$app->get('/sobre', 'App\Action\HomeAction:sobre');
$app->get('/contato', 'App\Action\HomeAction:contato');
 ?>
