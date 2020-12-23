<?php include('header.php'); ?>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'library_management_system');
if (!$conn) {
    echo 'could not connect to the database' . mysqli_connect_error();
}
$username = "";
$password = "";
$errors = array();

if (isset($_POST['register'])) {
    if (empty($_POST['username'])) {
        array_push($errors, 'Username is required!');
    } else if (!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
        array_push($errors, 'Username must be email address!');
    } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    }

    if (empty($_POST['password'])) {
        array_push($errors, 'password must be required!');
    } else {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $password = md5($password);
    }

    if(count($errors) == 0){
        if($result = mysqli_query($conn, "INSERT INTO login (username , password) VALUES('$username','$password')")){
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            $_SESSION['success_msg'] = 'user register sucessfully';
            header('location:login.php');
        } else{
            echo mysqli_error($conn);
        }


    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="col-lg-4 m-auto">
                <div class="login-form mt-5">
                    <?php if (isset($_SESSION['success_msg'])) : ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['success_msg']; ?>
                        </div>
                    <?php endif; ?>

                    <h2 class="text-center text-success font-bold">Register New account</h2>
                    <?php
                    if (count($errors) > 0) :
                        foreach ($errors as $err) {
                            echo '<div class="alert alert-danger" role="alert">' . $err . '</div>';
                        }
                    endif;
                    ?>

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" name="username" id="username" class="form-control" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button name="register" class="btn btn-primary">Register</button>
                    </form>

                    <div class="">If you already have an account <a href="login.php">Login here</a></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>