<?php if (!empty($info)):?>
    <h1><?php echo $info[0]['page_title']?></h1>
<?php endif;?>
    <form method="post" action="">
        <div>
            <p>Генерация пароля</p>
            <p><input maxlength="25" size="40" name="generate"></p>
        </div>
        <div>
            <input type="submit" value="Сгенерировать!" name="btn-submit">
        </div>
    </form>
<?php if (!empty($_POST['generate'])):?>
<?php echo getHashedPass($_POST['generate'])?>
<?php endif;?>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);

