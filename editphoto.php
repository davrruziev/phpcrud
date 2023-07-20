<?php
session_start();

$id = $_SESSION['id'];

include 'server.php';

$select = "SELECT * FROM signup WHERE id='$id'";
$query = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($query);

$file = $row['photo'];
if (isset($_GET['del'])) {
    if (file_exists($file)) {
        if (unlink($file)) {
            $message= "Fayl o'chirildi";
        } else {
            $message= "Faylni o'chirishda xatolik";
        }
    } else {
         $message="FAYL o'cirilgan";
    }
}
if (file_exists($file)) {
} 
else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $imgname = $_FILES['photo']['name'];
            $imgpath = uniqid().$imgname;
            move_uploaded_file($_FILES['photo']['tmp_name'], "signup/".$imgpath);
            $imgurl = "signup/".$imgpath;
            $addphoto = "UPDATE signup SET photo='$imgurl' WHERE id='$id'";
            $addquery = mysqli_query($connect, $addphoto);
            if ($addquery == true) {
                $message = "Fayl yangilandi!";
            } else {
                $message = "Fayl yangilashda xatolik!";
            }
        }
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
        <div class="h1 text-center">Rasmni o'zgartirish</div>
        <div class="row">
            <?
            if (file_exists($file)) {
            ?>
                <div class="col-md-3">
                    <img src="<?=$row['photo'] ?>" class="img-fluid" alt="">
                </div>
            <?
            } else {
            ?>
                <div class="col-md-3">
                    <h1>Rasm serverdan o'chirilgan</h1>
                </div>
            <?
            }
            ?>

            <?

            if (file_exists($file)) {
            ?>
                <div class="col-md-6">
                    <a href="/editphoto.php?del=<?=$row['id'] ?>" class="btn btn-danger">Rasmni o'cirish</a>
                </div>
            <?
            } else {
            ?>
                <div class="col-md-6">
                    <form action="<? $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <input type="file" class="form-control mb-3" name="photo">
                        <button class="btn btn-success">Yangilash</button>
                    </form>
                    <h1 class="text-center text-primary"><?=$message ?? '' ?></h1>
                </div>
            <?
            }
            ?>

        </div>
    </div>

    <?
    include 'js.php';
    ?>
    <div>
        <div class="dVRBWK">

        </div>
        <div id="sss">
            
        </div>
    </div>
</body>

</html>