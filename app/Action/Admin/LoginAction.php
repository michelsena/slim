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
              $verificarNoBanco = $this->db;
              $sql = "select * from usuarios where email = ? and senha = ?";
              $verificarNoBanco->prepare($sql);
              $verificarNoBanco->execute( array($email, $senha) );

              if ($verificarNoBanco->rowCount() > 0) {
                $_SESSION[PREFIX . "logaddo"] = true;

                return $response->withRedirect(PATH . "/admin");
              }

            }else{
                $vars["erro"] = "É preciso preencher todos os campos";
                return $this->view->render($response, 'admin/login/login.phtml');

          }
          /**/
      }





  }
 ?>
