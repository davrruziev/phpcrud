<?
include 'server.php';

$id=$_GET['id'];
if(isset($id)){
    $select="SELECT * FROM users WHERE id='$id'";
    $query=mysqli_query($connect,$select);
    $row=mysqli_fetch_assoc($query);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $last = $_POST['last'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $update="UPDATE users SET `ismi`='$name',`familyasi`='$last',`manzili`='$address',`phone`='$phone' WHERE `id`='$id'";
    $res=mysqli_query($connect,$update);
    if($res == true){
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
    <?
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    ?>
        <h1><?= $message ?></h1>
    <?
    } else {
    ?>
        <div class="container mt-4">
            <h2 class="text-center">Malumot yangilash</h2>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Ism" value="<?=$row['ismi']?>">
                        <input type="text" name="last" class="form-control mb-2" placeholder="Familyasi" value="<?=$row['familyasi']?>">
                        <input type="text" name="address" class="form-control mb-2" placeholder="Manzili" value="<?=$row['manzili']?>">
                        <input type="text" name="phone" class="form-control mb-2" placeholder="Telefon" value="<?=$row['phone']?>">
                        <button class="btn btn-success">Yangilash</button>

                    </form>
                   
                </div>
            </div>
        </div>

    <?
    }
    ?>

    <?
    include 'js.php';
    ?>
</body>

</html>