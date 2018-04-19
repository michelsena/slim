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
          $dados = $request->getParsedBody();
          /* */
          $email = strip_tags(filter_var($dados["email"]) );//filtra valores e tira as tags
          $senha = strip_tags(filter_var($dados["senha"]) );//filtra valores primeiro
          /* */

          if ($email != '' && $senha != '' ) {/*testa os campos se são vazios */
              // acesso ao banco
              $sql = "select * from usuarios where email = ? and senha = ?";
              $verificarNoBanco = $this->db->prepare($sql);
              $verificarNoBanco->execute( array($email, $senha) );

              if ($verificarNoBanco->rowCount() > 0) {
                  $_SESSION[PREFIX . "logado"] = true;

                  return $response->withRedirect(PATH . "/admin");
                }else {
                  $vars["erro"] = "Informações do usuário não encontradas...";
                  return $this->view->render($response, 'admin/login/login.phtml', $vars);
              }

            }else{
                //instruções de segurança
                $vars["erro"] = "É preciso preencher todos os campos";
                return $this->view->render($response, 'admin/login/login.phtml', $vars);

          }
          /**/
      }





  }
 ?>
