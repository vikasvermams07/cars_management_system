
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><?php echo $_SESSION['username'];?></a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="home.php">Home</a></li>
      <li><a href="addcars.php">Add Cars</a></li>
      
    </ul>
    <ul class="nav navbar-nav" style="float:right">

      <li><a href="logout.php">LogOut</a></li>
      
    </ul>
  </div>
</nav>