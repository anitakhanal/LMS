<?php include('header.php'); ?>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'library_management_system');
if (!$conn) {
    echo 'could not connect to the database' . mysqli_connect_error();
}


if(isset($_GET['action']) && isset($_GET['id'])){
    $action = $_GET['action'];
    $id =intval($_GET['id']);
    if($action ="delete") {
        if($removedResult = mysqli_query($conn, "DELETE FROM library WHERE book_id = $id")){
            echo '<div class = "alert alert-dark">Remove sucessfully</div>';

        }else{
           echo mysqli_error($conn);
        }

    }
} 
?>


<div class="row">
    <div class="library m-auto">
        <h2 class="active font-bold text-success text-center mt-5"> LIBRARY </h2>
        <a href="addlibrary.php" class="btn btn-primary">Add New Book</a>
        <table class="table table-bordered table-hover table-striped m-5">
            <tr>
                <th> Book_id</th>
                <th>Book_name</th>
                <th>Author</th>
                <th> Price</th>
                <th>ISBN_no</th>
                <th>Action</th>
            </tr>
            <?php
            $add = mysqli_query($conn, "SELECT * FROM library");
            if ($add == true) :
                while ($row = mysqli_fetch_assoc($add)) : ?>
                    <tr>
                        <td> <?php echo $row['book_id']; ?> </td>
                        <td> <?php echo $row['book_name']; ?> </td>
                        <td> <?php echo $row['author']; ?> </td>
                        <td> <?php echo $row['price']; ?> </td>
                        <td> <?php echo $row['isbn_no']; ?> </td>
                        <td>
                            <a href="editbook.php?id=<?php echo $row['book_id']; ?>" class="btn btn-text btn-primary">Edit</a>
                            <a href="library.php?action=delete&id=<?php echo $row['book_id']; ?>" class="btn btn-text btn-danger">Delete</a>
                        </td>
                    </tr>


                <?php endwhile;
                else : ?>
                <?php mysqli_error($add); ?>
            <?php endif; ?>




        </table>



    </div>
</div>

<?php include('footer.php'); ?>