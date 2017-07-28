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
            if ($_GET['season_id'])
            {
                $the_season_id=$_GET['season_id'];
            }
            ?>
            <!-- SEASON IMAGE -->
            <div class="col-md-8">

                <?php
                $query="SELECT episode_of_seasons.id ,  episode_of_seasons.image,  episode_of_seasons.episode_overview, 
                        date_format(released_date,'%d %M %Y')  AS 'released_date', episode_of_seasons.episode_name , episode_of_seasons.episode_number 
                        from episode_of_seasons  INNER JOIN season_of_tvshow ON episode_of_seasons.seasons_id=season_of_tvshow.id 
                        WHERE season_of_tvshow.id=$the_season_id";
                $get_episode=mysqli_query($connection,$query);
                confirmQuery($get_episode);
                while ($row=mysqli_fetch_assoc($get_episode))
                {
                    $episode_id=$row['id'];
                    $episode_number=$row['episode_number'];
                    $episode_name = $row['episode_name'];
                    $episode_overview = $row['episode_overview'];
                    $episode_image = $row['image'];
                    $episode_year = $row['released_date'];
                    ?>
                    <h3><?php echo $episode_number; ?> <?php echo $episode_name .' '. $episode_year; ?> </h3>
                    <a href="episodes.php?episode_id=<?php echo $episode_id; ?>"><img width="40%"  class="img-responsive" src="images/GOTH/<?php echo $episode_image; ?> "></a>

                    <h3>Overview </h3>
                    <?php echo $episode_overview; ?><hr>
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
