<?php include "admin_includes/admin_header.php"; ?>
<div id="wrapper">
        <!-- Navigation -->
        <?php include "admin_includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
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


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "admin_includes/admin_footer.php"; ?>