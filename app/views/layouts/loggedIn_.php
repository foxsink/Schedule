<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="application name" content="Schedule">
    <meta name="author" content="FoxSink">

    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>
        <?php if (isset($info)):?>
            <?php echo $info[0]['page_title']; ?>
        <?php endif;?>
    </title>
    <script type="text/javascript" src="/public/js/jQuery.js"></script>
    <script type="text/javascript" src="/public/js/addDoubleDot.js"></script>


</head>
<body>

            <h3><?php echo $login;?></h3>
            <form method="post" action="/logout/">
                <div>
                    <input type="submit" value="Выйти!">
                </div>
            </form>
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
        <div class="content-body">
            <?php
            echo $content;
            ?>
        </div>

</body>
</html>