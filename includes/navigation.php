<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Movies <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="popular.php"><i class="fa fa-fw fa-user"></i> Popular</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Top Rated</a>
                        </li>
                        <li>
                            <a href="upcoming.php"><i class="fa fa-fw fa-gear"></i> Upcoming</a>
                        </li>

                        <li>
                            <a href="nowplaying.php"><i class="fa fa-fw fa-power-off"></i> Now Playing</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> TV Shows <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="tvshow_category.php?category=popular"><i class="fa fa-fw fa-user"></i> Popular</a>
                        </li>
                        <li>
                            <a href="tvshow_category.php?category=toprate"><i class="fa fa-fw fa-envelope"></i> Top Rated</a>
                        </li>
                        <li>
                            <a href="tvshow_category.php?category=ontv"><i class="fa fa-fw fa-gear"></i> On TV</a>
                        </li>

                        <li>
                            <a href="tvshow_category.php?category=airingtoday"><i class="fa fa-fw fa-power-off"></i>Airing Today</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="registration.php">Registration</a>
                </li>
                <?php
                    if(!isset($_SESSION['user_role']))
                    {
                ?>
                        <li>
                            <a href="loginform.php">Login</a>
                        </li>
                <?php
                    }
                    if (isset($_SESSION['user_role']))
                    {
                        $user_role=$_SESSION['user_role'];
                        if ($user_role == 'admin')
                        {
                ?>
                            <li>
                                <a href="/Movie/admin">Admin</a>
                            </li>
                <?php
                        }
                        if ($user_role != 'admin')
                        {
                ?>
                            <li>
                                <a href="/Movie/admin">Profile</a>
                            </li>
                <?php
                        }
                    }

                ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>