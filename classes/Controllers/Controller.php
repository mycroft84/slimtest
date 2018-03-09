<?php
/**
 * Created by PhpStorm.
 * User: Lala
 * Date: 2018. 03. 09.
 * Time: 10:02
 */

namespace Controllers;

use Psr\Container\ContainerInterface;

class Controller
{
    protected $container;
    protected $context;
    protected $view;
    protected $response;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $container->get('view');
        $this->response = $container->get('response');
        $this->context = new \stdClass();
    }

    public function render($template)
    {
        return $this->view->render($this->response, $template, (array) $this->context);
    }
}