<?php
/**
 * Распечатывает данные в читаемом виде
 * @param $data
 */
function debug($data)
{
    echo '<pre>';
    echo print_r($data, true);
    echo '</pre>';
}

/**
 * Делает из строки CamelCase с большой буквы
 * @param $str
 * @return string
 */
function toUpperCamelCase($str)
{
    return str_replace(" ", "", ucwords(str_replace("-"," ",$str)));
}

/**
 * Делает из строки CamelCase с маленькой буквы
 * @param $str
 * @return string
 */
function toLowerCamelCase($str)
{
    return lcfirst(toUpperCamelCase($str));
}

/**
 * Отрезает GET запрос в адресной строке
 * @param $uri
 * @return string
 */
function removeQueryString($uri)
{
    if($uri)
    {
        $params = explode("&", $uri, 2);
        if(false === strpos($params[0], '='))
        {
            return rtrim($params[0], "/");
        }
        return '';
    }
}
function getPepper()
{
    return file_get_contents(ROOT . "/config/pepper.conf");
}
function generateCode($length = 20) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {

        $code .= $chars[mt_rand(0,$clen)];
    }

    return $code;
}
function getCurrentMonth($offset = 0)
{
    $arr = [
        'январь',
        'февраль',
        'март',
        'апрель',
        'май',
        'июнь',
        'июль',
        'август',
        'сентябрь',
        'октябрь',
        'ноябрь',
        'декабрь'
    ];
    $month = date('n')-1 + $offset;
    return $arr[$month].' '.date('Y');
}
function getDaysInMonth($offset = 0)
{
    return cal_days_in_month(CAL_GREGORIAN, date('n') + $offset, date('Y'));
}