<?php
  namespace App\Action\Admin;

  use App\Action\Action;

  class  PostAction extends Action {

      function index($request, $response){ //arrumar o nome do método
          $vars["page"] = "posts/list";//arrumar o caminho  e nome do arquivo
          $vars["title"] = "Postagens";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function add($request, $response){ //arrumar o nome do método
          $vars["page"] = "posts/add";//arrumar o caminho  e nome do arquivo
          $vars["title"] = "Incluir Postagem";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function story($request, $response){ //arrumar o nome do método
          $vars["page"]     = "posts/add";//arrumar o caminho  e nome do arquivo
          $vars["title"]    = "Incluir Postagem";

          $dados     = $request->getParsedBody();
          $titulo    = filter_var($dados["$titulo"]);
          $descricao = filter_var($dados["$titulo"]);

          if ($titulo != "" && $descricao != "") {
              $sql = "INSERT INTO posts (titulo, descricao) VALUES(?, ?)"
          }

          $vars["erro"] = "Preencha todos os campos!";

          return $this->view->render($response, 'admin/template.phtml', $vars);
      }





  }
 ?>
