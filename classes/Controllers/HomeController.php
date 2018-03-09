<?php
/**
 * Created by PhpStorm.
 * User: Lala
 * Date: 2018. 03. 09.
 * Time: 9:47
 */

namespace Controllers;

use Interop\Container\ContainerInterface;
use Slim\Views\Twig;

class HomeController
{
    protected $view;
    protected $container;

    public function __construct()
    {
        var_dump('valami');

        //$this->view = $container->get('view');
    }

    public function home($request, $response, $args)
    {
        return $response;
        //return $this->view->render($response, 'index.twig', []);
    }
}