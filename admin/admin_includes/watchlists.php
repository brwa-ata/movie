<h3 class="text-center">Watchlist</h3>
<div class="col-xs-6">
<table class="table table-bordered table-hover">

    <thead>
    <thead>
    <tr>
        <th>Films</th>

    </tr>
    </thead>
    </thead>
    <tbody>
    <?php
    $query="SELECT films.id AS 'film_id', films.video_title  FROM films 
                            INNER JOIN watchlist ON  films.id=watchlist.film_id
                            WHERE watchlist.user_id={$the_user_id}";
    $fav_table=mysqli_query($connection,$query);
    confirmQuery($fav_table);
    while ($row=mysqli_fetch_assoc($fav_table))
    {
        $film_id=$row['film_id'];
        $film_title=$row['video_title'];
        ?>
        <tr>
            <td><a href="../post.php?film_id=<?php echo $film_id;?>"><?php echo $film_title; ?></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>

<div class="col-xs-6">
    <table class="table table-bordered table-hover">

        <thead>
        <thead>
        <tr>
            <th>Episode</th>
        </tr>
        </thead>
        </thead>
        <tbody>
        <?php
        $query="SELECT episode_of_seasons.id, episode_of_seasons.episode_name  FROM episode_of_seasons 
                                INNER JOIN watchlist ON  episode_of_seasons.id=watchlist.episode_id
                                WHERE watchlist.user_id={$the_user_id}";
        $fav_table=mysqli_query($connection,$query);
        confirmQuery($fav_table);
        while ($row=mysqli_fetch_assoc($fav_table))
        {
            $episode_id=$row['id'];
            $episode_title=$row['episode_name'];

            ?>
            <tr>
                <td><?php echo $episode_title; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>