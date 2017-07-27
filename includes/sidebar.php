<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search By</h4>
        <form action="../Movie/search.php" method="post"><!-- am actiona wata har yatawa naw xoy -->
            <select class="form-control" name="searchby" id="">
                <option value="keyword">Keyword</option>
                <option value="genre">Genre</option>
                <option value="year">Year</option>
            </select><br>
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                <button name="submit_search" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                 </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">

            </div>

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>


</div>