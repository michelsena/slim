<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  //modificar a localização desse arquivo
  class  LoginAction extends Action {

      function index($request, $response){
          if (isset($_SESSION[PREFIX . "logado"])) {
            return $response->withRedirect(PATH . "/admin");
          }

          return $this->view->render($response, 'admin/login/login.phtml');
      }

      function logar($request, $response){

          $dados = $request->getParsedBody();

          $email = strip_tags(filter_var($dados["email"]) );//filtra valores e tira as tags
          $senha = strip_tags(filter_var($dados["senha"]) );
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
                  // Aqui é preciso usar o render() por causa que é passado variável?
                  return $this->view->render($response, 'admin/login/login.phtml', $vars);
              }

            }else{
                //instruções de segurança
                $vars["erro"] = "É preciso preencher todos os campos";
                return $this->view->render($response, 'admin/login/login.phtml', $vars);

          }
      }

      function logout($request, $response){
          unset($_SESSION[PREFIX . "logado"]);
          session_destroy();

          return $response->withRedirect(PATH . "/admin/login");;
      }




  }
 ?>
