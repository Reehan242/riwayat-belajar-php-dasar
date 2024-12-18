<?php
// //pengulangan

// // for 
// for ($i=0; $i <= 20; $i++){
//     echo "ini perulangan for ke $i <br>";
// }

// //while
// $i = 0;
// while($i <= 20) {
//     echo ("ini perulangan while ke - $i <br>");
//     $i++;
// }

// //do while
// $i = 0;
// do {
//     echo "ini perulangan do while ke-$i <br>";
//     $i++;
// } while ($i <=20)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
    <style>
        .warna-baris {
            background-color: silver;
        }
        .warna-baris2 {
            background-color: red;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php
        // for( $i = 1; $i <= 3; $i++){
        //     echo "<tr>";
        //     for($j = 1; $j <= 5; $j++){
        //         echo "<td>$i,$j</td>";
        //     }
        //     echo "</tr>";
        // }
        ?>

        <?php for( $i = 1; $i <= 5; $i++) :?>
            <?php if($i %2 == 1) :?>
                <tr class="warna-baris">
            <?php else :?>
                <tr class="warna-baris2">
            <?php endif;?>
                <?php for($j =1; $j <=5; $j++) :?>
                    <td><?= "$i,$j";?></td>
                <?php endfor;?>
            </tr>
        <?php endfor;?>



    </table>
</body>

</html>