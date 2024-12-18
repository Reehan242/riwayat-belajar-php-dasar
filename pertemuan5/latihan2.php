<?php
$contoharray = [12,41,51,21,31,14,14,15161,611,2131];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }
        .clear {clear: both;}
    </style>
</head>
<body>
    <?php for($i = 0; $i<count($contoharray);$i++) {?>
    <div class="kotak"><?php echo $contoharray[$i];?></div>
    <?php }?>

    
    <div class="clear"></div>

    <?php foreach($contoharray as $a) {?>
        <div class="kotak"><?= $a;?></div>
    <?php }?>

    <div class="clear"></div>

    <?php foreach($contoharray as $a) :?>
        <div class="kotak"><?= $a;?></div>
    <?php endforeach;?>

</body>
</html>