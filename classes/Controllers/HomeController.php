<?php
/**
 * Created by PhpStorm.
 * User: Lala
 * Date: 2018. 03. 09.
 * Time: 9:47
 */

namespace Controllers;

use Models\News;

class HomeController extends Controller
{
    public function index($request, $response, $args)
    {
        $this->context->news = (new News())
            ->where('id',1)
            ->first();

        return $this->render('index.twig');
    }

}