<?PHP 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cars</title>
    <?php require_once('bootstrap.php');?>
</head>
<body>

<?php require_once('navi.php');?>
<?php require_once('database.php');?>

<div class="container" style="padding:100px">
<?php

if(isset($_POST['edit'])){

    $id=$_POST['id'];

   

    $sql="SELECT * FROM cars WHERE id=:id";

    $stmt=$pdo->prepare($sql);

    $stmt->execute([':id'=>$id]);

    if($row=$stmt->fetch(PDO::FETCH_ASSOC)){



?>
    <div style="padding:20px;background-color:whitesmoke">
    <h1>Add New Car</h1>
        <form action="editcar.php" method="POST" class="form-group">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <div class="form-group">
        <label>Car Name</label>
        <input type="text" name="cname" class="form-control" placeholder="Enter Car Name" required value="<?=$row['cname'];?>">
        </div>

        <div class="form-group">
        <label>Brand Name</label>
        <input type="text" name="bname" class="form-control" placeholder="Enter Brand Name" required value="<?=$row['bname']?>">
        </div>

        <div class="form-group">
        <label>Siter</label>
        <input type="text" name="siter" class="form-control" placeholder="Enter Number of sits" required value="<?=$row['siter']?>">
        </div>

        <div class="form-group">
        <label>Fuel Type</label>
        <input type="text" name="fuel" class="form-control" placeholder="Enter type of fuel" required value="<?=$row['fuel']?>">

        </div>
        

        <div class="form-group">
       <button name="Update" value="Update" class="btn btn-success" type="submit">Update</button>
        </div>

        </form>
             
 <?php
    }
}
 ?>
    </div>

</div>
    <?php 
    
    if(isset($_POST['Update'])){
        $id=$_POST['id'];
        $cname=$_POST['cname'];
        $bname=$_POST['bname'];
        $siter=$_POST['siter'];
        $fuel=$_POST['fuel'];

        $sql="UPDATE cars SET cname=:cname,bname=:bname,siter=:siter,fuel=:fuel WHERE id=:id" ;
        
        $stmt=$pdo->prepare($sql);

        $stmt->execute([':id'=>$id,':cname'=>$cname,':bname'=>$bname,
                        ':siter'=>$siter,':fuel'=>$fuel]);

        header('Location:home.php');
    
    }
    
    ?>
</body>
</html>