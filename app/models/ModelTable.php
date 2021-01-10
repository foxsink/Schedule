<?php


namespace app\models;


class ModelTable extends \vendor\core\base\Model
{
    public $table = 'pages';
    public $pk = 'page_id';

    public function getSalePoints()
    {
        $this->table = "sale_points";
        $this->pk = "point_id";
        return $this->findAll();
    }

    public function setSalePoint($PointName)
    {
        return $this->query("INSERT INTO sale_points (point_name) VALUES ('{$PointName}')");
    }


    public function getSellers()
    {
        $this->table = "sellers";
        $this->pk = "seller_id";
        return $this->findAll();
    }

    public function setSeller($sellerName, $sellerSName = '')
    {
        return $this->query("INSERT INTO sellers (seller_name, seller_sname) VALUES ('{$sellerName}', '{$sellerSName}')");
    }

    public function getSellersSchedule()
    {

    }
    public function setSellerSchedule($sellerId, $salePoint, $date)
    {
        return $this->query("INSERT INTO seller_schedule (seller_id, sale_point, date) VALUES ('{$sellerId}', '{$salePoint}', '{$date}')");
    }



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