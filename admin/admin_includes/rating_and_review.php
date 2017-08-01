<h3 class="text-center">Rating & Review</h3>
<div class="col-xs-6">
    <?php
        $sql="SELECT film_id FROM rating INNER JOIN films ON films.id=rating.film_id WHERE rating.user_id={$rate_user_id}";
        $ex=mysqli_query($connection,$sql);
        $number_of_film=mysqli_num_rows($ex);

        $sql2="SELECT round(avg(rated),1) AS 'avarage' FROM rating INNER JOIN films ON films.id=rating.film_id WHERE rating.user_id={$rate_user_id}";
        $excute=mysqli_query($connection,$sql2);
        $row=mysqli_fetch_assoc($excute);
        $avarate_rate=$row['avarage'];

    ?>
    <h3>You rated <?php echo $number_of_film; ?> films  | average rate : <?php echo $avarate_rate; ?></h3>
    <table class="table table-bordered table-hover">
        <thead>
        <thead>
        <tr>
            <th>Films</th>
            <th>Your Rate</th>
        </tr>
        </thead>
        </thead>
        <tbody>
        <?php
        $query="SELECT films.id AS 'film_id', films.video_title, rating.rated  FROM films 
                INNER JOIN rating ON  films.id=rating.film_id
                WHERE rating.user_id={$rate_user_id}";
        $fav_table=mysqli_query($connection,$query);
        confirmQuery($fav_table);
        while ($row=mysqli_fetch_assoc($fav_table))
        {
            $film_id=$row['film_id'];
            $film_title=$row['video_title'];
            $film_rating=$row['rated'];

            ?>
            <tr>
                <td><a href="../film<?php echo $film_id;?>"><?php echo $film_title; ?></a></td>
                <td><?php echo $film_rating; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


<div class="col-xs-6">

    <?php
    $sql="SELECT episod_id FROM rating INNER JOIN episode_of_seasons ON episode_of_seasons.id=rating.episod_id WHERE rating.user_id={$rate_user_id}";
    $ex=mysqli_query($connection,$sql);
    $number_of_episode=mysqli_num_rows($ex);

    $sql2="SELECT round(avg(rated),1) AS 'avarage' FROM rating INNER JOIN episode_of_seasons ON episode_of_seasons.id=rating.episod_id WHERE rating.user_id={$rate_user_id}";
    $excute=mysqli_query($connection,$sql2);
    $row=mysqli_fetch_assoc($excute);
    $avarate_rate=$row['avarage'];

    ?>
    <h3>You rated <?php echo $number_of_episode; ?> Episode  | average rate : <?php echo $avarate_rate; ?></h3>

    <table class="table table-bordered table-hover">

        <thead>
        <thead>
        <tr>
            <th>Episode</th>
            <th>Your Rate</th>
        </tr>
        </thead>
        </thead>
        <tbody>
        <?php
        $query="SELECT episode_of_seasons.id, episode_of_seasons.episode_name, rating.rated  FROM episode_of_seasons 
                                INNER JOIN rating ON  episode_of_seasons.id=rating.episod_id
                                WHERE rating.user_id={$rate_user_id}";
        $fav_table=mysqli_query($connection,$query);
        confirmQuery($fav_table);
        while ($row=mysqli_fetch_assoc($fav_table))
        {
            $episode_id=$row['id'];
            $episode_title=$row['episode_name'];
            $episode_rating=$row['rated'];

            ?>
            <tr>
                <td><?php echo $episode_title; ?></td>
                <td><?php echo $episode_rating; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>