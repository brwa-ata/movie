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
            if (isset($_GET['episode_id']) && isset($_GET['season_id']) && isset($_GET['tvshow_id']))
            {
                $the_episode_id=$_GET['episode_id'];
                $the_season_id=$_GET['season_id'];
                $the_tvshow_id=$_GET['tvshow_id'];

            }
            ?>
            <!-- SEASON IMAGE -->
            <div class="col-md-8">

               <?php
               $query="SELECT episode_of_seasons.id ,  episode_of_seasons.image,  episode_of_seasons.episode_overview,
                        date_format(released_date,'%d %M %Y')  AS 'released_date', episode_of_seasons.episode_name , episode_of_seasons.episode_number,
                        ifnull(episode_revenue,'Unknown') AS 'episode_revenue', concat('$',episode_budget) AS 'episode_budget', 
                        concat(duration,' min') AS 'duration' from episode_of_seasons  INNER JOIN season_of_tvshow
                        ON episode_of_seasons.seasons_id=season_of_tvshow.id 
                        WHERE season_of_tvshow.id=$the_season_id AND episode_of_seasons.id=$the_episode_id";
                $get_episode=mysqli_query($connection,$query);
                confirmQuery($get_episode);
                while ($row=mysqli_fetch_assoc($get_episode))
                {
                    $episode_id=$row['id'];
                    $episode_number=$row['episode_number'];
                    $episode_name = $row['episode_name'];
                    $episode_overview = $row['episode_overview'];
                    $episode_image = $row['image'];
                    $episode_released_date = $row['released_date'];
                    $episode_duration=$row['duration'];
                    $episode_revenue=$row['episode_revenue'];
                    $episode_budget=$row['episode_budget'];
                    ?>
                    <h3><?php echo $episode_number; ?> <?php echo $episode_name; ?> </h3>
                    <img  class="img-responsive" src="images/GOTH/<?php echo $episode_image; ?> ">
                    <h4>Overview </h4>
                    <?php echo $episode_overview; ?><hr>
                    <h4>Released_date: <?php echo $episode_released_date ?></h4><hr>
                    <h4>Duration: <?php echo $episode_duration; ?></h4><hr>
                    <h4>Budget: <?php echo $episode_budget; ?></h4><hr>
                    <h4>Revenue: <i><?php echo $episode_revenue; ?></i></h4><hr>

                    <?php
                 }
                ?>
                <!-- GETTING EPISODE GENRE TYPE  -->
                <h4>Genre: <?php $query2 = "SELECT defined_genre.genretype AS 'genretype' FROM defined_genre
                                            INNER JOIN genre ON genre.defined_genre_id = defined_genre.id
                                            INNER JOIN tv_shows ON tv_shows.id= genre.tv_shows_id
                                            WHERE tv_shows.id = $the_tvshow_id";
                    $get_genre_type = mysqli_query($connection, $query2);
                    confirmQuery($query2);
                    while ($row2 = mysqli_fetch_assoc($get_genre_type)) {
                        $tvshow_genre_type = $row2['genretype'];
                        echo $tvshow_genre_type . " | ";
                    }
                    ?>
                </h4>
                <hr>

                <!-- GETTING EPISODE OF THE FILM  -->
                <h4>Language: <?php
                    $sql = "SELECT language_name FROM language 
                              INNER JOIN episode_of_seasons ON language.episode_id = episode_of_seasons.id
                              WHERE episode_of_seasons.id =$the_episode_id";
                    $get_language = mysqli_query($connection, $sql);
                    confirmQuery($get_language);
                    while ($row5 = mysqli_fetch_assoc($get_language)) {
                        $episode_language = $row5['language_name'];
                        echo $episode_language . "  ";
                    }
                    ?>
                </h4>
                <hr>

                <!-- GETTING Production Company -->
                <h4>Production Company: <?php
                    $sql = "SELECT company_name FROM production_company 
                              INNER JOIN tv_shows ON production_company.tv_shows_id = tv_shows.id 
                              WHERE tv_shows.id=$the_tvshow_id";
                    $get_company = mysqli_query($connection, $sql);
                    confirmQuery($get_company);
                    while ($row3 = mysqli_fetch_assoc($get_company)) {
                        $company_name = $row3['company_name'];
                        echo $company_name . " | ";
                    }
                    ?>
                </h4>
                <hr>

                <!-- GETTING Production Country -->
                <h3>Production Country: <?php
                    $sql = "SELECT country_name FROM production_country
                                  INNER JOIN tv_shows ON production_country.tv_shows_id = tv_shows.id  
                                  WHERE tv_shows.id =$the_tvshow_id";
                    $get_country = mysqli_query($connection, $sql);
                    confirmQuery($get_country);
                    while ($row4 = mysqli_fetch_assoc($get_country)) {
                        $country_name = $row4['country_name'];
                        echo $country_name . "  ";
                    }

                    ?>
                </h3>
                <hr>
                <h2 class="text-center">Backdrops</h2>
                <?php
                $sql2 = "SELECT episode_backdrop FROM episode_images 
                      INNER JOIN  episode_of_seasons ON episode_images.episode_id=episode_of_seasons.id
                      WHERE episode_of_seasons.id = $the_episode_id";
                $get_backdrop = mysqli_query($connection, $sql2);
                confirmQuery($get_backdrop);
                while ($row6 = mysqli_fetch_assoc($get_backdrop)) {
                    $episode_backdrop = $row6['episode_backdrop'];
                    ?>
                    <img class="img-responsive" src="images/GOTH/<?php echo $episode_backdrop ?>">
                <?php }
                ?>

            </div>

        </div>
        <hr>
        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>
    </div>

        <!-- /.row -->

