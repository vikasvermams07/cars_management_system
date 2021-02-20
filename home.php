<?PHP 
session_start();
?>
<?php
if($_SESSION['username']=="" && $_SESSION['password']==""){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php require_once('bootstrap.php');?>
</head>
<body>

<?php require_once('navi.php');?>
<?php require_once('database.php');?>

<?php

$sql="SELECT * FROM cars";

$stmt=$pdo->prepare($sql);

$stmt->execute();

?>
<div class="container">
<h1>Cars Details</h1>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Car Name</th>
        <th>Brand Name</th>
        <th>Siter</th>
        <th>Fuel Type</th>
        <th>Added Date & Time</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['cname']?></td>
        <td><?=$row['bname']?></td>
        <td><?=$row['siter']?></td>
        <td><?=$row['fuel']?></td>
        <td><?=$row['time']?></td>
        <td>
        
        <form action="editcar.php" method="post">
        
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <button class="btn btn-warning btn-xs" name="edit" value="edit" Type="submit">Edit</button>
        </form>
        
        </td>
        <td>
        
        <form action="delete.php" method="post">
        
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <button class="btn btn-danger btn-xs" name="delete" value="delete" type="submit">Delete</button>
        </form>
        
        </td>
    </tr>
    
  
    
    <?php

}

?>
</table>
</div>
</body>
</html>