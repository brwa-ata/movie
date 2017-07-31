<div class="col-md-6">
    <a class=" btn btn-success" href="index.php?create_list">Create new list</a>
    <?php
        $sql="SELECT lists.listname,lists.list_image FROM lists
              INNER JOIN users ON users.id=lists.users_id
              INNER JOIN films ON films.id=lists.films_id
              LEFT JOIN episode_of_seasons ON episode_of_seasons.id=lists.	episode_id
              WHERE lists.users_id={$_SESSION['user_id']}
              GROUP BY lists.listname";
        $show_lists=mysqli_query($connection,$sql);
        while ($row=mysqli_fetch_assoc($show_lists))
        {
            $list_name=$row['listname'];
            $list_image=$row['list_image'];
            ?>
            <h4><?php echo $list_name?></h4>
            <a href="index.php?image_list=<?php echo $_SESSION['user_id'];?>"><img src="../images/<?php echo $list_image?>" alt=""></a>
    <?php
        }
    ?>
</div>
