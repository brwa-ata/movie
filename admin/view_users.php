<?php include 'admin_includes/admin_header.php'; ?>


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
                                $sql="SELECT * FROM users";
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
                                        echo "<td><a class='btn btn-primary' href='view_users.php?change_to_admin=$user_id'>Admin</a></td>";
                                        echo "<td><a class='btn btn-success' href='view_users.php?change_to_normal=$user_id'>Normal</a></td>";
                                        echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include 'admin_includes/admin_footer.php'; ?>
