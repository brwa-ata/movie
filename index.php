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

                <?php // COUNT NUMBER OF FILMS
                    $query2="SELECT  id FROM films";
                    $count_films=mysqli_query($connection,$query2);
                    confirmQuery($count_films);
                    $count = mysqli_num_rows($count_films);
                ?>

                <?php // SHOW ALL FILMS
                    $query="SELECT video_title, date_format(released_date,'%Y') as 'released_date' , image FROM films  ";
                    $show_film=mysqli_query($connection,$query);
                    confirmQuery($show_film);
                    while ($row = mysqli_fetch_assoc($show_film))
                    {

                        $film_title         =$row['video_title'];
                        $film_released_date =$row['released_date'];
                        $film_image         =$row['image'];

                ?>

                        <h2> <a href=""><?php echo $film_title; ?></a> </h2>
                        <h4><span class="glyphicon glyphicon-time"></span><?php echo $film_released_date; ?> </h4> <hr>
                        <img class="img-responsive" src="images/<?php  echo $film_image; ?>" alt=""> <hr>
                        <a class="btn btn-primary" href="">More info <span class="glyphicon glyphicon-chevron-right"></span></a><hr>
                <?php
                    }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php'; ?>
