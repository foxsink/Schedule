<h1>Добавить продавца</h1>
<?php if (!empty($listOfSellers)):?>
    <?php foreach($listOfSellers as $seller):?>
            <div>
                <br>
                <?php echo $seller['seller_name'] . " "?>
                <?php echo $seller['seller_sname']?>
                <br>
            </div>
    <?php endforeach;?>
<?php endif;?>
<form method="post" action="/table/add-seller">
    <div>
        <p>Введите Имя</p>
        <p><input maxlength="25" size="40" name="seller_name"></p>
    </div>
    <div>
        <p>Введите Фамилию</p>
        <p><input maxlength="25" size="40" name="seller_sname"></p>
    </div>
    <div>
        <input type="submit" value="Добавить!" name="btn-add-seller">
    </div>
</form>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);