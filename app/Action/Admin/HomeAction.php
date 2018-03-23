<?php
  namespace App\Action\Admin;

  class  HomeAction {
      private $container;

      function __construct($container)    {
        $this->container = $container;
      }

      function index($request, $response){
          return $this->container->view->render($response, 'admin/home.phtml');
      }





  }
 ?>
