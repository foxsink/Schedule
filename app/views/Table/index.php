

<?php if (!empty($pages)):?>
        <h1><?php echo $pages[3]['page_title']?></h1>
<?php endif;?>
<?php if ($isLoggedIn):?>
<div>
    <a href="/table/add-seller">Добавить продавца</a>
    <a href="/table/add-seller-schedule-chose">Добавить расписание продавца</a>
    <a href="/table/add-sale-point">Добавить точку продаж</a>
    <?php echo "<br>";?>
    <?php echo "<br>";?>
    <a href="/table/add-manager">Добавить менеджера</a>
    <a href="/table/add-manager-schedule">Добавить расписание менеджера</a>
    <?php echo "<br>";?>
    <?php echo "<br>";?>
</div>
<?php endif;?>
<a href="/table/view-sellers-schedule">Расписание продавцов</a>
<a href="/table/view-managers-schedule">Расписание менеджеров</a>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);