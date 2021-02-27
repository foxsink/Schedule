<?php


namespace app\controllers;

use app\models\AppModel;

class App extends \vendor\core\base\Controller
{

    public function signIn()
    {
        if(!$this->isLoggedIn()) {
            if (isset($_POST['btn-submit'])) {
                if (isset($_POST['login'])) {
                    if (isset($_POST['password'])) {
                        $model = new AppModel();
                        if($user = $model->findOne($_POST['login'])) {
                            if ($this->checkPassword($user) === true) {
                                if ($this->valid($user)) {
                                    return true;
                                } else {
                                    echo "Ошибка сохранения хэша";
                                }
                            } else {
                                $this->validateError();
                            }
                        }
                        else{
                            echo "Нет такого пользователя";
                        }
                    } else {
                        echo "Пароль не введен";
                    }
                } else {
                    echo "Логин не введен";
                }
            }
            return true;
        }
        return false;
    }
    public function isLoggedIn()
    {
        if(isset($_COOKIE['id']) && isset($_COOKIE['hash'])) {
            $model = new AppModel();
            $model->table = "users";
            $model->pk = "user_id";
            $user = $model->findOne($_COOKIE['id']);
            $hashes = $model->findBySQL("SELECT hash FROM hashes WHERE user_id = ?", [$_COOKIE['id']]);
            if ($this->checkHash($user, $hashes) === true) {
                $this->set(['login' => $user[0]['login'], 'level' => $user[0]['level']]);
                return true;
            }
        }
        return false;
    }
    public function checkHash($user, $hashes)
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
        {
            foreach ($hashes as $num => $hash) {
                if (($_COOKIE['id'] == $user[0]['user_id']) && ($_COOKIE['hash'] == $hash['hash'])) {
                    return true;
                }
            }
        }
        return false;

    }
    public function checkPassword($user)
    {
        $pepper = getPepper();
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        //$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
        $pwd_hashed = $user[0]['pass'];
        if (password_verify($pwd_peppered, $pwd_hashed))
        {
            return true;
        }
        return false;
    }
    public function valid($user)
    {
        $newhash = md5(generateCode());
        setcookie("id", $user[0]['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $newhash, time()+60*60*24*30, "/");
        $model = new AppModel();
        $model->table = "hashes";
        $model->pk = "user_id";
        if($model->query("INSERT INTO Schedule.hashes (user_id, hash) VALUES ('{$user[0]['user_id']}', '{$newhash}')"))
            return true;
        return false;

    }
    public function validateError()
    {
        echo "Ошибка входа";
    }
    public function logout()
    {
        $model = new AppModel();
        if($model->query("DELETE FROM Schedule.hashes WHERE hash = '{$_COOKIE['hash']}'")) {
            setcookie("id", null, -1, "/");
            setcookie("hash", null, -1, "/");
        }

    }
    public function getLevel()
    {
        $model = new AppModel();
        $model->table = "users";
        $model->pk = "user_id";
        $user = $model->findOne($_COOKIE['id']);
        return $user[0]['level'];
    }
    public function getMenu($class)
    {
        $model = new AppModel();
        $model->table = "pages";
        $model->pk = "page_alias";
        $pages = $model->findAll();
        $menuFor = lcfirst(str_replace("Controller", "", substr($class, strrpos($class, "Controller"))));
        $info = $model->findOne($menuFor);
        $this->set(compact( 'pages', 'info'));
    }
}