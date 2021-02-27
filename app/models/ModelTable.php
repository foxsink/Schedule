<?php


namespace app\models;


class ModelTable extends \vendor\core\base\Model
{
    public $table = 'pages';
    public $pk = 'page_id';

    public function getManagers()
    {
        $this->table = "managers";
        $this->pk = "manager_id";
        return $this->findAll();
    }

    public function setManager($managerName, $managerSName = '')
    {
        return $this->query("INSERT INTO managers (manager_name, manager_sname) VALUES ('{$managerName}', '{$managerSName}')");
    }
    public function viewManagersSchedule($managerName, $managerSName = '')
    {

    }
}