<?
include 'server.php';
$id=$_GET['id'];

if($_SERVER['REQUEST_METHOD']=="GET"){
    $delete="DELETE FROM users WHERE id='$id'";
    $query=mysqli_query($connect,$delete);

    if($query == true){
        $message="Malumot bazadan o'cirildi!";
    }
    else{
        $message="Malumot bazadan o'chmadi!";
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
            <h2 class="text-success text-center"><?=$message?></h2>
        </div>
     </div>
    <?
    include 'js.php';
    ?>
</body>
</html>