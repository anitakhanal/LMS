<?php include('header.php'); ?>
<div class="container">
    <div class="row">
        <div class="admin m-auto">
            <h2 class="admin_panel font-bold text-warning text-center m-5 "> ADMIN PANEL </h2>
            <div class="but ml-5">

                <a class="btn btn-secondary" href="library.php"> Book </a>
                <a class="btn btn-success">Student</a>
                <a class="btn btn-danger">Admin</a>
                <a href="bookissue.php" class="btn btn-primary">Book issue/return</a>
                <form action="search.php" method="get" class="form-inline mt-3">
                    <div class="form-grop">
                        <input type="text" class="form-control mr-5" name="search" placeholder="search here">
                        <button class="btn btn-warning" >SEARCH</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>