<?php include 'includes/db_connection.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>
<body>
    <!-- Navigation -->

    <?php include 'includes/navigation.php'; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php'; ?>
        </div>

        <div class="row">
            <?php
            if ($_GET['view_season'])
            {
                $get_tvshow_id=$_GET['view_season'];
            }
            ?>
            <!-- SEASON IMAGE -->
            <div class="col-md-8">
                <?php
                    $query="SELECT season_of_tvshow.id ,  season_of_tvshow.image,  season_of_tvshow.overview,  season_of_tvshow.year,  season_of_tvshow.season  
                                from season_of_tvshow  INNER JOIN tv_shows ON season_of_tvshow.tv_shows_id=tv_shows.id  WHERE tv_shows.id=$get_tvshow_id";
                    $get_season=mysqli_query($connection,$query);
                    confirmQuery($get_season);
                    while ($row=mysqli_fetch_assoc($get_season))
                    {
                        $season_id=$row['id'];
                        $season_number = $row['season'];
                        $season_overview = $row['overview'];
                        $season_image = $row['image'];
                        $season_year = $row['year'];
                    ?>
                <h3><?php echo $season_number; ?> <?php echo '('.$season_year.')'; ?></h3>
                        <a href="episodes.php?season_id=<?php echo $season_id; ?>"><img class="img-responsive" src="images/GOTH/<?php echo $season_image; ?> "></a>

                        <h3>Overview </h3>
                        <?php echo $season_overview; ?><hr>
                        <?php
                    }
                ?>
            </div>

        </div>
    </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
<?php include 'includes/footer.php'; ?>
