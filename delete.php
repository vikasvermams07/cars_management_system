<?php require_once('database.php');?>
<?php

if(isset($_POST['delete'])){

$id=$_POST['id'];

$sql="DELETE FROM cars WHERE id=:id";

$stmt=$pdo->prepare($sql);

$stmt->execute([':id'=>$id]);

header("Location:home.php");

}

?>
