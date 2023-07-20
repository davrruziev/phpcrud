
<?
include 'server.php';

$select="SELECT * FROM users";
$query=mysqli_query($connect,$select);




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
  <div class="container">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
             <th>Ismi</th>
             <th>Familyasi</th>
             <th>manzili</th>
             <th>Telefonnomer</th>
             <th></th>
        </tr>
        <?
        for ($data=[];$row=mysqli_fetch_assoc($query);$data[]=$row ) { 
           ?>
             <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['ismi']?></td>
            <td><?=$row['familyasi']?></td>
            <td><?=$row['manzili']?></td>
            <td><?=$row['phone']?></td>
            <td><a href="delete.php?id=<?=$row['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
        </tr>
           <? 
        }
        ?>
        
    </table>
  </div>

    <?
    include 'js.php';
    ?>
  </body>
</html>

