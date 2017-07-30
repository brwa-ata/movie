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

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
                if (isset($_GET['film_id']))
            {
            $the_film_id = $_GET['film_id'];

            $sql = "UPDATE films SET popularity= popularity +1 WHERE id=$the_film_id ";
            $popularity = mysqli_query($connection, $sql);
            confirmQuery($sql);

            // SHOW ALL INFO IN THE FILMS TABLE
            $query = "SELECT  films.video_title, films.overview, date_format(released_date,'%d %M %Y') AS 'released_date', concat('$',revenue,' milion') AS 'revenue',
                    concat(duration,'min') AS 'duration' , films.image , concat('$',budget) AS 'budget'  FROM films WHERE films.id = $the_film_id";
            $show_film = mysqli_query($connection, $query);
            confirmQuery($show_film);

            while ($row = mysqli_fetch_assoc($show_film)) {


                $film_title = $row['video_title'];
                $film_overview = $row['overview'];
                $film_released_date = $row['released_date'];
                $film_revenue = $row['revenue'];
                $film_budget = $row['budget'];
                $film_duration = $row['duration'];
                $film_image = $row['image'];

                ?>

                <h2><?php echo $film_title; ?>  </h2>
                <hr>
                <img class="img-responsive" src="images/<?php echo $film_image; ?>">


                <?php // INSERT AND DELETE FAVORITE
                    if (isset($_POST['favorite']))
                    {
                         $user_id=$_SESSION['user_id'];
                         $favorite_sql="INSERT INTO favorite (films_id,user_id) VALUES ({$the_film_id}, {$user_id})";
                         $add_favorite=mysqli_query($connection,$favorite_sql);
                         confirmQuery($add_favorite);
                    }
                    if (isset($_POST['unfavorite']))
                    {
                        $query3="DELETE FROM favorite WHERE films_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
                        $delete_fav=mysqli_query($connection,$query3);
                        confirmQuery($delete_fav);
                    }
                ?>
                <!-- FAVORITE FORM -->
                <?php
                    if (isset($_SESSION['user_id']))
                    {
                        $fav_table="SELECT * FROM favorite WHERE films_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
                        $get_fav=mysqli_query($connection,$fav_table);
                        confirmQuery($get_fav);
                        if (!mysqli_num_rows($get_fav)>0)
                        {
                            ?>
                            <form action="" method="post">
                                <input class="btn btn-success" type="submit" name="favorite" value="Favorite">
                            </form>
                            <?php
                        }
                        else
                        {
                            ?>
                            <form action="" method="post">
                                <input class="btn btn-danger" type="submit" name="unfavorite" value="UnFavorit">
                            </form>
                            <?php
                        }
                    }
                ?>


                <?php // INSERT AND DELETE WATCHLIST
                if (isset($_POST['watchlist']))
                {
                    $user_id=$_SESSION['user_id'];
                    $watch_sql="INSERT INTO watchlist (film_id,user_id) VALUES ({$the_film_id}, {$user_id})";
                    $add_watch=mysqli_query($connection,$watch_sql);
                    confirmQuery($add_watch);
                }
                if (isset($_POST['unwatchlist']))
                {
                    $query4="DELETE FROM watchlist WHERE film_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
                    $delete_watch=mysqli_query($connection,$query4);
                    confirmQuery($delete_watch);
                }
                ?>
                <!-- WATCHLIST FORM -->
                <?php
                if (isset($_SESSION['user_id']))
                {
                    $watch_table="SELECT * FROM watchlist WHERE film_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
                    $get_watch=mysqli_query($connection,$watch_table);
                    confirmQuery($get_watch);
                    if (!mysqli_num_rows($get_watch)>0)
                    {
                        ?>
                        <form action="" method="post">
                            <input class="btn btn-primary" type="submit" name="watchlist" value="Add to watchlist">
                        </form>
                        <?php
                    }
                    else
                    {
                        ?>
                        <form action="" method="post">
                            <input class="btn btn-danger" type="submit" name="unwatchlist" value="delete from watchlist">
                        </form>
                        <?php
                    }
                }
                ?>
                <style>
                    .rate{
                        color:black;
                        cursor:pointer;
                    }
                    .rate:hover{
                        color:red;
                    }
                    .rate-item{
                        float:left;
                        cursor:pointer;
                        margin:0px 15px 0px 15px;
                    }
                    .rate-item:hover ~ .rate-item {
                        color: black;
                    }
                </style>


                <div class="rate">
                    <div class="rate-item">
<a style="text-decoration:none; color: inherit" href="countrating.php?rate=1&film_id=<?php echo $the_film_id?>&user_id=<?php echo $_SESSION['user_id']?>">☆</a>
                    </div>
                    <div class="rate-item">
<a style="text-decoration:none; color: inherit" href="countrating.php?rate=2&film_id=<?php echo $the_film_id?>&user_id=<?php echo $_SESSION['user_id']?>">☆</a>
                    </div>
                    <div class="rate-item">
<a style="text-decoration:none; color: inherit" href="countrating.php?rate=3&film_id=<?php echo $the_film_id?>&user_id=<?php echo $_SESSION['user_id']?>">☆</a>
                    </div>
                    <div class="rate-item">
<a style="text-decoration:none; color: inherit" href="countrating.php?rate=4&film_id=<?php echo $the_film_id?>&user_id=<?php echo $_SESSION['user_id']?>">☆</a>
                    </div>
                    <div class="rate-item">
<a style="text-decoration:none; color: inherit" href="countrating.php?rate=5&film_id=<?php echo $the_film_id?>&user_id=<?php echo $_SESSION['user_id']?>">☆</a>
                    </div>
                </div>

                <h3>Released Date: <?php echo $film_released_date ?></h3>
                <hr>
                <h3>Duration: <?php echo $film_duration ?></h3>
                <hr>
                <h3>Overview</h3>
                <p style="font-size: large"> <?php echo $film_overview; ?></p>
                <hr>
                <h3>Budget: <?php echo $film_budget ?></h3>
                <hr>
                <h3>Revenue: <?php echo $film_revenue ?></h3>
                <?php
            }
            ?>
            <hr>

            <!-- GETTING FILMS GENRE TYPE  -->
            <h3>Genre: <?php $query2 = "SELECT defined_genre.genretype AS 'genretype' FROM defined_genre
                        INNER JOIN genre ON genre.defined_genre_id = defined_genre.id
                        INNER JOIN films ON films.id= genre.films_id
                        WHERE films.id = $the_film_id";
                $get_genre_type = mysqli_query($connection, $query2);
                confirmQuery($query2);
                while ($row2 = mysqli_fetch_assoc($get_genre_type)) {
                    $film_genre_type = $row2['genretype'];
                    echo $film_genre_type . " ";
                }
                ?>
            </h3>
            <hr>

            <!-- GETTING LANGUAGE OF THE FILM  -->
            <h3>Language: <?php
                $sql = "SELECT language_name FROM language 
                                      INNER JOIN films ON language.films_id = films.id 
                                      WHERE films.id=$the_film_id";
                $get_language = mysqli_query($connection, $sql);
                confirmQuery($get_language);
                while ($row5 = mysqli_fetch_assoc($get_language)) {
                    $film_language = $row5['language_name'];
                    echo $film_language . "  ";
                }
                ?>
            </h3>
            <hr>

            <!-- GETTING Production Company -->
            <h3>Production Company: <?php
                $sql = "SELECT company_name FROM production_company 
                              INNER JOIN films ON production_company.films_id = films.id 
                              WHERE films.id=$the_film_id";
                $get_company = mysqli_query($connection, $sql);
                confirmQuery($get_company);
                while ($row3 = mysqli_fetch_assoc($get_company)) {
                    $company_name = $row3['company_name'];
                    echo $company_name . "  ";
                }
                ?>
            </h3>
            <hr>

            <!-- GETTING Production Country -->
            <h3>Production Country: <?php
                $sql = "SELECT country_name FROM production_country
                                  INNER JOIN films ON production_country.films_id = films.id 
                                  WHERE films.id=$the_film_id";
                $get_country = mysqli_query($connection, $sql);
                confirmQuery($get_country);
                while ($row4 = mysqli_fetch_assoc($get_country)) {
                    $country_name = $row4['country_name'];
                    echo $country_name . "  ";
                }

                ?>
            </h3>
        </div>

    </div>
    <!-- /.row -->

    <hr>
    <div class="row">

        <!-- BACKDROP SECTION -->
        <div class="col-md-8">
            <h2 class="text-center">Backdrops</h2>
            <?php
            $sql2 = "SELECT film_backdrop FROM film_images 
                      INNER JOIN  films ON film_images.film_id=films.id
                      WHERE films.id = $the_film_id";
            $get_backdrop = mysqli_query($connection, $sql2);
            confirmQuery($get_backdrop);
            while ($row6 = mysqli_fetch_assoc($get_backdrop)) {
                $film_backdrop = $row6['film_backdrop'];
                ?>
                <img class="img-responsive" src="images/<?php echo $film_backdrop ?>">
            <?php }
            ?>

        </div>


        <!-- POSTER SECTION -->
        <div class="col-md-4">
            <h2 class="text-center">Posters</h2>
            <?php
            $sql3 = "SELECT film_poster FROM film_images 
                      INNER JOIN  films ON film_images.film_id=films.id
                      WHERE films.id = $the_film_id";
            $get_poster = mysqli_query($connection, $sql3);
            confirmQuery($get_poster);
            while ($row6 = mysqli_fetch_assoc($get_poster)) {
                $film_poster = $row6['film_poster'];
                ?>
                <img class="img-responsive" src="images/<?php echo $film_poster; ?>">
            <?php }
            } // END OF FIRST IF  IF(ISSET($_GET['film_id']))
            ?>
        </div> <!-- END OF SHOW FILMS -->



        <!-- SHOW TV SHOWS -->
        <div class="col-md-8">
            <?php
                if (isset($_GET['tvshow_id']))
                {
                    $the_tvshow_id=$_GET['tvshow_id'];

                    $sql = "UPDATE tv_shows SET popularity= popularity +1 WHERE id=$the_tvshow_id ";
                    $popularity = mysqli_query($connection, $sql);
                    confirmQuery($sql);


                    $sql="SELECT * FROM tv_shows WHERE id = $the_tvshow_id";
                    $show_tvshow=mysqli_query($connection,$sql);
                    confirmQuery($show_tvshow);
                    while ($row=mysqli_fetch_assoc($show_tvshow))
                    {
                        $show_title=$row['tvshow_title'];
                        $show_image=$row['image'];
                        $show_overview=$row['overview'];
            ?>
                        <h2> <?php echo $show_title; ?> </h2>
                        <img class="img-responsive" src="images/GOTH/<?php  echo $show_image; ?>" > <hr>
                        <h3> Overview </h3>
                        <?php echo $show_overview; ?><br><br>
                        <a  class="btn btn-primary" href="seasons.php?tvshow_id=<?php echo $the_tvshow_id; ?>">View all season <span class="glyphicon glyphicon-chevron-right"></span></a>
            <?php
                    }
                }
            ?>

        </div>

    </div>
    <!-- /.row -->
    <hr>
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</div>


