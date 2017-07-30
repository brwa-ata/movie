<?php include "admin_includes/admin_header.php"; ?>
<?php include 'functions.php'; ?>
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

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php

                                    $films_count=countRecord('films'); // pet ale ka chan post haya chwnka aw har royak 7sab aka
                                    echo " <div class='huge'>$films_count</div>";

                                    ?>
                                    <div>Films</div>
                                </div>
                            </div>
                        </div>
                        <a href="add_movie_tv.php?order=viewfilms">
                            <div class="panel-footer">
                                <span class="pull-left">View All Films</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php

                                    $tvshow_count=countRecord('tv_shows');
                                    echo "<div class='huge'>$tvshow_count</div>";
                                    ?>

                                    <div>TV Shows</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View All TV Shows</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                        $user_count=countRecord('users');
                                        echo "<div class='huge'>$user_count</div>";
                                    ?>

                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View All Users</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.row -->


            <?php

            /***
             * bang krdnaway functiony checkStatus() ka recordy har yak la tablekan adozetawa ba pey marjaka
             */
            $film_count=countRecord('films');

            $tv_shows_count=countRecord('tv_shows');

            $users_count=countRecord('users');

            ?>


            <div class="row">

                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php

                            $element_text=['Films','TV Shows','Users'];
                            $element_count=[$film_count,$tv_shows_count,$users_count];

                            for ($i=0 ; $i<3;$i++)
                            {
                                echo "['$element_text[$i]'" . "," . "$element_count[$i]],";
                            }

                            ?>

                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <!-- am scriptay xwarawa pewsyta bo kar pe krdny scriptakay sarawa -->
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /#page-wrapper -->
<?php include "admin_includes/admin_footer.php"; ?>