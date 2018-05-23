<?php
  //AREA ADMINISTRATIVA DO SITE
  $app->get('/admin/login', 'App\Action\Admin\loginAction:index');
  $app->post('/admin/login', 'App\Action\Admin\loginAction:logar');//arrumar a URL e o método
  $app->get('/admin/logout', 'App\Action\Admin\loginAction:logout');//arrumar a URL e o método
  //$app->get('/admin', 'App\Action\Admin\HomeAction:index')->add(App\Middleware\Admin\AuthMiddleware::class);
/**/
  $app->group('/admin', function (){
        $this->get('', 'App\Action\Admin\HomeAction:index');

        //POSTS
         $this->get('/posts', 'App\Action\Admin\PostAction:index');
    }
  )->add(App\Middleware\Admin\AuthMiddleware::class);
/**/


  //AREA DO SITE
  $app->get('/', 'App\Action\HomeAction:index');
  $app->get('/contato', 'App\Action\HomeAction:contato');
  $app->get('/sobre', 'App\Action\HomeAction:sobre');
 ?>
