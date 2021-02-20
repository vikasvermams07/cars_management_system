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

    <div style="padding:20px;background-color:whitesmoke">
    <h1>Add New Car</h1>
        <form action="addcars.php" method="POST" class="form-group">
        
        <div class="form-group">
        <label>Car Name</label>
        <input type="text" name="cname" class="form-control" placeholder="Enter Car Name" required>
        </div>

        <div class="form-group">
        <label>Brand Name</label>
        <input type="text" name="bname" class="form-control" placeholder="Enter Brand Name" required>
        </div>

        <div class="form-group">
        <label>Siter</label>
        <input type="text" name="siter" class="form-control" placeholder="Enter Number of sits" required>
        </div>

        <div class="form-group">
        <label>Fuel Type</label>
      <select name="fuel" class="form-control" required>  
                <option value="">-</option>
                <option value="petrol">Petrol</option>
                <option value="diesel">Diesel</option>
                <option value="cng">CNG</option>
      </select>
        </div>
        

        <div class="form-group">
       <button name="add" value="add" class="btn btn-success">Add</button>
        </div>

        </form>
    </div>

</div>
    <?php 
    
    if(isset($_POST['add'])){

        $cname=$_POST['cname'];
        $bname=$_POST['bname'];
        $siter=$_POST['siter'];
        $fuel=$_POST['fuel'];

        $sql="INSERT INTO cars (cname,bname,siter,fuel) VALUES (:cname,:bname,:siter,:fuel)";
        
        $stmt=$pdo->prepare($sql);

        $stmt->execute([':cname'=>$cname,':bname'=>$bname,
                        ':siter'=>$siter,':fuel'=>$fuel]);

        header('Location:home.php');
    
    }
    
    ?>
</body>
</html>