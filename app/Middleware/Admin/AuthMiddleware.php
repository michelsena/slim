<?php
/**
 *
 */

namespace App\Middleware\Admin;

class AuthMiddleware{
  /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        if (!isset($_SESSION[PREFIX . "logado"])) {
          return $response->withRedirect(PATH . "/admin/login");//confirmar se o caminho chega no arquivo
        }

        $response = $next($request, $response);

        return $response;
    }

}


 ?>
