<?php include 'includes/db_connection.php'; ?>
<?php include 'includes/header.php'; ?>
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
                if (isset($_GET['film_id']))
                {
                    $the_film_id=$_GET['film_id'];
                }
            ?>

            <?php

            $query="SELECT films.video_title, films.overview, date_format(released_date,'%d %M %Y') AS 'released_date', concat('$',revenue,' milion') AS 'revenue',
                    concat(duration,'min') AS 'duration' , films.image , concat('$',budget) AS 'budget'  FROM films WHERE films.id = $the_film_id";
            $show_film=mysqli_query($connection,$query);
            confirmQuery($show_film);

            while ($row = mysqli_fetch_assoc($show_film))
            {

                $film_title         =$row['video_title'];
                $film_overview      =$row['overview'];
                $film_released_date =$row['released_date'];
                $film_revenue       =$row['revenue'];
                $film_budget        =$row['budget'];
                $film_duration      =$row['duration'];
                $film_image         =$row['image'];
               // $film_genre_type    =$row['genretype'];

                ?>

                <h2><?php echo $film_title; ?>  </h2>
                <hr>
                <img class="img-responsive" src="images/<?php  echo $film_image; ?>">
                <h3>Released Date: <?php echo $film_released_date?></h3><hr>
                <h3>Duration: <?php echo $film_duration?></h3><hr>
                <h3>Overview</h3>
                <p style="font-size: large"> <?php echo $film_overview; ?></p><hr>
                <h4>Budget: <?php echo $film_budget?></h4><hr>
                <h4>Revenue: <?php echo $film_revenue?></h4>
                <?php
            }
            ?>
            <hr>
              <h3>Genre: <?php $query2="SELECT defined_genre.genretype AS 'genretype' FROM defined_genre
                        INNER JOIN genre ON genre.defined_genre_id = defined_genre.id
                        INNER JOIN films ON films.id= genre.films_id
                        WHERE films.id = $the_film_id";
                $get_genre_type=mysqli_query($connection,$query2);
                confirmQuery($query2);
                while ($row2 = mysqli_fetch_assoc($get_genre_type))
                {
                    $film_genre_type = $row2['genretype'];
            ?>
                    <?php echo $film_genre_type." "; ?>
            <?php
                }

            ?>
              </h3>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include 'includes/sidebar.php'; ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
