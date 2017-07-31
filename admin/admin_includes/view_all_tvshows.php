<?php include "admin_function.php";?>
<table class="table table-bordered table-hover">
    <thead>
        <thead>
            <tr>
                <th>Tv Show Title</th>
                <th>Views</th>
            </tr>
        </thead>
    </thead>

    <tbody>

    <?php
        $sql="SELECT id,tvshow_title,popularity FROM tv_shows";
        $select=mysqli_query($connection,$sql);
        while ($row=mysqli_fetch_assoc($select))
        {
            $tv_show_id=$row['id'];
            $tv_title=$row['tvshow_title'];
            $popular=$row['popularity'];
    ?>
            <tr>
                <td><a href="../post.php?tvshow_id=<?php echo $tv_show_id; ?>"><?php echo $tv_title; ?></a></td>
                <td><?php echo $popular; ?></td>
        <?php
                echo "<td><a class='btn btn-danger' href='add_movie_tv.php?delete_tv=$tv_show_id'>Delete</a></td>";
           ?>
            </tr>
    <?php
        }
    ?>

    </tbody>
</table>