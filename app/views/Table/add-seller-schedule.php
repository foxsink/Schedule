<h1>Добавить расписание продавца</h1>

<form method="post" action="/table/add-seller-schedule">
    <div>
        <?php if ($id && !empty($listOfSellers)): ?>
            <?php foreach ($listOfSellers as $seller ): ?>
                <?php if ($seller['seller_id'] === $id): ?>
                <div>
                    <h2>
                        <?php echo $seller['seller_name'] . " " ?>
                        <?php echo $seller['seller_sname'] ?>
                    </h2>
                    <p><?php echo getCurrentMonth(); ?></p>
                    <div class="content-body-schedule">


                            <?php if (!empty($listOfPoints)): ?>
                                <?php foreach ($listOfPoints as $point ): ?>
                                    <div class="content-body-schedule-one">
                                        <p><?php echo $point['point_name'] . " " ?></p>
                                    <?php for($i = 1; $i <= getDaysInMonth(); $i++):?>
                                       <p><input type="checkbox" name="<?php echo $i . date('M') . $point['point_id'] ?>"><?php echo $i?></p>
                                    <?php endfor; ?>
                                    </div>


                                <?php endforeach; ?>
                            <?php endif; ?>

                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit" value="Добавить!" name="btn-submit-schedule">
    </div>
</form>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);