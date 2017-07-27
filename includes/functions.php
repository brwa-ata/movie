<?php
function confirmQuery($query)
{
    global $connection;
    if (!$query)
    {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}
function redirect($location)
{
    header("Location:". $location);
}
?>