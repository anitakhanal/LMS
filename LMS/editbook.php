<?php include('header.php'); ?>
<?php

$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'library_management_system');
if (!$conn) {
    echo 'could not connect to the database' . mysqli_connect_error();
}
// Select book row from library


// Update library
if(isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $bookResult = mysqli_query($conn, "SELECT * FROM library WHERE book_id = $id");

    $book = mysqli_fetch_assoc($bookResult);
}

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        
        $name = $_POST['name'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $isbn_no = $_POST['isbn_no'];
        
        if($addbook = mysqli_query($conn, "UPDATE library SET name = '$name', author = '$author', price = $price', isbn_no = $isbn_no WHERE book_id = $id")){
            echo 'book updated';
        }
    }


?>


    

<div class="container">
    <div class="row">
        <div class="addlibrary m-auto">
            <h2 class="active font-bold text-success p-5"> Details Of Book </h2>


            <form action="" method="post">
                <div class="form-group">
                    <label> Book Name </label>
                    <input type="text" name="name" class="form-control" placeholder="enter book name" value="<?php echo $book['book_name']; ?>">
                </div>
                <div class="form-group">
                    <label> Book Author </label>
                    <input type="text" name="author" class="form-control" placeholder="enter author name" value="<?php echo $book['author']; ?>">
                </div>
                <div class="form-group">
                    <label> Book Price </label>
                    <input type="text" name="price" class="form-control" placeholder="enter price" value="<?php echo $book['price']; ?>">
                </div>
                <div class="form-group">
                    <label> ISBN_No</label>
                    <input type="text" name="isbn_no" class="form-control" placeholder="enter ISBN_No" value="<?php echo $book['isbn_no']; ?>">
                </div>
                <button class="btn btn-primary"> Update </button><a href="library.php"> -> Back to library </a>

            </form>
        </div>
    </div>
</div>
<?php include('footer.php');?>