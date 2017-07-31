<?php include "includes/db_connection.php"; ?>
<?php include "includes/functions.php"; ?>
<?php
    if (isset($_GET['rate']))
    {
        $rate=$_GET['rate'];
        $episode_id=$_GET['episode_id'];
        $user_id=$_GET['user_id'];
        $season_id=$_GET['season_id'];
        $tv_show_id=$_GET['tv_id'];



       switch ($rate)
       {
           case 1:
               $sql="INSERT INTO rating (rated,episod_id,user_id) VALUES ($rate,$episode_id,$user_id)";
               $rating=mysqli_query($connection,$sql);
               confirmQuery($rating);
               header("Location: episode_info.php?episode_id=$episode_id&season_id=$season_id&tvshow_id=$tv_show_id");
               break;
           case 2:
               $sql="INSERT INTO rating (rated,episod_id,user_id) VALUES ($rate,$episode_id,$user_id)";
               $rating=mysqli_query($connection,$sql);
               confirmQuery($rating);
               header("Location: episode_info.php?episode_id=$episode_id&season_id=$season_id&tvshow_id=$tv_show_id");
               break;
           case 3:
               $sql="INSERT INTO rating (rated,episod_id,user_id) VALUES ($rate,$episode_id,$user_id)";
               $rating=mysqli_query($connection,$sql);
               confirmQuery($rating);
               header("Location: episode_info.php?episode_id=$episode_id&season_id=$season_id&tvshow_id=$tv_show_id");
               break;
           case 4:
               $sql="INSERT INTO rating (rated,episod_id,user_id) VALUES ($rate,$episode_id,$user_id)";
               $rating=mysqli_query($connection,$sql);
               confirmQuery($rating);
               header("Location: episode_info.php?episode_id=$episode_id&season_id=$season_id&tvshow_id=$tv_show_id");
               break;
           case 5:
               $sql="INSERT INTO rating (rated,episod_id,user_id) VALUES ($rate,$episode_id,$user_id)";
               $rating=mysqli_query($connection,$sql);
               confirmQuery($rating);
               header("Location: episode_info.php?episode_id=$episode_id&season_id=$season_id&tvshow_id=$tv_show_id");
               break;
       }
    }
?>