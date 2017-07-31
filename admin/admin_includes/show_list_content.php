<?php if (isset($_GET['image_list'])) {
    ?>
    <a class="btn btn-danger" href="index.php?delete_list_name=<?php echo $_GET['list_name'] ?>">Delete
        this list</a>
    <table class="table table-bordered table-hover">
        <thead>
        <thead>
        <tr>
            <th>Film Name</th>
            <th>Episode Name</th>
        </tr>
        </thead>
        </thead>

        <tbody>
        <?php
        $user_id = $_GET['image_list'];
        $list_name = $_GET['list_name'];

        $sql = "SELECT films.video_title,episode_of_seasons.episode_name FROM films
                            LEFT JOIN lists ON lists.films_id=films.id
                            LEFT JOIN episode_of_seasons ON lists.episode_id=episode_of_seasons.id
                            WHERE lists.listname='$list_name' ";
        $ex = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($ex)) {
            $film_name = $row['video_title'];
            $episode_name = $row['episode_name'];
            ?>
            <tr>
                <td><?php echo $film_name; ?></td>
                <td><?php echo $episode_name; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}
    ?>
<?php
    if (isset($_GET['list_name_id']))
    {
      echo  $list_name=$_GET['list_name_id'];
        $query="DELETE FROM lists WHERE lists.listname='$list_name'";
        $excute=mysqli_query($connection,$query);
        if (!$excute)
        {
            die("QUERY FAILED ". mysqli_error($connection));
        }
        header("Location: admin_includes/lists.php");
    }
?>