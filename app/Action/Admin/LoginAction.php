<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  //modificar a localização desse arquivo
  class  LoginAction extends Action {

      function index($request, $response){
          return $this->view->render($response, 'admin/login/login.phtml');
      }

      function logar($request, $response){
          /**/$dados = $request->getBody();
          $nome_usuario = //filtra valores primeiro 
          $senha = //filtra valores primeiro
          /**/

        if (/*testa os campos se são vazios */ ) {
            # code...
          }else{

        }
      }





  }
 ?>
