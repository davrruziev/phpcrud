<?
include 'server.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_FILES['rasm']) && $_FILES['rasm']['error'] == 0) {
        $type = ['jpg' => 'image/jpg', 'gif' => 'image/gif', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'JPG' => 'image/jpg', 'JPEG' => 'image/jpeg'];
        $imgname = $_FILES['rasm']['name'];
        $imgtype = $_FILES['rasm']['type'];
        $imgsize = $_FILES['rasm']['size'];

        $pathinfo = pathinfo($imgname, PATHINFO_EXTENSION);
        if (!array_key_exists($pathinfo, $type)) die('Mavjut formatda yuklang');

        $maxsize = 2 * 1024 * 1024;
        if ($imgsize > $maxsize) die('Rasm hajmi 2MB katta');

        if (in_array($imgtype, $type)) {
            if (file_exists("file/" . $imgname)) {
                echo "Fayl mavjud";
            } else {
                move_uploaded_file($_FILES['rasm']['tmp_name'], "file/" . $imgname);
                $imgurl = "file/" . $imgname;
                $name = $_POST['name'];
                $add = "INSERT INTO `filies`(`name`,`file`) VALUES('$name','$imgurl')";
                $query = mysqli_query($connect, $add);
                if ($query == true) {
                    echo "Fayl bazaga yuklandi, ";
                } else {
                    echo "Yuklashda xatolik";
                }
                echo "Fayl yuklandi";
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
        <h2 class="text-center">Fayl yuklash</h2>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" class="form-control mt-2" placeholder="Filename">
                    <input type="file" name="rasm" class="form-control mt-2">
                    <button class="btn btn-success mt-2">Yuklash</button>
                </form>
            </div>
        </div>
    </div>

    <?
    include 'js.php';
    ?>
</body>

</html>