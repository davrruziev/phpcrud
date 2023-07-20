<?php
include 'server.php';

$select = "SELECT *FROM filies";
$imgquery = mysqli_query($connect, $select);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?
    include 'css.php';
    ?>
</head>

<body>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
            <?
            for ($data = []; $imgrow = mysqli_fetch_assoc($imgquery); $data[] = $imgrow) {
            ?>
                <div class="col">
                    <div class="card">
                        <img src="<?= $imgrow['file'] ?>" class="card-img-top" alt="...">
                    </div>
                </div>
            <?
            }
            ?>

        </div>
    </div>
    <?
    include 'js.php';
    ?>
</body>

</html>