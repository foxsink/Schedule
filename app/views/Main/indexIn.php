<?php if (!empty($info)):?>
    <h1><?php echo $info[0]['page_title']?></h1>
<?php endif;?>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);

