<?php
  namespace App\Action\Admin;

  class  HomeAction {
      private $contain;

      function __construct($container)    {
        $this->contain = $container;
      }

      function index($request, $response){
          return $this->contain->view->render($response, 'admin/home.phtml');
      }





  }
 ?>
