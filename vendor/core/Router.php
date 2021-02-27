<?php

namespace vendor\core;

/**
 * Класс Рутер. Перенаправляет
 * @package vendor\core
 */
class Router {

    /**
     * Массив маршрутов
     * @var array
     */
    protected static $routes = [];
    /**
     * Текущий маршрут
     * @var array
     */
    protected static $route = [];

    /**
     * Фунция добавления маршрута
     * @param $regexp
     * @param array $route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Фунция поиска маршрута. true = маршрут найден
     * @param $uri
     * @return bool
     */
    public static function matchRoute($uri)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if(preg_match("#$pattern#i", $uri, $matches)) {
                foreach ($matches as $k => $v)
                {
                    if(is_string($k))
                    {
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action']))
                {
                    $route['action'] = 'index';
                }
                $route['controller'] = toUpperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Функция вызова маршрута
     * @param $uri
     */
    public static function dispatch($uri)
    {
        $uri = removeQueryString($uri);
        if(self::matchRoute($uri))
        {
            $controller = "\app\controllers\Controller".self::$route['controller'];
            if(class_exists($controller))
            {
                $cObj = new $controller(self::$route);
                $action = toLowerCamelCase(self::$route['action'])."Action";
                if(method_exists($cObj, $action))
                {
                    if($cObj->isLoggedIn())
                    {
                        $cObj->layout = "loggedIn";
                        $cObj->level = $cObj->getLevel();
                    }
                    else
                    {
                        $cObj->signIn();
                    }
                    if(isset(self::$route['alias']))
                        $cObj->$action(self::$route['alias']);
                    else
                        $cObj->$action();
                    $cObj->getView();
                }
                else
                {
                    echo "Метод $action Контороллера <b>$controller</b> не найден";
                }
            }
            else
            {
                echo "Контороллер <b>$controller</b> не найден";
            }
        }
        else
        {
            http_response_code('404');
            debug($_GET);
        }
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
}