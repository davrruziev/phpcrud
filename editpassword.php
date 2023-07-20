<?php
session_start();
include 'server.php';
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $oldpass = md5($_POST['oldpass']);
    $newpass = $_POST['newpass'];
    $renewpass = $_POST['renewpass'];

    $select = "SELECT * FROM signup WHERE id='$id'";
    $query = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($query);
    if ($row['password'] == $oldpass) {
        if (!empty($newpass) && !empty($renewpass)) {
            if ($newpass == $renewpass) {
                $hashpass = md5($newpass);
                $updpass = "UPDATE signup SET `password`='$hashpass' WHERE `id`='$id'";
                $updres = mysqli_query($connect, $updpass);
                if ($updres == true) {
                    $message = "Parol yangilandi";
                } else {
                    $message = "Xatolik!";
                }
            } else {
                $message = "Parollar teng emas";
            }
        } else {
            $message = "Yangi va takroriy parolni kiriting";
        }
    } else {
        $message = "joriy parol xato";
    }
}


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
    <?
    include 'menu.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class="text-center">Parolni almashtirish</h2>
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="password" class="form-control mb-5" name="oldpass" placeholder="Eski parolni kiting">
                    <input type="password" class="form-control mb-3" name="newpass" placeholder="Yangi parolni kiting">
                    <input type="password" class="form-control mb-3" name="renewpass" placeholder="Takroriy parolni kiting">
                    <button class="btn btn-primary">Yangilash</button>
                </form>
                <h1 class="text-center"><?=$message ?? '' ?></h1>
            </div>
        </div>
    </div>

    <?
    include 'js.php';
    ?>
</body>

</html>