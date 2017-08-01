<?php include "includes/db_connection.php"; ?>
<?php include "includes/functions.php"; ?>
<?php
    if (isset($_GET['rate']))
    {
        $rate=$_GET['rate'];
        $film_id=$_GET['film_id'];
        $user_id=$_GET['user_id'];

        $query="SELECT * FROM rating WHERE  film_id={$film_id}";
        $ex=mysqli_query($connection,$query);
        confirmQuery($ex);
        while ($row=mysqli_fetch_assoc($ex))
        {
            $db_user_id=$row['user_id'];
            $db_film_id=$row['film_id'];

            if ($user_id != $db_user_id && $film_id!= $db_film_id)
            {
                switch ($rate)
                {
                    case 1:
                        $sql="INSERT INTO rating (rated,film_id,user_id) VALUES ($rate,$film_id,$user_id)";
                        $rating=mysqli_query($connection,$sql);
                        confirmQuery($rating);
                        header("Location: post.php?film_id=$film_id");
                        break;
                    case 2:
                        $sql="INSERT INTO rating (rated,film_id,user_id) VALUES ($rate,$film_id,$user_id)";
                        $rating=mysqli_query($connection,$sql);
                        confirmQuery($rating);
                        header("Location: post.php?film_id=$film_id");
                        break;
                    case 3:
                        $sql="INSERT INTO rating (rated,film_id,user_id) VALUES ($rate,$film_id,$user_id)";
                        $rating=mysqli_query($connection,$sql);
                        confirmQuery($rating);
                        header("Location: post.php?film_id=$film_id");
                        break;
                    case 4:
                        $sql="INSERT INTO rating (rated,film_id,user_id) VALUES ($rate,$film_id,$user_id)";
                        $rating=mysqli_query($connection,$sql);
                        confirmQuery($rating);
                        header("Location: post.php?film_id=$film_id");
                        break;
                    case 5:
                        $sql="INSERT INTO rating (rated,film_id,user_id) VALUES ($rate,$film_id,$user_id)";
                        $rating=mysqli_query($connection,$sql);
                        confirmQuery($rating);
                        header("Location: post.php?film_id=$film_id");
                        break;
                }
            }
            else
            {
                echo "<script> alert('You already rated this film'); </script>";
            }
        }


    }
?>