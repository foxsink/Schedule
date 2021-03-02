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
        if(isset($_POST['manager_name']) && isset($_POST['manager_sname']) && isset($_POST['manager_login']))
            $model->setManager($_POST['manager_name'], $_POST['manager_sname'], $_POST['manager_login']);

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
        $model = new ModelTable();
        $user = $this->getUser()[0];
        $schedule = array_reverse($model->arrOfUserSchedule($user));
        $flag = false;
        foreach ($schedule as $key => $value)
            $flag = true;
        if($flag === false)
            echo "<h2>Вы не создали расписание!</h2>";
        else
        {
            $this->set(compact('schedule'));
        }
    }
    public function addSelfManagerScheduleAction()
    {
        $this->getMenu(__CLASS__);
        $model = new ModelTable();
        $user = $this->getUser()[0];
        $months = ['-1 month' => getCurrentMonthInRussian(-1), 'now' => getCurrentMonthInRussian(0), '+1 month' => getCurrentMonthInRussian(1)];
        $days = ['-1 month' => getDaysInMonth(-1), 'now' => getDaysInMonth(0), '+1 month' => getDaysInMonth(1)];
        $dates = [];
        if(isset($_POST['scheduled'])) {
            foreach ($_POST as $date => $checked) {
                if($checked === 'checked') {
                    $dates = array_merge([$date], $dates);

                }
            }
        }
        $toDB = [];
        if(isset($_POST['entered'])) {
            $i = 0;
            foreach ($_POST as $key => $date)
            {
                if($date !== 'Save!')
                {
                    if(strpos($key, 'desc'))
                        $toDB = array_merge([$key . $date], $toDB);
                    else
                        $toDB = array_merge([$key . $date . ":00"], $toDB);
//                    $model->putDateForManager($user['user_id'], $start, $end, $diff, $desc);
                }
            }
        }

        for($i = 0; $i < count($toDB); $i+=3)
        {
            $start = str_replace('start', ' ', $toDB[$i+2]);
            $end = str_replace('end', ' ', $toDB[$i+1]);
            $diff = date("H:i:s",strtotime($end) - strtotime($start) - 7*60*60);
            $desc = substr(str_replace('desc', '', $toDB[$i]), 10);
            $model->putDateForManager($user['user_id'], $start, $end, $diff, $desc);
        }
        $this->set(compact( 'months', 'days', 'dates'));
    }
}