<?php
  namespace App\Action;

  class  HomeAction extends Action{

      function index($request, $response){
        $vars['page'] = "home";

          return $this->view->render($response, 'template.phtml', $vars);
      }

      function contato($request, $response){
        $vars['page'] = "contato";

          return $this->view->render($response, 'template.phtml', $vars);
      }

      function sobre($request, $response){
        $vars['page'] = "sobre";

          return $this->view->render($response, 'template.phtml', $vars);
      }



  }
 ?>
