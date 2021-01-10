<?php


namespace vendor\core\base;


class Controller
{
    /**
     * Текущий маршрут
     * @var array
     */
    public $route = [];
    /**
     * Текущий вид
     * @var string
     */
    public $view;
    /**
     * Текущий вид
     * @var string
     */
    public $layout;
    /**
     * Пользовательские данные
     * @var array
     */
    public $vars = [];

    /**
     * Конструктор класса, параметр - текущий маршрут. Присваивает значение текущему маршруту.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars)
    {
        $this->vars = array_merge($this->vars, $vars);
    }
}