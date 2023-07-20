<?php
session_start();
include 'server.php';

$id=$_SESSION['id'];

$select="SELECT *FROM signup WHERE id='$id'";
$query=mysqli_query($connect,$select);
$row=mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $lastname = $_POST['familiya'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $update="UPDATE signup SET `name`='$name',`last_name`='$lastname',`email`='$email',`phone`='$phone' WHERE `id`='$id'";
    $updquery=mysqli_query($connect,$update);
    if($updquery == true){
        $message="Malmot yangilandi";
    }
    else{
        $message="Xatolik!";
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
        <h1 class="text-center">Malumotni taxrirlash</h1>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="text" class="form-control mb-2" name="name" value="<?=$row['name']?>">
                    <input type="text" class="form-control mb-2" name="familiya" value="<?=$row['last_name']?>">
                    <input type="text" class="form-control mb-2" name="email" value="<?=$row['email']?>">
                    <input type="text" class="form-control mb-2" name="phone" value="<?=$row['phone']?>">
                    <button class="btn btn-success">Yuborish</button>
                </form>
                <h1 class="text-center text-success"><?=$message ?? '' ?></h1>
            </div>
        </div>
    </div>

    <?
    include 'js.php';
    ?>
</body>

</html>