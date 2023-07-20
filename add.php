<?
include 'server.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $last = $_POST['last'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $add = "INSERT INTO users(`ismi`,`familyasi`,`manzili`,`phone`) VALUES('$name','$last','$address','$phone')";
    $query = mysqli_query($connect, $add);
    if ($query == true) {
        $message = "Malumot yuklandi";
    } else {
        $message = "Xatolik!";
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
        <h1><?= $message ?? '' ?></h1>
    <?
    } else {
    ?>
        <div class="container mt-4">
            <h2 class="text-center">Malumot kiritish</h2>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Ism">
                        <input type="text" name="last" class="form-control mb-2" placeholder="Familyasi">
                        <input type="text" name="address" class="form-control mb-2" placeholder="Manzili">
                        <input type="text" name="phone" class="form-control mb-2" placeholder="Telefon">
                        <button class="btn btn-success">Yuborish</button>

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