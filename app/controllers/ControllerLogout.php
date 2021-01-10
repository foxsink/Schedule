<?php


namespace app\controllers;


use app\models\ModelLogout;

class ControllerLogout extends App
{
    public function indexAction()
    {
        if($this->isLoggedIn() === true)
        {
            $this->logout();
            header("Location: /");
        }
        else
        {
            header("Location: /");
        }

    }

}