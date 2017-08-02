<?php include 'admin_function.php'; ?>

<?php
    if (isset($_POST['add_tv']))
    {
        if (!empty($_POST['tvshow_title']))
        {
            // TV SHOWS INFO
            $tvshow_title=$_POST['tvshow_title'];
            $tvshow_overview=$_POST['tvshow_overview'];
            $tvshow_image = $_FILES['tvshow_image']['name'];
            $temp_tvshow_image=$_FILES['tvshow_image']['tmp_name'];

            $tvshow_title=mysqli_real_escape_string($connection,$tvshow_title);
            $tvshow_overview=mysqli_real_escape_string($connection,$tvshow_overview);

            move_uploaded_file($temp_tvshow_image,"../images/tvshows/$tvshow_image");
            $sql="INSERT INTO tv_shows (tvshow_title, overview, image)
                  VALUES ('$tvshow_title', '$tvshow_overview', '$tvshow_image')";
            $insert_tvshow=mysqli_query($connection,$sql);
            confirmQuery($insert_tvshow);

            echo $tvshow_title.'<br>';
            echo $tvshow_overview.'<br>';
            echo $tvshow_image.'<br><br>';

            $new_tvshow_id=mysqli_insert_id($connection);// GETTING ID OF THE LATEST OR NEWEST RECORD

            // SEASON OF TV SHOW INFO
            $season_number=$_POST['season_number'];
            $season_overview=$_POST['season_overview'];
            $season_year=$_POST['season_year'];
            $season_image = $_FILES['season_image']['name'];
            $temp_season_image=$_FILES['season_image']['tmp_name'];

            $season_number=mysqli_real_escape_string($connection,$season_number);
            $season_overview=mysqli_real_escape_string($connection,$season_overview);


            move_uploaded_file($temp_season_image,"../images/tvshows/$season_image");
            $season_query="INSERT INTO season_of_tvshow (season , tv_shows_id , overview, year, image) 
                           VALUES ('$season_number',$new_tvshow_id,'$season_overview',$season_year,'$season_image')";
            $insert_season=mysqli_query($connection,$season_query);
            confirmQuery($insert_season);

            echo $season_number.'<br>';
            echo $season_overview.'<br>';
            echo $season_year.'<br>';
            echo $season_image.'<br>';
            echo $new_tvshow_id.'<br><br>';

            // EPISODE OF SEASON INFO
            $episode_name=$_POST['episode_name'];
            $episode_number=$_POST['episode_number'];
            $time = strtotime($_POST['episode_released_date']);      // TO GET THE DATE FROM THE FORM
            if ($time != false){
                $episode_released_date = date('Y-m-d', $time);
            }
            $episode_budget=$_POST['episode_budget'];
            $episode_revenue=$_POST['episode_revenue'];
            $episode_overview=$_POST['episode_overview'];
            $episode_duration=$_POST['episode_duration'];
            $episode_language=$_POST['episode_language'];
            $episode_image = $_FILES['episode_image']['name'];
            $temp_episode_image=$_FILES['episode_image']['tmp_name'];

            $episode_name=mysqli_real_escape_string($connection,$episode_name);
            $episode_overview=mysqli_real_escape_string($connection,$episode_overview);


            $new_season_id=mysqli_insert_id($connection);
            move_uploaded_file($temp_episode_image,"../images/tvshows/$episode_image");

            $episode_query="INSERT INTO episode_of_seasons (episode_name,episode_number,seasons_id,released_date,episode_revenue,episode_budget,episode_overview,image,duration)
VALUES ('$episode_name','$episode_number',{$new_season_id},'$episode_released_date',{$episode_revenue},{$episode_budget},'$episode_overview','$episode_image',{$episode_duration})";
            $insert_episode=mysqli_query($connection,$episode_query);
            confirmQuery($insert_episode);
            
            
            // INSERT EPISODE's BACKDROP AND POSTER
            $episode_backdrop = $_FILES['episode_backdrop']['name'];
            $temp_episode_backdrop=$_FILES['episode_backdrop']['tmp_name'];
            $episode_poster = $_FILES['episode_poster']['name'];
            $temp_episode_poster=$_FILES['episode_poster']['tmp_name'];

            $new_episode_id=mysqli_insert_id($connection);
            move_uploaded_file($temp_episode_backdrop,"../images/tvshows/$episode_backdrop");
            move_uploaded_file($temp_episode_poster,"../images/tvshows/$episode_poster");

            $images_query="INSERT INTO episode_images (episode_backdrop, episode_posterl , episode_id)
                            VALUES ('$episode_backdrop' , '$episode_poster' , $new_episode_id)";
            $insert_images=mysqli_query($connection,$images_query);
            confirmQuery($insert_images);


            //INSERT LANGUAGE
            $episode_language=$_POST['episode_language'];
            $lang_query="INSERT INTO language (language_name, episode_id)
                          VALUES ('$episode_language', $new_episode_id)";
            $insert_language=mysqli_query($connection,$lang_query);
            confirmQuery($insert_language);
            


            // INPUT GENRE TYPE
            $new_film_id=mysqli_insert_id($connection);
            foreach ($_POST['genre_type'] as $defined_genre_id)
            {
                $genre_query="INSERT INTO genre (tv_shows_id, defined_genre_id) VALUES ($new_tvshow_id,$defined_genre_id) ";
                $insert_genre=mysqli_query($connection,$genre_query);
                confirmQuery($insert_genre);
            }

            // INSERT PRODUCTION COUNTRY
            foreach ($_POST['country'] as $pro_country)
            {
                $country_query="INSERT INTO production_country (country_name, tv_shows_id)
                                VALUES ('$pro_country' , $new_tvshow_id)";
                $insert_country=mysqli_query($connection,$country_query);
                confirmQuery($insert_country);
            }

            // INSERT PRODUCTION COMPANY
            foreach ($_POST['company'] as $pro_company)
            {
                $company_query="INSERT INTO production_company (company_name, tv_shows_id)
                                VALUES ('$pro_company' , $new_tvshow_id)";
                $insert_company=mysqli_query($connection,$company_query);
                confirmQuery($insert_company);

            }




        }
        else
        {
            echo "<script> alert('Please fill all fields') </script>";
        }
    }
?>
<form  action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="author">TV Show Title</label>
        <input type="text" class="form-control" name="tvshow_title">
    </div>

    <div class="form-group">
        <label for="post_status">Overview</label>
        <input type="text" class="form-control" name="tvshow_overview">
    </div>

    <div class="form-group">
        <label for="user_image">Choose Poster for TV Show</label>
        <input type="file" name="tvshow_image">
    </div>

    <div class="form-group">
        <label for="author">Season Number</label>
        <input type="text" class="form-control" name="season_number" placeholder="Example/ season 1">
    </div>

    <div class="form-group">
        <label for="post_status">Season Overview</label>
        <input type="text" class="form-control" name="season_overview">
    </div>

    <div class="form-group">
        <label for="post_status">Year of Production</label>
        <input type="number" class="form-control" name="season_year">
    </div>

    <div class="form-group">
        <label for="user_image">Choose Poster for Season</label>
        <input type="file" name="season_image">
    </div>

    <div class="form-group">
        <label for="post_status">Episode Name</label>
        <input type="text" class="form-control" name="episode_name">
    </div>

    <div class="form-group">
        <label for="post_status">Episode Number</label>
        <input type="text" class="form-control" name="episode_number" placeholder="Example/ episode 1">
    </div>

    <div class="form-group">
        <label for="post_status">Episode Released Date</label>
        <input type="date" class="form-control" name="episode_released_date">
    </div>

    <div class="form-group">
        <label for="post_status">Episode Budget</label>
        <input type="number" class="form-control" name="episode_budget">
    </div>

    <div class="form-group">
        <label for="post_status">Episode Revenue</label>
        <input type="number" class="form-control" name="episode_revenue">
    </div>

    <div class="form-group">
        <label for="post_status">Episode Overview</label>
        <input type="text" class="form-control" name="episode_overview">
    </div>

    <div class="form-group">
        <label for="post_status">Duration</label>
        <input type="number" class="form-control" name="episode_duration" placeholder="duration in minute">
    </div>

    <div class="form-group">
        <label for="post_status">Language</label>
        <input type="text" class="form-control" name="episode_language" >
    </div>

    <div class="form-group">
        <label for="user_image">Choose Poster for Episode</label>
        <input type="file" name="episode_image">
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
        <input type="file" name="episode_backdrop">
    </div>

    <div class="form-group">
        <label for="user_image">Choose Film Poster</label>
        <input type="file" name="episode_poster">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_tv" value="Insert">
    </div>

</form>
