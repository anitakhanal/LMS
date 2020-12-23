<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIBRARY MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css" class="href">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-expand-lg  bg-dark">
         <div class="image">
             <img src="img/img1.jpg">
         </div>
            <a class="navbar-brand" href="#"> LIBRARY MANAGEMENT SYSTEM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link active text-danger" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="library.php">LIBRARY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">ADMIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FEEDBACK</a>
                    </li>
                    <button name="login" class="btn btn-primary"> LOGIN </button>

 
                </ul>
            </div>
        </nav>
        <div class="box">
            <h3> WELCOME TO LIBRARY </h3> <br>
            <h1 style="font-size:2rem"> open at: 09:00 am </h1> <br>
            <h1 style="font-size:2rem"> close at: 05:00 pm</h1>
        </div>
        <?php include('footer.php'); ?>
      
        
        
    



