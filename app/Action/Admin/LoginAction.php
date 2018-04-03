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
              # acesso ao banco
            }else{
                $vars["erro"] = "É preciso preencher todos os campos";
                return $this->view->render($response, 'admin/login/login.phtml');

          }
          /**/
      }





  }
 ?>
