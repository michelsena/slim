<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  class  HomeAction extends Action {

      function index($request, $response){
          $vars["page"] = "home";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }





  }
 ?>
