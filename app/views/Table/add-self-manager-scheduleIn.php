<?php if(!isset($_POST['scheduled']) && !isset($_POST['entered'])):?>
    <?php foreach ($months as $time => $month): ?>
        <div class="aMonth">
            <?php echo $month?>
                <?php for($i = 1; $i <= $days[$time]; $i++): ?>
                    <form action="" method="post">
                            <input type="checkbox" name="<?php echo date("Y-m-", strtotime("$time")) . addZero($i) ?>" value="checked">
                            <?php echo $i?>

                <?php endfor;?>
        </div>
    <?php endforeach;?>
    <div>
        <input type="submit" name="scheduled" value="Next!">
    </form>
    </div>
<?php elseif(isset($_POST['entered'])): ?>
    <h1><?php echo "Данные успешно сохранены!" ?></h1>
<?php else:?>
    <div>
        <?php foreach ($dates as $key => $date):?>
            <div>
                <?php echo "$date"?>
                <form action="" method="post">
                    <p>
                        Время начала:
                        <input type="text" id="time" name="<?php echo $date . "start"?>" placeholder="__:__" maxlength="5" size="5">
                    </p>

                    <p>
                        Время окончания:
                        <input type="text" id="time" name="<?php echo $date . "end"?>" placeholder="__:__" maxlength="5" size="5">
                    </p>
                    <p>
                        Что сделано:
                        <input type="text" name="<?php echo $date . "desc"?>">
                    </p>
            </div>
        <?php endforeach;?>
        <input type="submit" name="entered" value="Save!">
        </form>
    </div>
<?php endif;?>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);