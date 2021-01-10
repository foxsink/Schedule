<?php

namespace app\controllers;

use app\models\ModelTable;

class ControllerTable extends App
{
    public function indexAction()
    {
        $model = new ModelTable();
        $pages = $model->findAll();
        $info = $model->findOne(4);
        $isLoggedIn = $this->isLoggedIn();
        $this->set(compact( 'pages', 'info', 'isLoggedIn'));
    }


    public function addSalePointAction()
    {
        $model = new ModelTable();
        if(isset($_POST['sale_point_name']))
            $model->setSalePoint($_POST['sale_point_name']);

        $pages = $model->findAll();
        $info = $model->findOne(4);
        $isLoggedIn = $this->isLoggedIn();
        $listOfPoints = $model->getSalePoints();
        $this->set(compact( 'pages', 'info', 'isLoggedIn', 'listOfPoints'));
    }



    public function addSellerAction()
    {
        $model = new ModelTable();
        if(isset($_POST['seller_name']))
            $model->setSeller($_POST['seller_name'], @$_POST['seller_sname']);

        $pages = $model->findAll();
        $info = $model->findOne(4);
        $isLoggedIn = $this->isLoggedIn();
        $listOfSellers = $model->getSellers();
        $this->set(compact( 'pages', 'info', 'isLoggedIn', 'listOfSellers'));
    }
    public function addSellerScheduleChoseAction()
    {
        $model = new ModelTable();
        $pages = $model->findAll();
        $info = $model->findOne(4);
        $isLoggedIn = $this->isLoggedIn();
        $listOfSellers = $model->getSellers();
        $this->set(compact( 'pages', 'info', 'isLoggedIn', 'listOfSellers'));
    }
    public function addSellerScheduleAction($seller_id)
    {
        $model = new ModelTable();
        $pages = $model->findAll();
        $info = $model->findOne(4);
        $isLoggedIn = $this->isLoggedIn();
        $listOfSellers = $model->getSellers();
        $id = false;
        foreach ($listOfSellers as $seller)
        {
            if($seller['seller_id'] === $seller_id)
            {
                $id = $seller_id;
            }
        }
        $listOfPoints = $model->getSalePoints();
        $this->set(compact( 'pages', 'info', 'isLoggedIn', 'listOfSellers', 'id', 'listOfPoints'));
    }
    public function viewSellersScheduleAction()
    {
        $model = new ModelTable();
    }



    public function addManagerAction()
    {
        $model = new ModelTable();
        if(isset($_POST['manager_name']))
            $model->setManager($_POST['manager_name'], @$_POST['manager_sname']);

        $pages = $model->findAll();
        $info = $model->findOne(4);
        $isLoggedIn = $this->isLoggedIn();
        $listOfManagers = $model->getManagers();
        $this->set(compact( 'pages', 'info', 'isLoggedIn', 'listOfManagers'));
    }
    public function addManagerScheduleAction()
    {
        $model = new ModelTable();
    }
    public function viewManagersScheduleAction()
    {
        $model = new ModelTable();
    }
}