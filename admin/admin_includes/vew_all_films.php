<?php include "admin_function.php";?>
<table class="table table-bordered table-hover">
    <thead>
        <thead>
            <tr>
                <th>Film Title</th>
                <th>Released_date</th>
                <th>Revenue</th>
                <th>Budget</th>
                <th>Duration</th>
                <th>Views</th>
                <th>Genre</th>
                <th>Language</th>
                <th>Company</th>
                <th>Country</th>
            </tr>
        </thead>
    </thead>

    <tbody>

        <?php
            // SHOW ALL INFO IN THE FILMS TABLE
            $query = "SELECT films.id, films.video_title,  date_format(released_date,'%d %M %Y') AS 'released_date', concat('$',revenue,' milion') AS 'revenue',
                        concat(duration,'min') AS 'duration' , concat('$',budget) AS 'budget', films.popularity  FROM films";
            $show_film = mysqli_query($connection, $query);
            confirmQuery($show_film);

            while ($row = mysqli_fetch_assoc($show_film))
            {
                $films_id=$row['id'];
                $film_title = $row['video_title'];
                $film_released_date = $row['released_date'];
                $film_revenue = $row['revenue'];
                $film_budget = $row['budget'];
                $film_duration = $row['duration'];
                $film_views = $row['popularity'];

                ?>
                <tr>
                    <td><a href="../post.php?film_id=<?php echo $films_id; ?>"><?php echo $film_title; ?></a></td>
                    <td><?php echo $film_released_date; ?>  </td>
                    <td><?php echo $film_revenue; ?>  </td>
                    <td><?php echo $film_budget; ?>  </td>
                    <td><?php echo $film_duration; ?>  </td>
                    <td><?php echo $film_views; ?>  </td>

                    <!-- SHOW THE FILM's GENRE TYPE  -->
                    <td>
                        <table>
                            <tr>
                                <?php $query2 = "SELECT defined_genre.genretype AS 'genretype' FROM defined_genre
                                                INNER JOIN genre ON genre.defined_genre_id = defined_genre.id
                                                INNER JOIN films ON films.id= genre.films_id WHERE films.id=$films_id";
                                                $get_genre_type = mysqli_query($connection, $query2);
                                                confirmQuery($query2);
                                                while ($row2 = mysqli_fetch_assoc($get_genre_type))
                                                {
                                                    $film_genre_type = $row2['genretype'];
                                                    ?>
                                <td><?php echo $film_genre_type.",";?></td>
                                <?php
                                                  }
                                ?>
                            </tr>
                        </table>
                    </td>

                    <!-- SHOW THE FILM's LANGUAGE -->
                    <td>
                        <table>
                            <tr>
                                <?php
                                    $sql = "SELECT language_name FROM language 
                                            INNER JOIN films ON language.films_id = films.id 
                                            WHERE films.id=$films_id LIMIT 2";
                                            $get_language = mysqli_query($connection, $sql);
                                            confirmQuery($get_language);
                                            while ($row5 = mysqli_fetch_assoc($get_language))
                                            {
                                            $film_language = $row5['language_name'];
                                ?>
                                <td><?php echo $film_language.','?></td>
                                <?php
                                    }
                                ?>
                            </tr>
                        </table>
                    </td>

                    <!-- SHOW FILM's PRODUCTION COMPANY -->
                    <td>
                        <table>
                            <tr>
                                <?php
                                $sql = "SELECT company_name FROM production_company 
                                          INNER JOIN films ON production_company.films_id = films.id 
                                          WHERE films.id=$films_id LIMIT 1";
                                            $get_company = mysqli_query($connection, $sql);
                                            confirmQuery($get_company);
                                            while ($row3 = mysqli_fetch_assoc($get_company))
                                            {
                                                $company_name = $row3['company_name'];
                                ?>
                                                <td><?php echo $company_name;?></td>
                                <?php
                                            }
                                ?>
                            </tr>
                        </table>
                    </td>

                    <!-- SHOW FILM's PRODUCTION COUNTRY -->
                    <td>
                        <table>
                            <tr>
                                <?php
                                    $sql = "SELECT country_name FROM production_country
                                            INNER JOIN films ON production_country.films_id = films.id 
                                            WHERE films.id=$films_id LIMIT 1";
                                            $get_country = mysqli_query($connection, $sql);
                                            confirmQuery($get_country);
                                            while ($row4 = mysqli_fetch_assoc($get_country))
                                            {
                                                $country_name = $row4['country_name'];
                                ?>
                                                <td><?php echo $country_name?></td>
                                <?php
                                            }
                                ?>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php
            }
        ?>


    </tbody>
</table>