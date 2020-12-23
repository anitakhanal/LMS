
<?php include('header.php') ?>


<?php
session_start();
$conn = mysqli_connect('localhost','root','', 'library_management_system');

if(!$conn){
    echo 'could not connect to the database' . mysqli_connect_error();

}
 $username ='';
 $password ='';
 $errors = array();
//  print_r($_POST);

 if(isset($_POST['login'])){
     if(empty($_POST['username'])){
         array_push($errors,'username must be required!');
     } else if(!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)){
         array_push($errors, 'username must be email.');
     } else{
         $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
     }
     if(empty($_POST['password'])){
         array_push($errors, 'password must be required!');
     } else{
         $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
         $password = md5($password);

     }
     if(count($errors) == 0){
         if($result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username' AND password = '$password'")){
             if(mysqli_num_rows($result) > 0 ){
                 while($row = mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['logged_in'] = true;
                    $_SESSION['success_msg'] = 'User login successful';
                    header('location:home.php');
                 }
             } else{
                 array_push($errors, 'invalid username and password');
             }

         }else{
             mysqli_connect_error($conn);
         }
     }
 }

 ?>

<style>
    body {
        background-image: url(" https://images.pexels.com/photos/1375261/pexels-photo-1375261.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
        background-size: cover;
        height: 100vh;
        width: 100%;
        background-position: center;
        

    }



    .form-wrapper {
        background-color: #80808073;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 35%;
        padding: 54px 64px;
    }

    .form-wrapper h3 {
        margin-bottom: 30px;
        text-align:center;
        font-size:40px;
    }
    label{
        font-weight: 700;
        margin-bottom:0;
    }

    .form-wrapper input {
        padding: 20px;
        margin-bottom: 20px;
        border: none;
    }
</style>

<body>
    <div class="form-wrapper">
        <h3> Login Form </h3>
        <?php
        if(count($errors)>0):
            foreach($errors as $err){
                echo '<div class="alert alert-danger" role="alert">' .$err .'</div>';
            }
            endif;

        


        ?>
        <form action="" class="form-group" method="post" autocomplete="off">
            <label> Username </label>
            <input type="email" name="username" class="form-control" placeholder="Enter your Email" required>

            <label> Password </label>
            <input type="password" name = "password" class="form-control" placeholder="Enter your Password" required>
            <button name ="login" class="btn btn-primary"> Login</button>
    </form>
    <div class="">If you don't have an account <a href="register.php">Register here</a></div>
    