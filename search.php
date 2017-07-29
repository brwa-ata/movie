<?php include "includes/db_connection.php"; ?>
<?php include "includes/header.php"; ?>
<?php include 'includes/functions.php'; ?>
<body>
    <!-- Navigation -->

    <?php include 'includes/navigation.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
<?php
    if (isset($_POST['submit_search']))
    {
        if (!empty($_POST['search']))
        {
            $search_name=$_POST['search'];
            $search_by=$_POST['searchby'];

            switch ($search_by)
            {
                case 'keyword':
                    $query="SELECT id, video_title, date_format(released_date,'%Y') as 'released_date' ,image FROM films WHERE video_title LIKE '%$search_name%'  ";
                    $show_film=mysqli_query($connection,$query);
                    confirmQuery($show_film);
                    if (mysqli_num_rows($show_film)>0){
                    while ($row = mysqli_fetch_assoc($show_film))
                    {
                        $film_id            =$row['id'];
                        $film_title         =$row['video_title'];
                        $film_released_date =$row['released_date'];
                        $film_image         =$row['image'];
                        ?>
                        <h2> <a href="post.php?film_id=<?php echo $film_id?>"><?php echo $film_title; ?></a> <?php echo "($film_released_date)"; ?> </h2> <hr>
                        <a href="post.php?film_id=<?php echo $film_id?>"> <img class="img-responsive" src="images/<?php  echo $film_image; ?>" ></a> <hr>
                        <a  class="btn btn-primary" href="post.php?film_id=<?php echo $film_id?>">More info <span class="glyphicon glyphicon-chevron-right"></span></a><hr>


                    <?php
                    }
                    } // END IF

                    else{
                    $sql="SELECT id, tvshow_title, image, overview FROM tv_shows WHERE  tv_shows.tvshow_title LIKE '%$search_name%'";
                    $show_tvshow=mysqli_query($connection,$sql);
                    confirmQuery($show_tvshow);
                    while ($row1 = mysqli_fetch_assoc($show_tvshow))
                    {
                        $tvshow_id          =$row1['id'];
                        $tvshow_title       =$row1['tvshow_title'];
                        $tvshow_image       =$row1['image'];
                        $tvshow_overview    =$row1['overview'];
                    ?>

                        <h2> <a href="post.php?tvshow_id=<?php echo $tvshow_id?>"><?php echo $tvshow_title; ?></a> </h2><hr>
                        <a href="post.php?tvshow_id=<?php echo $tvshow_id?>"> <img class="img-responsive" src="images/GOTH/<?php  echo $tvshow_image; ?>" ></a> <hr>
                        <h2>Overview</h2><?php echo $tvshow_overview ?><br><br>
                        <a  class="btn btn-primary" href="seasons.php?tvshow_id=<?php echo $tvshow_id?>">View all seasons <span class="glyphicon glyphicon-chevron-right"></span></a><hr>
                    <?php
                    }}
                    break;


                case 'genre':

                    $sql="SELECT films.id,films.video_title, date_format(released_date,'%Y') as 'released_date' , films.image FROM films
                            INNER JOIN genre ON genre.films_id= films.id
                            INNER JOIN defined_genre ON genre.defined_genre_id = defined_genre.id
                            WHERE defined_genre.genretype LIKE  '%$search_name%'";
                    $show_film=mysqli_query($connection,$sql);
                    confirmQuery($show_film);
                    while ($row = mysqli_fetch_assoc($show_film))
                    {
                        $film_id            =$row['id'];
                        $film_title         =$row['video_title'];
                        $film_released_date =$row['released_date'];
                        $film_image         =$row['image'];
                        ?>
                        <h2> <a href="post.php?film_id=<?php echo $film_id?>"><?php echo $film_title; ?></a> <?php echo "($film_released_date)"; ?> </h2>
                        <hr>
                        <a href="post.php?film_id=<?php echo $film_id?>"> <img class="img-responsive" src="images/<?php  echo $film_image; ?>" ></a> <hr>
                        <a  class="btn btn-primary" href="post.php?film_id=<?php echo $film_id?>">More info <span class="glyphicon glyphicon-chevron-right"></span></a><hr>
                        <?php
                    }

                    break;


                case 'year':
                    $query="SELECT id,video_title, date_format(released_date,'%Y') as 'released_date' , image FROM films WHERE released_date LIKE '%$search_name%'  ";
                    $show_film=mysqli_query($connection,$query);
                    confirmQuery($show_film);
                    while ($row = mysqli_fetch_assoc($show_film))
                    {
                        $film_id            =$row['id'];
                        $film_title         =$row['video_title'];
                        $film_released_date =$row['released_date'];
                        $film_image         =$row['image'];
                        ?>
                        <h2> <a href="post.php?film_id=<?php echo $film_id?>"><?php echo $film_title; ?></a> <?php echo "($film_released_date)"; ?> </h2>
                        <hr>
                        <a href="post.php?film_id=<?php echo $film_id?>"> <img class="img-responsive" src="images/<?php  echo $film_image; ?>" ></a> <hr>
                        <a  class="btn btn-primary" href="post.php?film_id=<?php echo $film_id?>">More info <span class="glyphicon glyphicon-chevron-right"></span></a><hr>
                        <?php
                    }
                    break;
            }
        }
        else
        {
            redirect('index.php');
        }

    }
?>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>

