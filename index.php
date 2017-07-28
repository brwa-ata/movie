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
            $pager=2;
            if (isset($_GET['page'])) {

                $page=$_GET['page'];
            } else {
                $page = '';
            }
            if ($page =='' || $page==1) {
                $page_1=0;
            } else {
                $page_1=($page*$pager) - $pager;
            }

            // COUNT NUMBER OF FILMS
            $query2="SELECT  id FROM films";
            $count_films=mysqli_query($connection,$query2);
            confirmQuery($count_films);
            $count = mysqli_num_rows($count_films);
            ?>



            <!-- MOVES COLUMN -->
            <div class="col-md-5">
                <h2>Movies</h2>
                <hr>
                <?php // SHOW ALL FILMS
                    $query="SELECT id,video_title, date_format(released_date,'%Y') as 'released_date' , image FROM films LIMIT $page_1,$pager";
                    $show_film=mysqli_query($connection,$query);
                    confirmQuery($show_film);
                    $count=ceil($count/$pager);
                    while ($row = mysqli_fetch_assoc($show_film))
                    {
                        $film_id            =$row['id'];
                        $film_title         =$row['video_title'];
                        $film_released_date =$row['released_date'];
                        $film_image         =$row['image'];

                ?>

                        <h2> <a href="post.php?film_id=<?php echo $film_id?>"><?php echo $film_title; ?></a> <?php echo "($film_released_date)"; ?> </h2>

                        <a href="post.php?film_id=<?php echo $film_id?>"> <img class="img-responsive" src="images/<?php  echo $film_image; ?>" ></a> <hr>
                        <a  class="btn btn-primary" href="post.php?film_id=<?php echo $film_id?>">More info <span class="glyphicon glyphicon-chevron-right"></span></a><hr>
                <?php
                    }
                ?>

            </div>
            <div class="col-md-1">    </div>


            <!-- TV SHOWS COLUMN -->
            <div class="col-md-5">
                <h2>TV Shows</h2>
                <hr>
                <?php
                    $sql="SELECT id,tvshow_title, image FROM tv_shows";
                    $show_tvshow=mysqli_query($connection,$sql);
                    confirmQuery($show_tvshow);
                    while ($row2=mysqli_fetch_assoc($show_tvshow))
                    {
                        $tvshow_id=$row2['id'];
                        $show_title=$row2['tvshow_title'];
                        $show_image=$row2['image'];
                ?>
                <h2> <a href="post.php?tvshow_id=<?php echo $tvshow_id?>"><?php echo $show_title; ?></a> </h2>
                <a href="post.php?tvshow_id=<?php echo $tvshow_id?>"> <img class="img-responsive" src="images/GOTH/<?php  echo $show_image; ?>" ></a> <hr>
                <a  class="btn btn-primary" href="post.php?tvshow_id=<?php echo $tvshow_id?>">More info <span class="glyphicon glyphicon-chevron-right"></span></a><hr>
                <?php
                    }
                ?>

            </div>


        </div>


        <!-- /.row -->

        <ul class="pager">

            <?php
            for ($i=1 ; $i<=$count ; $i++)
            {
                if ($i == $page)// ama wata bo aw pageay ka tyayayn
                {
                    echo "<li><a  href='index.php?page=$i'> $i </a></li>";
                }
                else
                {
                    echo "<li><a href='index.php?page=$i'>$i</a></li>";
                }
            }
            ?>

        </ul>

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php'; ?>
