<?php include "admin_includes/admin_header.php"; ?>
<div id="wrapper">
    <?php
    if (isset($_SESSION['user_role']))
    {
        $user_role=$_SESSION['user_role'];
        if ($user_role != 'admin')
        {
            header("Location: index.php");
        }
    }
    ?>
        <!-- Navigation -->
        <?php include "admin_includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <?php
                    if (isset($_GET['order']))
                    {
                        $order=$_GET['order'];

                        switch ($order)
                        {
                            case 'addmovie':
                                include "admin_includes/add_movie.php";
                                break;
                            case 'addtv':
                                include "admin_includes/add_tv_show.php";
                                break;
                            case 'addseason';
                                break;
                            case 'addepisode':
                                break;
                            case 'viewfilms':
                                include "admin_includes/vew_all_films.php";
                                break;
                        }
                    }
                ?>
                <?php

                if (isset($_GET['delete']))
                {

                    $the_film_id=$_GET['delete'];
                    $sql2="DELETE FROM films WHERE id={$the_film_id}";
                    $delete_film=mysqli_query($connection,$sql2);
                    include "admin_includes/vew_all_films.php";
                }

                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "admin_includes/admin_footer.php"; ?>