<?php if (!empty($pages)):?>
    <h1><?php echo $pages[0]['page_title']?></h1>
    <?php foreach($pages as $page):?>
        <?php if ($page['page_publish'] !== 'F'):?>
        <div>
            <br>
            <a href="/<?php echo $page['page_alias']?>" ><?php echo $page['page_title']?></a>
            <br>
            <?php echo $page['page_h1']?>
            <br>
            <?php echo $page['page_content']?>
            <br>
        </div>
        <?php endif;?>
    <?php endforeach;?>
<?php endif;?>
<?php
debug(\vendor\core\DB::$countSQL);
debug(\vendor\core\DB::$queries);

