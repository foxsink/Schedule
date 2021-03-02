<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="application name" content="Schedule">
    <meta name="author" content="FoxSink">

    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title><?php if (isset($info))
        {
            echo $info[0]['page_title'];
        } ?></title>

<!--    --><?php //if (isset($info))
//            {
//                echo $info[0]['page_alias'];
//            } ?>
</head>
<body>
    <h3>Вы не вошли</h3>
    <form method="post" action="/login">
        <div>
            <p>Введите логин</p>
            <p><input maxlength="25" size="40" name="login"></p>
        </div>
        <div>
            <p>Введите пароль</p>
            <p><input type="password" maxlength="25" size="40" name="password"></p>
        </div>
        <div>
            <input type="submit" value="Войти!" name="btn-submit">
        </div>
    </form>
    <div>
        <?php
        echo $content;
        ?>
    </div>
</body>
</html>
