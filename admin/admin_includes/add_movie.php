<?php include 'admin_function.php'; ?>
<?php
    if (isset($_POST['add_film']))
    {
        if (!empty($_POST['film_title']) && !empty($_POST['film_budget']))
        {
            $film_title = $_POST['film_title'];
            $film_overview = $_POST['film_overview'];

            $time = strtotime($_POST['film_released_date']);      // TO GET THE DATE FROM THE FORM
            if ($time != false){
                $film_released_date = date('Y-m-d', $time);
                }
            $film_budget = $_POST['film_budget'];
            $film_revenue = $_POST['film_revenue'];
            $film_duration = $_POST['film_duration'];

            $film_image = $_FILES['film_image']['name'];
            $temp_image=$_FILES['film_image']['tmp_name'];

            move_uploaded_file($temp_image,"../images/$film_image");

            $sql="INSERT INTO films (video_title, overview, budget, revenue, duration, image) 
                  VALUES ('$film_title','$film_overview',$film_budget,$film_revenue,$film_duration,'$film_image')";
            $insert_film=mysqli_query($connection,$sql);
            confirmQuery($insert_film);
            ?>
            <div class="form-group">
                <label for="">You have to <i>click</i> this button to finish insertion</label>
                <a class="btn btn-primary" href="complete_film_insetion?new_film_id=<?php echo $insert_film; ?>">Next</a>
            </div>
<?php
        }
        else
        {
            echo "<script> alert('These fields can not be empty'); </script>";
        }
    }
?>
<form  action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="author">Video Title</label>
        <input type="text" class="form-control" name="film_title">
    </div>

    <div class="form-group">
        <label for="post_status">overview</label>
        <input type="text" class="form-control" name="film_overview">
    </div>

    <div class="form-group">
        <label for="post_status">Released Date</label>
        <input type="date" class="form-control" name="film_released_date">
    </div>

    <div class="form-group">
        <label for="post_status">Budget</label>
        <input type="text" class="form-control" name="film_budget">
    </div>

    <div class="form-group">
        <label for="post_status">Revenue</label>
        <input type="text" class="form-control" name="film_revenue">
    </div>

    <div class="form-group">
        <label for="post_status">Duration</label>
        <input type="text" class="form-control" name="film_duration" placeholder="duration in minute">
    </div>

    <div class="form-group">
        <label for="user_image">Choose Poster</label>
        <input type="file" name="film_image">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_film" value="Add">
    </div>

</form>
