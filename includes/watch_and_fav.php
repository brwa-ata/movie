<!-- FOR MOVIE -->
<?php // INSERT AND DELETE FAVORITE
if (isset($_POST['favorite']))
{
    $user_id=$_SESSION['user_id'];
    $favorite_sql="INSERT INTO favorite (films_id,user_id) VALUES ({$the_film_id}, {$user_id})";
    $add_favorite=mysqli_query($connection,$favorite_sql);
    confirmQuery($add_favorite);
}
if (isset($_POST['unfavorite']))
{
    $query3="DELETE FROM favorite WHERE films_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
    $delete_fav=mysqli_query($connection,$query3);
    confirmQuery($delete_fav);
}
?>
    <!-- FAVORITE FORM -->
<?php
if (isset($_SESSION['user_id']))
{
    $fav_table="SELECT * FROM favorite WHERE films_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
    $get_fav=mysqli_query($connection,$fav_table);
    confirmQuery($get_fav);
    if (!mysqli_num_rows($get_fav)>0)
    {
        ?>
        <form action="" method="post">
            <input class="btn btn-success" type="submit" name="favorite" value="Favorite">
        </form>
        <?php
    }
    else
    {
        ?>
        <form action="" method="post">
            <input class="btn btn-danger" type="submit" name="unfavorite" value="UnFavorit">
        </form>
        <?php
    }
}
?>


<?php // INSERT AND DELETE WATCHLIST
if (isset($_POST['watchlist']))
{
    $user_id=$_SESSION['user_id'];
    $watch_sql="INSERT INTO watchlist (film_id,user_id) VALUES ({$the_film_id}, {$user_id})";
    $add_watch=mysqli_query($connection,$watch_sql);
    confirmQuery($add_watch);
}
if (isset($_POST['unwatchlist']))
{
    $query4="DELETE FROM watchlist WHERE film_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
    $delete_watch=mysqli_query($connection,$query4);
    confirmQuery($delete_watch);
}
?>
    <!-- WATCHLIST FORM -->
<?php
if (isset($_SESSION['user_id']))
{
    $watch_table="SELECT * FROM watchlist WHERE film_id={$the_film_id} AND user_id={$_SESSION['user_id']}";
    $get_watch=mysqli_query($connection,$watch_table);
    confirmQuery($get_watch);
    if (!mysqli_num_rows($get_watch)>0)
    {
        ?>
        <form action="" method="post">
            <input class="btn btn-primary" type="submit" name="watchlist" value="Add to watchlist">
        </form>
        <?php
    }
    else
    {
        ?>
        <form action="" method="post">
            <input class="btn btn-danger" type="submit" name="unwatchlist" value="delete from watchlist">
        </form>
        <?php
    }
}
?>
