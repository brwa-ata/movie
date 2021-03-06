<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index">Admin Office</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="../index"  >Home </a>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php echo $_SESSION['username']; ?>
                <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li>
                    <a href="edit_profile"><i class="fa fa-fw fa-user"></i> Edit Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li >

                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> TV Show <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="add_movie_tv.php?order=addtv">Add TV Show</a>
                    </li>
                    <li>
                        <a href="#">Add Season</a>
                    </li>
                    <li>
                        <a href="#">Add Episode</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="add_movie_tv.php?order=addmovie"><i class="fa fa-fw fa-edit"></i> Add Movie</a>
            </li>
            <li>
                <a href="view_users.php"><i class="fa fa-fw fa-table"></i> View all users</a>
            </li>
            <li>
                <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Activities <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users_dropdown" class="collapse">
                    <li>
                        <a href="/Movie/admin/favorite<?php echo $_SESSION['user_id']; ?>"> Favorites</a>
                    </li>
                    <li>
                        <a href="/Movie/admin/watchlist<?php echo $_SESSION['user_id']; ?>"> Watchlist</a>
                    </li>
                    <li>
                        <a href="/Movie/admin/lists<?php echo $_SESSION['user_id']; ?>"> Lists</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="/Movie/admin/rating_and_review<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-fw fa-dashboard"></i> Rating & Review</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>