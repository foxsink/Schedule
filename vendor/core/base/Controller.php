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
     * Информация о уровне пользователя, false === не вошел
     * @var boolean
     */
    public $level;
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
        $vObj = new View($this->route, $this->layout, $this->view, $this->level);
        $vObj->render($this->vars);
    }

    public function set($vars)
    {
        $this->vars = array_merge($this->vars, $vars);
    }
}