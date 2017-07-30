<?php
/**
 * @param $table
 * @return int
 */
function countRecord($table)
{
    global $connection;
    $sql="SELECT * FROM $table ";
    $select_all_post=mysqli_query($connection,$sql);
    if (!$select_all_post)
    {
        die("QUERY FAILED ". mysqli_error($connection));
    }

    $recordCount=mysqli_num_rows($select_all_post);

    return $recordCount;
}
?>