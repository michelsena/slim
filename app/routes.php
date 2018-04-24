<?php
  //AREA ADMINISTRATIVA DO SITE
  $app->get('/admin/login', 'App\Action\Admin\loginAction:index');
  $app->post('/admin/login', 'App\Action\Admin\loginAction:logar');//arrumar a URL e o método
  $app->get('/admin/logout', 'App\Action\Admin\loginAction:logout');//arrumar a URL e o método
  $app->get('/admin', 'App\Action\Admin\HomeAction:index')->add(App\Middleware\Admin\AuthMiddleware::class);

  $app->get('/admin/postagens', 'App\Action\Admin\PostAction:posts');//arrumar a URL e o método
  $app->get('/admin/usuarios', 'App\Action\Admin\PostAction:users');//arrumar a URL e o método

  //AREA DO SITE
  $app->get('/', 'App\Action\HomeAction:index');
  $app->get('/contato', 'App\Action\HomeAction:contato');
  $app->get('/sobre', 'App\Action\HomeAction:sobre');
 ?>
