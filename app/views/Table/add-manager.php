<h1>Добавить менеджера</h1>
<?php if (!empty($listOfManagers)):?>
    <?php foreach($listOfManagers as $manager):?>
            <div>
                <br>
                <?php echo $manager['manager_name'] . " "?>
                <?php echo $manager['manager_sname']?>
                <br>
            </div>
    <?php endforeach;?>
<?php endif;?>
<form method="post" action="/table/add-manager">
    <div>
        <p>Введите Имя</p>
        <p><input maxlength="25" size="40" name="manager_name"></p>
    </div>
    <div>
        <p>Введите Фамилию</p>
        <p><input maxlength="25" size="40" name="manager_sname"></p>
    </div>
    <div>
        <input type="submit" value="Добавить!" name="btn-add-manager">
    </div>
</form>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);