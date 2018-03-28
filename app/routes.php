<?php
  //AREA DO ADMIN DO SITE
  $app->get('/admin', 'App\Action\Admin\HomeAction:index');


  //AREA DO SITE
  $app->get('/', 'App\Action\HomeAction:index');
  $app->get('/contato', 'App\Action\HomeAction:contato');
  $app->get('/sobre', 'App\Action\HomeAction:sobre');
 ?>
