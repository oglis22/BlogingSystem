<?php

$username = 'root';
$host = 'mysql:host=localhost;dbname=dbname';
$password = '';
try{
    $conncect = new PDO($host, $username, $password);

}catch(PDOException $e){
    print $e->getMessage();
}

$sqlCommand = 'select * from admindata';
$abfrage = $conncect->prepare($sqlCommand);
$abfrage->execute();
$value = $abfrage->fetchAll();
try{
    foreach($value as $zeile){
   
   
        if($_POST['password'] == $zeile['PASSWORD']){
            session_start();
            $_SESSION["password"] = "test";
            header("Location: loged.php");
        }else{
 
        }
       
    
    
    }
}catch(Exception $e){
    print $e->getMessage();
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
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
      <span class="mdl-layout-title">MyBlog AdminLogin</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="../index.php">To My Blog</a>

      </nav>
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="page-content">
        
    <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">MyBlog Admin Login</h3>

            <form action="index.php" method="post">

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" name="password"/>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
  </main>
</div>


</body>
</html>