
<?php
$conn="mysql:host=localhost;dbname=cars";
        
        try{
$pdo=new PDO($conn,'root','');

}catch(Exception $e){
echo $e->getMessage();
}

?>