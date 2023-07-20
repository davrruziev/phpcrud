<?
session_start();
include 'server.php';

$id=$_SESSION['id'];
$select="SELECT * FROM signup WHERE id='$id'";
$query=mysqli_query($connect,$select);
$row=mysqli_fetch_assoc($query);


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHPCRUD</title>
  <?
  include 'css.php';
  ?>
</head>

<body>
  <?
  include 'menu.php';
  ?>
  <?
  if (isset($_SESSION['auth'])) {
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-3 mt-3">
            <img src="<?=$row['photo']?>" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 mt-3 text-center">
            <h2><?=$row['name']?> <?=$row['last_name']?></h2>
            <h3><?=$row['email']?></h3>
            <h3><?=$row['phone']?></h3>
        </div>
        <div class="col-md-3">
            <a href="/edituser.php" class="btn btn-primary mt-3 mb-3 ">Malumotlarni taxrirlash</a>
            <a href="/editpassword.php" class="btn btn-info mb-3">Parolni almashtirish</a>
            <a href="/editphoto.php" class="btn btn-success mb-3">Rasmni almashtirish</a>
        </div>
      </div>
    </div>
  <?
  }else{
    echo "<h1 class='text-center'>Tizimga kiring!</h1>";
  }
  ?>


  <?
  include 'js.php';
  ?>
</body>

</html>