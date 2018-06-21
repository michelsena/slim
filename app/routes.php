<?php
  //AREA ADMINISTRATIVA DO SITE
  $app->get('/admin/login', 'App\Action\Admin\loginAction:index');
  $app->post('/admin/login', 'App\Action\Admin\loginAction:logar');//arrumar a URL e o método
  $app->get('/admin/logout', 'App\Action\Admin\loginAction:logout');//arrumar a URL e o método

  $app->group('/admin', function (){
        $this->get('', 'App\Action\Admin\HomeAction:index');

        //POSTS
         $this->get('/posts', 'App\Action\Admin\PostAction:index');
         $this->get('/posts/add', 'App\Action\Admin\PostAction:add');
         $this->post('/posts/add', 'App\Action\Admin\PostAction:story');
    }
  )->add(App\Middleware\Admin\AuthMiddleware::class);


  //AREA DO SITE
  $app->get('/', 'App\Action\HomeAction:index');
  $app->get('/contato', 'App\Action\HomeAction:contato');
  $app->get('/sobre', 'App\Action\HomeAction:sobre');
 ?>
