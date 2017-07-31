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

            $sql="INSERT INTO films (video_title,released_date ,overview, budget, revenue, duration, image) 
                  VALUES ('$film_title', '$film_released_date' ,'$film_overview',$film_budget,$film_revenue,$film_duration,'$film_image')";
            $insert_film=mysqli_query($connection,$sql);
            confirmQuery($insert_film);

            // INPUT GENRE TYPE
            $new_film_id=mysqli_insert_id($connection);
            foreach ($_POST['genre_type'] as $defined_genre_id)
            {
                $genre_query="INSERT INTO genre (films_id, defined_genre_id) VALUES ($new_film_id,$defined_genre_id) ";
                $insert_genre=mysqli_query($connection,$genre_query);
            }

            // INSERT PRODUCTION COUNTRY
            foreach ($_POST['country'] as $pro_country)
            {
                $country_query="INSERT INTO production_country (country_name, films_id)
                                VALUES ('$pro_country' , $new_film_id)";
                $insert_country=mysqli_query($connection,$country_query);
            }

            // INSERT PRODUCTION COMPANY
            foreach ($_POST['company'] as $pro_company)
            {
                $company_query="INSERT INTO production_company (company_name, films_id)
                                VALUES ('$pro_company' , $new_film_id)";
                $insert_country=mysqli_query($connection,$company_query);
            }

            // INSERT FILM's BACKDROP AND POSTER
            $film_backdrop = $_FILES['film_backdrop']['name'];
            $temp_film_backdrop=$_FILES['film_backdrop']['tmp_name'];
            $film_poster = $_FILES['film_poster']['name'];
            $temp_film_poster=$_FILES['film_poster']['tmp_name'];

            move_uploaded_file($temp_film_backdrop,"../images/$film_backdrop");
            move_uploaded_file($temp_film_poster,"../images/$film_poster");

            $images_query="INSERT INTO film_images (film_backdrop, film_poster , film_id)
                            VALUES ('$film_backdrop' , '$film_poster' , $new_film_id)";
            $insert_images=mysqli_query($connection,$images_query);

            //INSERT LANGUAGE
            $film_language=$_POST['film_language'];
            $lang_query="INSERT INTO language (language_name, films_id)
                          VALUES ('$film_language', $new_film_id)";
            $insert_language=mysqli_query($connection,$lang_query);

    }// END OF INSERTION



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
        <label for="post_status">Language</label>
        <input type="text" class="form-control" name="film_language" >
    </div>

    <div class="form-group">
        <label for="user_image">Choose Poster</label>
        <input type="file" name="film_image">
    </div>

    <div class="form-group">
        <table class="table table-bordered table-hover">
            <thead>
                <thead>
                <tr>
                    <th></th>
                    <th>Genre Type</th>
                </tr>
                </thead>
            </thead>

            <tbody>
            <?php
            $query="SELECT * FROM defined_genre";
            $get_genre=mysqli_query($connection,$query);
            confirmQuery($get_genre);
            while ($row=mysqli_fetch_assoc($get_genre))
            {
                $genre_id = $row['id'];
                $genretype = $row['genretype'];

                echo '<tr>';
                ?>
                <td><input type="checkbox" name="genre_type[]" value="<?php echo $genre_id; ?>"></td>
            <?php
                echo "<td>$genretype</td>";
            }
            ?>
        </table>
    </div>

    <div class="form-group">
        <label for="">Production Country</label>
        <input class="form-control" type="text" name="country[]" placeholder="Add a country">
        <input class="form-control" type="text" name="country[]" placeholder="Add another country">
        <input class="form-control" type="text" name="country[]" placeholder="Add another country">
    </div>

    <div class="form-group">
        <label for="">Production Company</label>
        <input class="form-control" type="text" name="company[]" placeholder="Add a company">
        <input class="form-control" type="text" name="company[]" placeholder="Add another company">
        <input class="form-control" type="text" name="company[]" placeholder="Add another company">
        <input class="form-control" type="text" name="company[]" placeholder="Add another company">
    </div>

    <div class="form-group">
        <label for="user_image">Choose Film Backdrop</label>
        <input type="file" name="film_backdrop">
    </div>

    <div class="form-group">
        <label for="user_image">Choose Film Poster</label>
        <input type="file" name="film_poster">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_film" value="Insert">
    </div>

</form>
