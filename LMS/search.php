<?php include('header.php'); ?>
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'library_management_system');
if (!$conn) {
    echo 'could not connect to the database' . mysqli_connect_error();
}

$searchstring =$_GET['search'];
if($search = mysqli_query($conn, "SELECT * FROM library WHERE book_name LIKE '%$searchstring'")){
 if(mysqli_num_rows($search) > 0){
     echo 'book is found';
     ?>
     <div class="row">
         <div class="col-md-6 m-auto">
             <h3 class="text-white text-center"> search result for: <?php echo $searchstring; ?> </h3>
             <table class="table table-bordered table-striped">
                 <tr>
                     <th class="text-white"> Book name </th>
                     <th class="text-white">Author </th>
                     <th class="text-white"> Price </th>
                     <th class="text-white"> isbn_no </th>

 </tr>
         </div>
     </div>
     <?php
     while($book = mysqli_fetch_assoc($search)) { ?>
     <tr>
         <td> <?php echo $book['book_name']; ?> </td>
         <td> <?php echo $book['author']; ?> </td>
         <td> <?php echo $book['price']; ?> </td>
         <td> <?php echo $book['isbn_no']; ?> </td>
     </tr>

     <?php }

     }
 
}
?>


</table>