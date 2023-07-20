<?
session_start();
include 'server.php';

$select = "SELECT * FROM users";
$query = mysqli_query($connect, $select);




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
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <th>Ismi</th>
          <th>Familyasi</th>
          <th>manzili</th>
          <th>Telefonnomer</th>
        </tr>
        
        <?
        for ($data = []; $row = mysqli_fetch_assoc($query); $data[] = $row) {
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['ismi'] ?></td>
            <td><?= $row['familyasi'] ?></td>
            <td><?= $row['manzili'] ?></td>
            <td><?= $row['phone'] ?></td>
          </tr>
        <?
        }
        ?>

      </table>
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