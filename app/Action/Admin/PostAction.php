<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  class  PostAction extends Action {

      function index($request, $response){ //arrumar o nome do método
          $vars["page"] = "posts/list";//arrumar o caminho  e nome do arquivo
          $vars["title"] = "Postagens";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }
      /*
      function users($request, $response){
          $vars["page"] = "usuarios";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }
*/




  }
 ?>
