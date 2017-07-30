<?php include "includes/db_connection.php"; ?>
<?php include "includes/functions.php"; ?>
<?php
    if (isset($_GET['rate']))
    {
        $rate=$_GET['rate'];
        $film_id=$_GET['film_id'];
        $user_id=$_GET['user_id'];

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
?>