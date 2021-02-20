<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php require_once('bootstrap.php');?>
</head>
<body>
<?php require_once('database.php');?>
    <div class="container" style="padding:100px;">
            <div style="background-color:whitesmoke;padding:20px">
            <form action="register.php" method="POST" class="form-group">

        <h1>Register</h1>

        <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" required> 
        </div>

        <div class="form-group">
        <label>Email Id</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email" required> 
        </div>
        
        <div class="form-group">
        <label>contact Number</label>
        <input type="text" name="number" class="form-control" placeholder="Enter Contact Number" required> 
        </div>

        <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter Username" required> 
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="Password" name="password" class="form-control" placeholder="Enter Password" required> 
        </div>
        
        <div class="form-group">
        <button type="submit" class="btn btn-success" name="register" value="register">Register</button>
        <a class="btn btn-warning" href="index.php">LogIn</a>
        </div>


    </form>
            </div>
    </div>

    <?php
    if($_POST['register']){

        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql='INSERT INTO user(name,email,number,username,password) VALUES (:name,:email,:number,:username,:password)';

        $stmt=$pdo->prepare($sql);

        $count=$stmt->execute([':name'=>$name,':email'=>$email,
                        ':number'=>$number,':username'=>$username,
                        ':password'=>$password]);

       if($count>0){
           
           header('Location:index.php');
           
       }else{

            echo "<div class='alert alert-danger'>Something is Wrong</div>";
       }
    }
    
    ?>
</body>
</html>