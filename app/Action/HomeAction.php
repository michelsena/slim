<?php  namespace App\Action;

class  HomeAction {
  protected $container;

  function __construct($container)    {
    $this->container = $container;
  }

  function index($request, $response){
      $vars['page'] = "home";
      return $this->container->view->render($response, 'template.phtml', $vars);
        // $response = $this->$container->view->render($response, 'template.phtml', $vars);
         //return $response;
  }



}
?>
