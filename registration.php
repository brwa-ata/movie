<?php  include "includes/db_connection.php"; ?>
<?php  include "includes/header.php"; ?>

<?php
if (isset($_POST['submit']))
{
    if(!empty($_POST['username'])  && !empty($_POST['password']))
    {
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $password=password_hash($password, PASSWORD_DEFAULT, array('cost'=>10) );

        $query="INSERT INTO users(username,password,gender,created_at) 
                    VALUES ('$username','$password','$gender',now())";
        $register_user=mysqli_query($connection,$query);
        if (!$register_user)
        {
            die("QUERY FAILED ". mysqli_error($connection));
        }
        else
        {
            header("Location: /Movie/admin");
        }
    }
}
?>
<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">

                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Enter Desired Username"
                                       value="<?php echo isset($username) ? $username : ''; ?>" >
                            </div>

                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>


                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" id="">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>
