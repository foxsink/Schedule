<?php

namespace app\controllers;

use app\models\ModelMain;

class ControllerMain extends App
{
//    public $layout = "main"; переопределение на уровне контроллера

    public function indexAction()
    {
//        $this->layout = "main"; переопределение на уровне экшена
//        $this->layout = false; отключение вида
        $model = new ModelMain();
        $pages = $model->findAll();
        $info = $model->findOne(1);

        $this->set(compact( 'pages', 'info'));
    }
}