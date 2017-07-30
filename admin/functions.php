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


/***
 * @param $username
 * @param $password
 */
function login_user($username, $password)
{
    global $connection;

    $username = trim($username);
    $password = trim($password);

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $row['id'];
        $db_username = $row['username'];
        $db_user_password = $row['password'];
        $db_user_gender = $row['gender'];
        $db_user_created_at = $row['created_at'];
        $db_user_role = $row['user_role'];
    }

    if (password_verify($password,$db_user_password)) {

        $_SESSION['username'] = $db_username;
        $_SESSION['gender'] = $db_user_gender;
        $_SESSION['created_at'] = $db_user_created_at;
        $_SESSION['user_role'] = $db_user_role;

        header("Location: /Movie/admin");

    } else {

        header("Location: /Movie/index.php");
    }
}

?>