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

    public function setManager($managerName, $managerSName, $managerLogin)
    {
        return $this->query("INSERT INTO managers (manager_name, manager_sname, manager_login) 
                VALUES ('{$managerName}', '{$managerSName}', '{$managerLogin}')");
    }
    public function viewManagersSchedule($managerName, $managerSName = '')
    {

    }
    public function putDateForManager($user, $start, $end, $diff, $desc)
    {
        $this->table = "manager_schedule";
        $arrKeys = explode(", ","manager_id, start_time, end_time, diff_time, description");
        $arrValues = compact('user', 'start', 'end', 'diff', 'desc');
        return $this->insertInto($arrKeys, $arrValues);
//        return $this->query("INSERT INTO manager_schedule (manager_id,start_time, end_time, diff_time, description)
//                VALUES ('{$user}', '{$start}', '{$end}', '{$diff}', '{$desc}')");
    }
    public function arrOfUserSchedule($user)
    {
        $this->table = "manager_schedule";
        $this->pk = "manager_id";
        return $this->findBySQL("SELECT * FROM manager_schedule WHERE manager_id = ?", [$user['user_id']]);
    }
}