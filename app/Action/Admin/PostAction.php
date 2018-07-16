<?php
  namespace App\Action\Admin;

  use App\Action\Action;
  use Illuminate\Database\Capsule\Manager as DB;
  //colocar um use (acho) elemento do Eloquent

  class  PostAction extends Action {

      function index($request, $response){
          $vars["page"]  = "posts/list";
          $vars["title"] = "Postagens";
          /*
          $sql = "SELECT id, titulo FROM posts";

          $verificarNoBanco = $this->db->prepare($sql);
          $verificarNoBanco->execute();
          $vars["posts"] = $verificarNoBanco->fetchAll(\PDO::FETCH_OBJ);//extração da pesquisa e conversão em objetos
          */

          $vars["posts"] = DB::table("posts")->get();//tem que ver se a pesquisa tá como obj's ou outra estrutura

          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function add($request, $response){
          $vars["page"]  = "posts/add";
          $vars["title"] = "Incluir Postagem";
          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function story($request, $response){
          $vars["page"]  = "posts/add";
          $vars["title"] = "Incluir Postagem";

          $dados     = $request->getParsedBody();
          $titulo    = trim( filter_var($dados["titulo"]) );
          $descricao = trim( filter_var($dados["descricao"]) );

          if ($titulo != "" && $descricao != "") {
            $dados["titulo"] = $titulo;
            $dados["descricao"] = $descricao;

            /*
              $sql = "INSERT INTO posts (titulo, descricao) VALUES(?, ?)";

              $verificarNoBanco = $this->db->prepare($sql);
              $verificarNoBanco->execute( array($titulo, $descricao) );
            */

              DB::table("posts")->insert($dados);//tem que ver se a pesquisa tá como obj's ou outra estrutura

              return $response->withRedirect(PATH . "/admin/posts");
          }

          $vars["erro"] = "Por favor, preencha todos os campos!";

          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function edit($request, $response){
          $vars["page"]  = "posts/edit";
          $vars["title"] = "Edição de Postagem";

          $id = $request->getAttribute('id');

          //Ccondição caso venha alguma coisa diferente de número no $id
          if (! is_numeric($id)/*$id não for numérico */) {
              return $response->withRedirect(PATH . "/admin/posts");
          }

          $sql = "SELECT * FROM posts WHERE id=?";

          $post = $this->db->prepare($sql);
          $post->execute( array($id) );

          if ($post->rowCount() == 0) {
            return $response->withRedirect(PATH . "/admin/posts");
          }

          $vars["post"] = $post->fetch(\PDO::FETCH_OBJ);//extração da pesquisa e conversão em objeto

          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function update($request, $response){
          $vars["title"] = "Edição de Postagem";

          $dados     = $request->getParsedBody();
          $titulo    = filter_var($dados["titulo"]);
          $descricao = filter_var($dados["descricao"]);

          $id        = $request->getAttribute("id");

          if (! is_numeric($id)/*$id não for numérico */) {
              return $response->withRedirect(PATH . "/admin/posts");
          }

          if ($titulo != "" && $descricao != "") {
              $sql = "UPDATE posts SET titulo=?, descricao=? WHERE id=?";

              $atualizar = $this->db->prepare($sql);
              $atualizar->execute( array($titulo, $descricao, $id) );

              return $response->withRedirect(PATH . "/admin/posts");
          }

          $vars["erro"] = "Por favor, preencha todos os campos!";

          return $this->view->render($response, 'admin/template.phtml', $vars);
      }

      function delete($request, $response){
          $id = $request->getAttribute('id');

          //Ccondição caso venha alguma coisa diferente de número no $id
          if (! is_numeric($id)/*$id não for numérico */) {
              return $response->withRedirect(PATH . "/admin/posts");
          }

          $sql = "DELETE FROM posts WHERE id=?";

          $post = $this->db->prepare($sql);
          $post->execute( array($id) );

          return $response->withRedirect(PATH . "/admin/posts");
      }

      function view($request, $response){
          $vars["page"]  = "posts/view";
          $vars["title"] = "Visualização de Postagem";

          $id = $request->getAttribute('id');

          //Condição caso venha alguma coisa diferente de número no $id
          if (! is_numeric($id)/*$id não for numérico */) {
              return $response->withRedirect(PATH . "/admin/posts");
          }

          $sql = "SELECT * FROM posts WHERE id=?";

          $post = $this->db->prepare($sql);
          $post->execute( array($id) );

          if ($post->rowCount() == 0) {
            return $response->withRedirect(PATH . "/admin/posts");
          }

          $vars["post"] = $post->fetch(\PDO::FETCH_OBJ);//extração da pesquisa e conversão em objeto

          return $this->view->render($response, 'admin/template.phtml', $vars);
      }
  }
 ?>
