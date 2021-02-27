<?php


namespace app\controllers;


use app\models\ModelStuff;

class ControllerStuff extends App
{
    public function indexAction()
    {
        $this->getMenu(__CLASS__);
    }
}