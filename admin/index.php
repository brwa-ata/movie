<?php include "admin_includes/admin_header.php"; ?>
<?php include 'functions.php'; ?>
<?php include "admin_includes/admin_function.php"; ?>
<div id="wrapper">
        <!-- Navigation -->
        <?php include "admin_includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php if ($_SESSION['user_role'] == 'admin'): ?>
                        Welcome to Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                        <?php else: ?>
                        Welcome to User
                        <small><?php echo $_SESSION['username']; ?></small>
                        <?php  endif; ?>
                    </h1>

                </div>
            </div>

            <!-- /.row -->

            <!-- /.row -->

            <?php
            if (isset($_SESSION['user_role']))
            {
                $user_role = $_SESSION['user_role'];
                if ($user_role == 'admin')
                {
                    include "admin_includes/admin_things.php";
                }
                else
                {
                    include "admin_includes/user_things.php";

                }
            }
            ?>
            <!-- /.row -->


            <?php
            if (isset($_SESSION['user_role']))
            {
                if (!isset($_GET['favorite']) && !isset($_GET['watchlist']))
                {
                    $user_role = $_SESSION['user_role'];
                    if ($user_role == 'admin') {
                        include "admin_includes/admin_chart.php";
                    }
                }
                if (isset($_GET['favorite']))
                {
                    $user_id=$_GET['favorite'];
                    include "admin_includes/favorite.php";
                }
                if (isset($_GET['watchlist']))
                {
                    $the_user_id=$_GET['watchlist'];
                    include "admin_includes/watchlists.php";
                }
            }
            ?>

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /#page-wrapper -->
<?php include "admin_includes/admin_footer.php"; ?>