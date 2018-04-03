<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  //modificar a localização desse arquivo
  class  LoginAction extends Action {

      function index($request, $response){
          return $this->view->render($response, 'admin/login/login.phtml');
      }

      function logar($request, $response){
          /**/
          //$response->getBody()->write("Valor da val dados: ".$dados);
          $dados = $request->getBody();
          /**/
          $email = strip_tags(filter_var($dados["email"]) );//filtra valores e tira as tags
          $senha = strip_tags(filter_var($dados["senha"]) );//filtra valores primeiro
          /* */

          if ($email != '' && $senha != '' ) {/*testa os campos se são vazios */
              # conecta com o banco
            }else{
                //mostrar uma mensagem dizendo para preencher todos os campos
                return $this->view->render($response, 'admin/login/login.phtml');

          }
          /**/
      }





  }
 ?>
