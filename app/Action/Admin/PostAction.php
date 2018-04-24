<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  class  PostAction extends Action {

      function posts($request, $response){
          $vars["page"] = "postagens";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function users($request, $response){
          $vars["page"] = "usuarios";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }





  }
 ?>
