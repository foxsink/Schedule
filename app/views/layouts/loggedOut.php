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
<header>


</header>
<div class="main">
    <div class="menu-main">
        <div class="menu-header">
            <h3 class="header">Вы не вошли</h3>
        </div>
        <div class="menu-body">
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


        </div>
    </div>
    <div class="content-main">
        <div class="content-header">
            <h3 class="header"></h3>
        </div>
        <div class="content-body">
            <?php
            echo $content;
            ?>
        </div>

    </div>
</div>

</body>
</html>
