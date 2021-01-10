<h1>Добавить точку продаж</h1>
<?php if (!empty($listOfPoints)):?>
    <?php foreach($listOfPoints as $point):?>
            <div>
                <br>
                <?php echo $point['point_name']?>
                <br>
            </div>
    <?php endforeach;?>
<?php endif;?>
<form method="post" action="/table/add-sale-point">
    <div>
        <p>Введите название точки</p>
        <p><input maxlength="25" size="40" name="sale_point_name"></p>
    </div>
    <div>
        <input type="submit" value="Добавить!" name="btn-add-sale-point">
    </div>
</form>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);