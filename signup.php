<?
include 'server.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $lastname = $_POST['familiya'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $login = $_POST['login'];
    $pass = md5($_POST['pass']);
    $repass = md5($_POST['repass']);

    $select = "SELECT *FROM signup WHERE `login`='$login'";
    $res = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($res);
    if ($login !== $row['login']) {
        if (!empty($name) && !empty($lastname)) {
            if (!empty($email) && !empty($phone)) {
                if (!empty($login) && !empty($pass) && !empty($repass)) {
                    if ($pass == $repass) {
                        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                            $imgname = $_FILES['photo']['name'];
                            $imgpath = uniqid() . $imgname;
                            move_uploaded_file($_FILES['photo']['tmp_name'], "signup/" . $imgpath);
                            $imgurl = "signup/" . $imgpath;
                            $add = "INSERT INTO signup(`name`,`last_name`,`email`,`phone`,`login`,`password`,`photo`) VALUES ('$name','$lastname','$email','$phone','$login','$pass','$imgurl')";
                            $query = mysqli_query($connect, $add);
                            if ($query == true) {
                                $message = "Siz ro'yxatdan o'tdingiz!";
                            } else {
                                $message = "Siz ro'yxatdan otmadingiz!";
                            }
                        }
                    } else {
                        $message = "parol  va takroriy parol teng emas!";
                    }
                } else {
                    $message = "Login,parol va takroriy parolni kiriting! ";
                }
            } else {
                $message = "Email va Telefon nomerni kiriting!";
            }
        } else {
            $message = "Ism va Familiyani kiriting!";
        }
    }else{
        $message="Login band!";
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
    <div class="container">
        <h1 class="text-center">Ro'yxatdan o'tish</h1>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-control mb-2" name="name" placeholder="Ism">
                    <input type="text" class="form-control mb-2" name="familiya" placeholder="Familiya">
                    <input type="text" class="form-control mb-2" name="email" placeholder="Email">
                    <input type="text" class="form-control mb-2" name="phone" placeholder="Telefon">
                    <input type="text" class="form-control mb-2" name="login" placeholder="Login">
                    <input type="password" class="form-control mb-2" name="pass" placeholder="Parol">
                    <input type="password" class="form-control mb-2" name="repass" placeholder="Takroriy parol">
                    <input type="file" class="form-control mb-2" name="photo">
                    <button class="btn btn-success">Ro'yxatdan o'tish</button>
                </form>
                <h1 class="text-center text-success"><?= $message ?></h1>
            </div>
        </div>
    </div>

    <?
    include 'js.php';
    ?>
</body>

</html>