<table>
    <?php if(isset($schedule)):?>
        <?php for($i = 0; $i < count($schedule); $i++):?>
            <tr>
                <?php foreach ($schedule[$i] as $string => $value):?>

                        <td>
                            <?php if($string === 'start_time'):?>
                                <?php echo "Начало:"?>
                                <?php echo $value?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($string === 'end_time'):?>
                                <a href="#" onclick="editEnd_time(<?php echo $i?>)" id="editEnd_time<?php echo $i?>"><?php echo "Изменить"?></a>
                                <p id="end_time<?php echo $i?>"><?php echo "Конец:"?></p>
                                <?php echo $value?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($string === 'diff_time'):?>
                                <?php echo "Отработано времени:"?>
                                <?php echo $value?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($string === 'description'):?>
                                <a href="#" onclick="editEnd_time(<?php echo $i?>)" id="edit<?php echo $i?>"><?php echo "Изменить"?></a>
                                <p id="desc<?php echo $i?>"><?php echo "Описание:"?></p>
                                <?php echo $value?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($string === 'description'):?>


                            <?php endif; ?>
                        </td>

                <?php endforeach; ?>
            </tr>
        <?php endfor;?>
    <?php endif; ?>
</table>
