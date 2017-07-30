<?php include 'admin_includes/admin_header.php'; ?>
<?php include "admin_includes/admin_function.php"; ?>

<div id="wrapper">

    <?php
        if (isset($_SESSION['user_role']))
        {
            $user_role=$_SESSION['user_role'];
            if ($user_role != 'admin')
            {
                header("Location: index.php");
            }
        }
    ?>
    <!-- Navigation -->

    <?php include 'admin_includes/admin_navigation.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Weolcome Admin
                        <small><?php echo $_SESSION['username'];?></small>
                    </h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>username</th>
                                    <th>Gender</th>
                                    <th>Role</th>
                                    <th>Created_at</th>

                                </tr>
                             </thead>
                        </thead>

                        <tbody>
                            <?php
                                $sql="SELECT * FROM users WHERE user_role != 'admin'";
                                $select_users=mysqli_query($connection,$sql);
                                if(!$select_users)
                                {
                                    die("QUERY FAILED ". mysqli_error($connection));
                                }
                                else {
                                    while ($row = mysqli_fetch_assoc($select_users)) {
                                        $user_id = $row["id"];
                                        $username = $row["username"];
                                        $user_gender = $row["gender"];
                                        $user_created_at = $row["created_at"];
                                        $user_role = $row["user_role"];

                                        echo "<tr>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$username</td>";
                                        echo "<td>$user_gender</td>";
                                        echo "<td>$user_role</td>";
                                        echo "<td>$user_created_at</td>";

                                        echo "<td><a class='btn btn-primary' href='view_users.php?admin=$user_id'>Admin</a></td>";
                                        echo "<td><a class='btn btn-success' href='view_users.php?normal=$user_id'>Normal</a></td>";
                                        echo "<td><a class='btn btn-danger' href='view_users.php?delete=$user_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- CHANGE USER_ROLE TO ADMIN -->
                    <?php
                        if (isset($_GET['admin']))
                        {
                            $user_id= $_GET['admin'];
                            $sql="UPDATE users SET user_role='admin' WHERE id={$user_id}";
                            $update_query=mysqli_query($connection,$sql);
                            confirmQuery($update_query);
                            header("LOcation: view_users.php");
                        }
                    ?>

                    <!-- CHANGE USER_ROLE TO NORMAL -->
                    <?php
                    if (isset($_GET['normal']))
                    {
                        $user_id= $_GET['normal'];
                        $sql="UPDATE users SET user_role='normal' WHERE id={$user_id}";
                        $update_query=mysqli_query($connection,$sql);
                        confirmQuery($update_query);
                        header("LOcation: view_users.php");
                    }
                    ?>

                    <!-- DELETE USERS -->
                    <?php
                    if (isset($_GET['delete']))
                    {
                        $user_id= $_GET['delete'];
                        $sql="DELETE FROM users WHERE id={$user_id}";
                        $delete_query=mysqli_query($connection,$sql);
                        confirmQuery($delete_query);
                        header("LOcation: view_users.php");
                    }
                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include 'admin_includes/admin_footer.php'; ?>
