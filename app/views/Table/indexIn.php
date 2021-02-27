<?php if (!empty($info)):?>
    <h1><?php echo $info[0]['page_title']?></h1>
<?php endif;?>
<div>
    <?php echo "<br>";?>
    <?php echo "<br>";?>
    <?php if (1 >= $level):?>
        <a href="/table/add-manager">Добавить менеджера</a>
        <a href="/table/add-managers-schedule">Добавить расписание менеджеров</a>
        <a href="/table/view-managers-schedule">Посмотреть расписание менеджеров</a>
    <?php endif;?>
    <?php if (2 == $level):?>
        <a href="/table/add-self-manager-schedule">Добавить свое расписание</a>
        <a href="/table/view-self-manager-schedule">Посмотреть свое расписание</a>
    <?php endif;?>

    <?php echo "<br>";?>
    <?php echo "<br>";?>
</div>

<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);