<?php 
include('./dbcon.php');
	session_start();

   if (!isset($_SESSION['id'])) {
     header('location:login.php');
  }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello</title>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Auth student curd</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student.php">Student</a>
      </li>
      <li class="nav-item">
      <?php
      if (isset($_SESSION['id'])) {
        $name=explode(' ', $_SESSION['name']);
        echo "<span>Welcome:&nbsp".strtoupper($name[0]);
      }
      else{
      ?>
      <a href="register.php"><span class="nav-link"></span> Register</a>
    <?php } ?>
    
      </li>
      <li>
        <?php
        if (isset($_SESSION['id'])) {?>
        <a href="logout.php" class="nav-link">Logout</a>
        <?php } else{?>
      </li>

      <li><a href="login.php"><span class="nav-link"></span> Login</a>
        <?php } ?>
      </li>
      
      
    </ul>
  </div>
</nav>


   
<div class="container mt-5">
    <h1>User Data</h1><br>
    <a href="Add_user.php" class="btn btn-success">Add User</a>
    <table class="table mt-2">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col"> Name</th>
      <th scope="col"> Email</th>
      <th scope="col"> Phone</th>
      <th scope="col">City</th>
      <th scope="col">Image</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include('./dbcon.php');
    $query="select * from users";
    $sql=mysqli_query($conn,$query);
    ?>
    <?php while($row=mysqli_fetch_assoc($sql)) { ?>
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td class="table-primary"><?php echo $row['name']?></td>
      <td class="table-secondary"><?php echo $row['email']?></td>
      <td class="table-success"><?php echo $row['phone']?></td>
      <td class="table-danger"><?php echo $row['city']?></td>
      <td><img src="upload/<?php echo $row['image'];?>" alt=""height="60px" width="50px"></td>
      
      
      <td class="table-warning"><a href="update.php?id=<?= $row['id'];?>" class="btn btn-success">Update</a></td>
      <td class="table-info"><a href="delete.php?delete=<?= $row['id'];?>" class="btn btn-danger">Delete</a></td>
      
    </tr>
    <?php } ?>
  </tbody>
</table>
   
</div>

 



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>