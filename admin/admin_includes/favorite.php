<table class="table table-bordered table-hover">

    <thead>
    <thead>
    <tr>
        <th>Films</th>
        <th>TV show Episode</th>
    </tr>
    </thead>
    </thead>
    <tbody>
    <?php
    $query="SELECT films.id AS 'film_id', films.video_title, episode_of_seasons.id, episode_of_seasons.episode_name  FROM films 
                            INNER JOIN favorite ON  films.id=favorite.films_id
                            LEFT JOIN episode_of_seasons ON episode_of_seasons.id= favorite.episode_id
                            WHERE favorite.user_id={$user_id}";
    $fav_table=mysqli_query($connection,$query);
    confirmQuery($fav_table);
    while ($row=mysqli_fetch_assoc($fav_table))
    {
        $film_id=$row['film_id'];
        $film_title=$row['video_title'];
        $epo_title=$row['episode_name'];
        ?>
        <tr>
            <td><a href="../post.php?film_id=<?php echo $film_id;?>"><?php echo $film_title; ?></a></td>
            <td><?php echo $epo_title; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>