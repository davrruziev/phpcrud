<?php
session_start();
include 'server.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $login=$_POST['login'];
    $pass=md5($_POST['pass']);
  $select="SELECT *FROM signup WHERE `login`='$login'";
  $query=mysqli_query($connect,$select);
  $row=mysqli_fetch_assoc($query);

  if(!empty($login) && !empty($pass)){
         if($row['login'] == $login ){
            if($row['password'] == $pass){
               $_SESSION['auth'] = true;
               $_SESSION['id']=$row['id'];
               header('Location: index.php');
            }else{
                $message="Parol xato!";
            }

         }else{
            $message="Login band!";
         }
  }else{
    $message="Login va parolni kirting";
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
    <style>
        .row {
            height: 100vh;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1 class="text-center">Tizimga kirish</h1>
                <form action="<?$_SERVER['PHP_SELF']?>" method="POST">
                    <input type="text" class="form-control mb-3" name="login" placeholder="Login">
                    <input type="password" class="form-control mb-3" name="pass" placeholder="Parol">
                    <button class="btn btn-danger">Tizimga kiring</button>
                </form>
                <h1 class="text-center text-primary"><?=$message ?? '' ?></h1>
            </div>
        </div>
    </div>

    <?
    include 'js.php';
    ?>
</body>

</html>