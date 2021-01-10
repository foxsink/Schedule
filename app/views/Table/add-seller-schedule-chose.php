<h1>Добавить расписание продавца</h1>

<form method="post" action="/table/add-seller-schedule-chose">
    <div>
        <?php if (!empty($listOfSellers)): ?>
            <?php foreach ($listOfSellers as $seller): ?>
                <div>
                    <p>
                        <a href="add-seller-schedule/<?php echo $seller['seller_id']?>"> <?php echo $seller['seller_name'] . " " ?>
                        <?php echo $seller['seller_sname'] ?></a>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</form>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);