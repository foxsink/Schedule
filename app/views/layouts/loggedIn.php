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

    <script type="text/javascript" src="/public/js/jQuery.js"></script>
    <script type="text/javascript" src="/public/js/addDoubleDot.js"></script>
    <script type="text/javascript" src="/public/js/edit.js"></script>
</head>
<body>
<header>


</header>
<div class="main">
    <div class="menu-main">
        <div class="menu-header">
            <h3 class="header"><?php echo $login;?></h3>
        </div>
        <div class="menu-body">
            <form method="post" action="/logout/">
                <div>
                    <input type="submit" value="Выйти!">
                    <?php if (!empty($pages)):?>
                        <?php foreach($pages as $page):?>
                            <?php if ($page['page_publish'] !== 'F' && $page['page_level'] >= $level):?>
                                <div>
                                    <br>
                                    <a href="/<?php echo $page['page_alias']?>" ><?php echo $page['page_title']?></a>
                                    <br>
                                    <?php echo $page['page_h1']?>
                                    <br>
                                    <?php echo $page['page_content']?>
                                    <br>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
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