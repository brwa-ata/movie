<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $films_count=countRecord('films'); // pet ale ka chan post haya chwnka aw har royak 7sab aka
                        echo " <div class='huge'>$films_count</div>";
                        ?>
                        <div>Films</div>
                    </div>
                </div>
            </div>
            <a href="add_movie_tv.php?order=viewfilms">
                <div class="panel-footer">
                    <span class="pull-left">View All Films</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $tvshow_count=countRecord('tv_shows');
                        echo "<div class='huge'>$tvshow_count</div>";
                        ?>
                        <div>TV Shows</div>
                    </div>
                </div>
            </div>
            <a href="add_movie_tv.php?order=viewtvshow">
                <div class="panel-footer">
                    <span class="pull-left">View All TV Shows</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $user_count=countRecord('users');
                        echo "<div class='huge'>$user_count</div>";
                        ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="view_users.php">
                <div class="panel-footer">
                    <span class="pull-left">View All Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>