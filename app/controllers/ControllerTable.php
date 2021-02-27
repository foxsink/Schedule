<?php

namespace app\controllers;

use app\models\ModelTable;

class ControllerTable extends App
{
    public function indexAction()
    {
        $this->getMenu(__CLASS__);
    }

    public function addManagerAction()
    {
        $this->getMenu(__CLASS__);
        $model = new ModelTable();
        if(isset($_POST['manager_name']))
            $model->setManager($_POST['manager_name'], @$_POST['manager_sname']);

        $listOfManagers = $model->getManagers();
        $this->set(compact( 'listOfManagers'));
    }
    public function addManagersScheduleAction()
    {
        $this->getMenu(__CLASS__);
    }
    public function viewManagersScheduleAction()
    {
        $this->getMenu(__CLASS__);
    }
    public function viewSelfManagerScheduleAction()
    {
        $this->getMenu(__CLASS__);
    }
    public function addSelfManagerScheduleAction()
    {
        $this->getMenu(__CLASS__);
    }
}