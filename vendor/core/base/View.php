<?php


namespace vendor\core\base;


use app\controllers\App;

class View
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
     * Текущий шаблон
     * @var string
     */
    public $layout;
    /**
     * Информация о входе
     * @var boolean
     */
    public $level;

    public function __construct($route, $layout = '', $view = '', $level = false)
    {
        $this->route = $route;
        if($layout === false)
            $this->layout = false;
        else
            $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
        $this->level = $level;
    }

    public function render($vars)
    {
        extract($vars);
        if(isset($level))
        {
            if ($this->level <= $level && $this->level !== false)
            {
                $file_view = APP . "/views/{$this->route['controller']}/{$this->view}In.php";
            }
        }
        else
        {
            $file_view = APP . "/views/{$this->route['controller']}/{$this->view}Out.php";
        }


        ob_start(); // Буферизируем
        if(is_file($file_view))
            require_once $file_view;
        else
            echo "Не найден вид $file_view";
        $content = ob_get_clean(); // Сохраняем буфер в переменную

        if($this->layout !== false)
        {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                require_once $file_layout;
            } else {
                echo "Не найден шаблон $file_layout";
            }
        }
    }
}