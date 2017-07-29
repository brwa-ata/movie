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

        <div class="col-md-8">

            <?php
                if (isset($_GET['category']))
                {
                    $category = $_GET['category'];
                    switch ($category)
                    {
                        case 'popular':
                                $query="SELECT * FROM tv_shows WHERE popularity>=5  ";
                                $show_populer_tvshow=mysqli_query($connection,$query);
                                confirmQuery($show_populer_tvshow);
                                while ($row = mysqli_fetch_assoc($show_populer_tvshow))
                                {
                                    $the_tvshow_id=$row['id'];
                                    $show_title=$row['tvshow_title'];
                                    $show_image=$row['image'];
                                    $show_overview=$row['overview'];
                                ?>
                                    <h2> <?php echo $show_title; ?> </h2>
                                    <img class="img-responsive" src="images/GOTH/<?php  echo $show_image; ?>" > <hr>
                                    <h3> Overview </h3>
                                    <?php echo $show_overview; ?><br><br>
                                    <a  class="btn btn-primary" href="seasons.php?tvshow_id=<?php echo $the_tvshow_id; ?>">View all season
                                        <span class="glyphicon glyphicon-chevron-right"></span></a>
                                    <?php
                                }
                            break;


                        case 'toprate':
                            break;


                        case 'ontv':
                                $query="SELECT episode_of_seasons.id AS 'id',  episode_of_seasons.image,  episode_of_seasons.episode_overview, 
                                        date_format(released_date,'%d %M %Y')  AS 'released_date', episode_of_seasons.episode_name , episode_of_seasons.episode_number,
                                        season_of_tvshow.season , tv_shows.tvshow_title, season_of_tvshow.id AS 'season_id',  tv_shows.id AS 'tvshow_id' FROM episode_of_seasons 
                                        INNER JOIN season_of_tvshow ON episode_of_seasons.seasons_id=season_of_tvshow.id
                                        INNER JOIN tv_shows ON season_of_tvshow.tv_shows_id = tv_shows.id
                                        WHERE released_date = '2011-04-17' ";

                                $get_episode=mysqli_query($connection,$query);
                                confirmQuery($get_episode);
                                while ($row=mysqli_fetch_assoc($get_episode))
                                {
                                    $tvshow_id=$row['tvshow_id'];
                                    $season_id=$row['season_id'];
                                    $tvshow_title=$row['tvshow_title'];
                                    $season_number=$row['season'];
                                    $episode_id=$row['id'];
                                    $episode_number=$row['episode_number'];
                                    $episode_name = $row['episode_name'];
                                    $episode_overview = $row['episode_overview'];
                                    $episode_image = $row['image'];
                                    $episode_year = $row['released_date'];
                                    ?>
                                    <h3><?php echo $tvshow_title.' | '.$season_number;?></h3>
                                    <h3><?php echo $episode_number; ?> <?php echo $episode_name .' '. $episode_year; ?> </h3>
                                    <a href="episode_info.php?episode_id=<?php echo $episode_id; ?>&season_id=<?php echo $season_id; ?>&tvshow_id=<?php echo $tvshow_id; ?>">
                                        <img width="40%"  class="img-responsive" src="images/GOTH/<?php echo $episode_image; ?> ">
                                    </a>
                                    <h3>Overview </h3>
                                    <?php echo $episode_overview; ?><hr>
                                    <?php
                                }
                            break;


                        case 'airingtoday':
                                $query="SELECT episode_of_seasons.id AS 'id',  episode_of_seasons.image,  episode_of_seasons.episode_overview, 
                                            date_format(released_date,'%d %M %Y')  AS 'released_date', episode_of_seasons.episode_name , episode_of_seasons.episode_number,
                                            season_of_tvshow.season , tv_shows.tvshow_title, season_of_tvshow.id AS 'season_id',  tv_shows.id AS 'tvshow_id' FROM episode_of_seasons 
                                            INNER JOIN season_of_tvshow ON episode_of_seasons.seasons_id=season_of_tvshow.id
                                            INNER JOIN tv_shows ON season_of_tvshow.tv_shows_id = tv_shows.id
                                            WHERE released_date > now() ";

                                $get_episode=mysqli_query($connection,$query);
                                confirmQuery($get_episode);
                                while ($row=mysqli_fetch_assoc($get_episode))
                                {
                                    $tvshow_id=$row['tvshow_id'];
                                    $season_id=$row['season_id'];
                                    $tvshow_title=$row['tvshow_title'];
                                    $season_number=$row['season'];
                                    $episode_id=$row['id'];
                                    $episode_number=$row['episode_number'];
                                    $episode_name = $row['episode_name'];
                                    $episode_overview = $row['episode_overview'];
                                    $episode_image = $row['image'];
                                    $episode_year = $row['released_date'];
                                    ?>
                                    <h3><?php echo $tvshow_title.' | '.$season_number;?></h3>
                                    <h3><?php echo $episode_number; ?> <?php echo $episode_name .' '. $episode_year; ?> </h3>
                                    <a href="episode_info.php?episode_id=<?php echo $episode_id; ?>&season_id=<?php echo $season_id; ?>&tvshow_id=<?php echo $tvshow_id; ?>">
                                        <img width="40%"  class="img-responsive" src="images/GOTH/<?php echo $episode_image; ?> ">
                                    </a>
                                    <h3>Overview </h3>
                                    <?php echo $episode_overview; ?><hr>
                                    <?php
                                }
                            break;

                    }
                }
            ?>

        </div>

    </div>
    <?php include 'includes/footer.php'; ?>
</div>