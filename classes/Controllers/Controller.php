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
    protected $request;
    protected $params = [];

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $container->get('view');
        $this->response = $container->get('response');
        $this->request = $container->get('request');
        $this->context = new \stdClass();

        $this->params();
    }

    protected function render($template)
    {
        return $this->view->render($this->response, $template.".twig", (array) $this->context);
    }

    protected function json()
    {
        return json_encode((array) $this->context);
    }

    private function params()
    {
        $result = [];

        $allGetVars = $this->request->getQueryParams();
        foreach($allGetVars as $key => $param){
            $result[$key] = $param;
        }

        $allPostPutVars = $this->request->getParsedBody();
        if (is_array($allPostPutVars)) {
            foreach ($allPostPutVars as $key => $param) {
                $result[$key] = $param;
            }
        }

        $this->params = $result;
    }
}