<?php

session_start();
if(!isset($_SESSION["password"])){
    header("Location: index.php");
    exit;
  }


  $username = 'root';
  $host = 'mysql:host=localhost;dbname=dbname';
  $password = '';
  try{
      $conncect = new PDO($host, $username, $password);
  
  }catch(PDOException $e){
      print $e->getMessage();
  }
  
  if(isset($_POST['postblogbtn'])){

    $blogvalue = $_POST['blogvalue'];
    $timestamp = time();
    $datum = date("d.m.Y - H:i", $timestamp);
    $tablename = "blogvalue";


  $sqlcommand = "INSERT INTO `$tablename` (`datum`, `inhalt`) VALUES ('$datum', '$blogvalue');";
  $command = $conncect->prepare($sqlcommand);
  $command->execute();

    echo "<script>alert('Dein Blog wurde gepostet!')</script>";
    echo "<script>alert('$sqlcommand')</script>";

  }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<!--Later install bootstrap with npm i bootstrap@5.3.0-alpha1 -->
</head>
<body>
    

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">AdminPanal</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="../index.php">Zu meinem Blog</a>
    <link rel="stylesheet" href="https://form.taxi/design/css/ft-form-styles-v3.css">
      </nav>
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="page-content">
      
    
    <!-- Your content goes here -->
  <center>
    <h1>Admin Login</h1>
    </center>


<center>

<form action="loged.php" method="post">

<div>
  <textarea cols="250" rows="20" name="blogvalue" placeholder="Post Your Blog"></textarea>
</div>
<input type="submit" name="postblogbtn" value="PostBlog" style="background-color: green; color: white; height: 40px; width: 120px; border: 0px; border-radius: 8px; margin-top: 10px;">
</form>

</center>


  </div>
  </main>
</div>


</body>
</html>