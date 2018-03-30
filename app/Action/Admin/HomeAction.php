<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  class  HomeAction extends Action {

      function index($request, $response){
          return $this->view->render($response, 'admin/home.phtml');
      }





  }
 ?>
