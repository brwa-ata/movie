<div class="col-md-6">
    <a class=" btn btn-success" href="/Movie/admin/create_list<?php echo $_SESSION['user_id'];?>">Create new list</a>
    <?php
        $sql="SELECT lists.id, lists.listname,lists.list_image FROM lists
              INNER JOIN users ON users.id=lists.users_id
              RIGHT JOIN films ON films.id=lists.films_id
              LEFT JOIN episode_of_seasons ON episode_of_seasons.id=lists.	episode_id
              WHERE lists.users_id={$_SESSION['user_id']}
              GROUP BY lists.listname";
        $show_lists=mysqli_query($connection,$sql);
        while ($row=mysqli_fetch_assoc($show_lists))
        {
            $list_id=$row['id'];
            $list_name=$row['listname'];
            $list_image=$row['list_image'];
            ?>

            <h4><?php echo $list_name?></h4>
            <a href="index.php?image_list=<?php echo $_SESSION['user_id'];?>&list_name=<?php echo $list_name; ?>">
                <img src="../images/<?php echo $list_image?>" alt=""></a>
            <hr>
    <?php
        }
    ?>
</div>
