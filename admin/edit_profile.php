<?php include 'admin_includes/admin_header.php'; ?>
<?php include "admin_includes/admin_function.php"; ?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include 'admin_includes/admin_navigation.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Your Profile
                        <small><?php echo $_SESSION['username'];?></small>
                    </h1>
                    <?php
                        $user_id=$_SESSION['user_id'];
                        $query="SELECT * FROM users WHERE id={$user_id}";
                        $get_user=mysqli_query($connection,$query);
                        confirmQuery($get_user);
                         $row=mysqli_fetch_assoc($get_user);
                            $db_username=$row['username'];
                    ?>

                    <?php
                        if (isset($_POST['edit_pro']))
                        {

                            $user_id=$_SESSION['user_id'];

                            $new_username=$_POST['username'];
                            $new_passwprd=$_POST['password'];

                            $new_username=mysqli_real_escape_string($connection,$new_username);
                            $new_passwprd=mysqli_real_escape_string($connection,$new_passwprd);

                            if (!empty($new_passwprd))
                            {
                                $new_passwprd=password_hash($new_passwprd,PASSWORD_DEFAULT, array('cost'=>10));
                                $sql="UPDATE users SET username='$new_username', password='$new_passwprd' WHERE id={$user_id}";
                                $update_pro=mysqli_query($connection,$sql);
                                confirmQuery($update_pro);
                                header("Location: edit_profile.php");
                            }
                            else
                            {
                                $sql="UPDATE users SET username='$new_username' WHERE id={$user_id}";
                                $update_pro=mysqli_query($connection,$sql);
                                confirmQuery($update_pro);
                                header("Location: edit_profile.php");
                            }

                        }
                    ?>


                    <form  action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="author">Username</label>
                            <input type="text" class="form-control" value="<?php echo $db_username;?>" name="username" placeholder="New Username">
                        </div>

                        <div class="form-group">
                            <label for="post_status">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_pro" value="Update">
                        </div>

                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include 'admin_includes/admin_footer.php'; ?>
