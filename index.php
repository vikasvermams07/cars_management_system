<?PHP 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <?php require_once('bootstrap.php');?>
</head>
<body>
<?php require_once('database.php');?>
    <div class="container" style="padding:100px;">
            <div style="background-color:whitesmoke;padding:20px">
            <form action="index.php" method="post" class="form-group">

        <h1>Login</h1>

        <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter Username" required> 
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="Password" name="password" class="form-control" placeholder="Enter Password" required> 
        </div>
        
        <div class="form-group">
        <button class="btn btn-success" name="login" value="login">LogIn</button>
        <a class="btn btn-danger" href="register.php">Register</a>
        </div>


    </form>
            </div>
    </div>

    <?php
    
    if(isset($_POST['login'])){

        $username=$_POST['username'];
        $password=$_POST['password'];
echo $username." ".$password;
        $sql="SELECT * FROM user WHERE username=:username AND password=:password";
        
        $stmt=$pdo->prepare($sql);

        $count=$stmt->execute([':username'=>$username,':password'=>$password]);

    
$count=$stmt->rowCount();
       
if($count>0){
    
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    header('Location:home.php');
}
    }
    
    ?>
</body>
</html>