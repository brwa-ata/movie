<?php
$film_count = countRecord('films');
$tv_shows_count = countRecord('tv_shows');
$users_count = countRecord('users');
?>
<div class="row">
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],

                <?php
                $element_text = ['Films', 'TV Shows', 'Users'];
                $element_count = [$film_count, $tv_shows_count, $users_count];
                for ($i = 0; $i < 3; $i++) {
                    echo "['$element_text[$i]'" . "," . "$element_count[$i]],";
                }
                ?>
            ]);
            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };
            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <!-- am scriptay xwarawa pewsyta bo kar pe krdny scriptakay sarawa -->
    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
</div>