<?php
    if (isset($_POST['create']))
    {
        if (!empty($_POST['list_name']))
        {
            $user_id = $_GET['create_list'];
            $listname=$_POST['list_name'];

            $list_image = $_FILES['list_image']['name'];
            $temp_list_iamge =$_FILES['list_image']['tmp_name'];

            move_uploaded_file($temp_list_iamge,"../images/$list_image");


            if (isset($_POST['film_name']) && isset($_POST['episode_name'])) {
                if (sizeof($_POST['film_name']) > sizeof($_POST['episode_name'])) {
                    foreach ($_POST['film_name'] as $films_id) {
                        $sql = "INSERT INTO lists (listname,users_id,films_id,list_image)
                          VALUES ('$listname',$user_id,$films_id,'$list_image') ";
                        $ex = mysqli_query($connection, $sql);
                        confirmQuery($ex);
                    }
                    $list_id = mysqli_insert_id($connection);
                    foreach ($_POST['episode_name'] as $episode_id) {
                        $sql2 = "UPDATE lists SET episode_id={$episode_id}  WHERE id={$list_id}";
                        $ex1 = mysqli_query($connection, $sql2);
                        confirmQuery($ex1);
                    }
                }
                if (sizeof($_POST['film_name']) < sizeof($_POST['episode_name'])) {
                    foreach ($_POST['episode_name'] as $episode_id) {
                        $sql = "INSERT INTO lists (listname,users_id,episode_id,list_image)
                          VALUES ('$listname',$user_id,$episode_id,'$list_image') ";
                        $ex = mysqli_query($connection, $sql);
                        confirmQuery($ex);
                    }
                    $list_id = mysqli_insert_id($connection);
                    foreach ($_POST['film_name'] as $films_id) {
                        $sql2 = "UPDATE lists SET films_id={$films_id}  WHERE id={$list_id}";
                        $ex1 = mysqli_query($connection, $sql2);
                        confirmQuery($ex1);
                    }
                }
            }
            if (isset($_POST['film_name']))
            {
                foreach ($_POST['film_name'] as $films_id)
                {
                    $sql = "INSERT INTO lists (listname,users_id,films_id,list_image)
                          VALUES ('$listname',$user_id,$films_id,'$list_image') ";
                    $ex = mysqli_query($connection, $sql);
                    confirmQuery($ex);
                }
            }
            if (isset($_POST['episode_name']))
            {
                foreach ($_POST['episode_name'] as $episode_id)
                {
                    $sql = "INSERT INTO lists (listname,users_id,episode_id,list_image)
                          VALUES ('$listname',$user_id,$episode_id,'$list_image') ";
                    $ex = mysqli_query($connection, $sql);
                    confirmQuery($ex);
                }
            }
        }
        else
        {
            echo "<script> alert('Please input a list name'); </script>";
        }

    }

?>
<div class="col-md-6">
    <h3>Create yor List</h3>

    <form  action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="list_name" placeholder="List Name">
        </div>

        <div class="form-group">
            <label for="">Choose movie you want</label>
            <table class="table table-bordered table-hover">
                <thead>
                <thead>
                <tr>
                    <th></th>
                    <th>Movies</th>
                </tr>
                </thead>
                </thead>

                <tbody>
                <?php
                $query="SELECT films.id, films.video_title FROM films";
                $get_films=mysqli_query($connection,$query);
                confirmQuery($get_films);
                while ($row=mysqli_fetch_assoc($get_films))
                {
                    $film_id = $row['id'];
                    $film_name = $row['video_title'];

                    echo '<tr>';
                    ?>
                    <td><input type="checkbox" name="film_name[]" value="<?php echo $film_id; ?>"></td>
                    <?php
                    echo "<td>$film_name</td>";
                }
                ?>
            </table>
        </div>

        <div class="form-group">
            <label for="">Choose episode you want</label>
            <table class="table table-bordered table-hover">
                <thead>
                <thead>
                <tr>
                    <th></th>
                    <th>Episode</th>
                </tr>
                </thead>
                </thead>

                <tbody>
                <?php
                $query="SELECT episode_of_seasons.id, episode_of_seasons.episode_name, tv_shows.tvshow_title FROM episode_of_seasons
                        INNER JOIN season_of_tvshow ON season_of_tvshow.id=episode_of_seasons.seasons_id
                        INNER JOIN tv_shows ON tv_shows.id=season_of_tvshow.tv_shows_id";
                $get_episode=mysqli_query($connection,$query);
                confirmQuery($get_episode);
                while ($row=mysqli_fetch_assoc($get_episode))
                {
                    $episode_id = $row['id'];
                    $episode_name = $row['episode_name'];
                    $tv_show_name=$row['tvshow_title'];

                    echo '<tr>';
                    ?>
                    <td><input type="checkbox" name="episode_name[]" value="<?php echo $episode_id; ?>"></td>
                    <?php
                    echo "<td>$episode_name ( $tv_show_name ) </td>";
                }
                ?>
            </table>
        </div>

        <div class="form-group">
            <label for="user_image">Choose List Image</label>
            <input type="file" name="list_image">
        </div>

        <div class="form-group">
            <input class="btn btn-success" type="submit" name="create" value="Create">
        </div>

    </form>
</div>
