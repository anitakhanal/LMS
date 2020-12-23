<?php include('header.php'); ?>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'library_management_system');
if (!$conn) {
    echo 'could not connect to the database' . mysqli_connect_error();
}
$book_name="";
$author="";
$price="";
$isbn_no ="";
$book_error = array();
// print_r($_POST);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name = $_POST['name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $isbn_no = $_POST['isbn_no'];

    //insert task
    if($addbook = mysqli_query($conn, "INSERT INTO library (book_name , author, price, isbn_no) VALUES('$name','$author',$price, $isbn_no)")){
        echo "book added";
    }
}




?>




<div class="container">
    <div class="row">
        <div class="addlibrary m-auto">
            <h2 class="active font-bold text-success p-5"> Details Of Book </h2>


            <form action="" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label> Book Name </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="enter book name" value="">
                </div>
                <div class="form-group">
                    <label> Book Author </label>
                    <input type="text" name="author" id="author" class="form-control" placeholder="enter author name">
                </div>
                <div class="form-group">
                    <label> Book Price </label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="enter price">
                </div>
                <div class="form-group">
                    <label> ISBN_No</label>
                    <input type="text" name="isbn_no" id="isbn_no" class="form-control" placeholder="enter ISBN_No">
                </div>
                <button class="btn btn-primary">  ADD</button>

            </form>
        </div>
    </div>
</div>

<script>
    function validateForm() 
    {
        let name = document.getElementById('name'),
            author = document.getElementById('author'),
            price = document.getElementById('price'),
            isbn_no = document.getElementById('isbn_no');

            if(name.value == '') {
                alert('Book name cannot be empty');
                return false
            } else if(name.value.length < 3) {
                alert('Book name cannot be less than 3');
                return false;
            }

            if(author.value == '') {
                alert('Book author cannot be empty');
                return false;
            }
            if(price.value == ''){
                alert('book price cannot be empty');
                return false;

            }
            if(isbn_no.value == ''){
                alert('isbn_no cannot be empty');
                return false;
            }

        return true;
    }

    // document.getElementById('bookForm').addEventListener('submit', function() {
        
    // })
    // $('#bookForm').submit(function(){

    // });
</script>
</body>

</html>