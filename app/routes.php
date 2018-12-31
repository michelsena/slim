<?php
  //AREA ADMINISTRATIVA DO SITE
  $app->get('/admin/login', 'App\Action\Admin\loginAction:index');
  $app->post('/admin/login', 'App\Action\Admin\loginAction:logar');//arrumar a URL e o método
  $app->get('/admin/logout', 'App\Action\Admin\loginAction:logout');//arrumar a URL e o método


  $app->group('/admin', function (){
        $this->get('', 'App\Action\Admin\HomeAction:index');

        //--> POSTS (Ficarão comentadas até colocar o Eloquent no login)
         $this->get('/posts', 'App\Action\Admin\PostAction:index');
         $this->get('/posts/add', 'App\Action\Admin\PostAction:add');
         $this->post('/posts/add', 'App\Action\Admin\PostAction:story');

         // o "{id:\d+}" restringi que a URL somente seja aceita com digito (e talvez ainda, somente positivo)

         $this->get('/posts/{id:\d+}/edit', 'App\Action\Admin\PostAction:edit'); //restringiu para aceitar só digito e ainda positivo
         $this->post('/posts/{id:\d+}/edit', 'App\Action\Admin\PostAction:update');

         $this->get('/posts/{id:\d+}/delete', 'App\Action\Admin\PostAction:delete');

         $this->get('/posts/{id:\d+}/view', 'App\Action\Admin\PostAction:view');


          // restringiu para aceitar só digito (e talvez ainda, somente positivo)

         /* ROTAS QUE ERAM USADAS SEM O ELOQUENT mas também funcionanam com o Eloquent
           //$this->get('/posts/{id}/edit', 'App\Action\Admin\PostAction:edit');//restringiu para aceitar só digito
           //$this->post('/posts/{id}/edit', 'App\Action\Admin\PostAction:update');
           //$this->get('/posts/{id}/delete', 'App\Action\Admin\PostAction:delete');
               //restringiu para aceitar só digito (e talvez ainda, somente positivo)

           $this->get('/posts/{id:\d+}/edit', 'App\Action\Admin\PostAction:edit'); //restringiu para aceitar só digito e ainda positivo
           $this->post('/posts/{id}/edit', 'App\Action\Admin\PostAction:update');
           $this->get('/posts/{id:\d+}/delete', 'App\Action\Admin\PostAction:delete');

           $this->get('/posts/{id}/view', 'App\Action\Admin\PostAction:view');
        */
    }
  )->add(App\Middleware\Admin\AuthMiddleware::class);


  //AREA DO SITE
  $app->get('/', 'App\Action\HomeAction:index');
  $app->get('/contato', 'App\Action\HomeAction:contato');
  $app->get('/sobre', 'App\Action\HomeAction:sobre');
 ?>
