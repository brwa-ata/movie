<div class="col-md-8">

    <!-- Blog Search Well -->
    <div class="well">
        <form action="../Movie/search.php" method="post"><!-- am actiona wata har yatawa naw xoy -->

            <div class="input-group">
                <input name="search" type="text" class="form-control" placeholder="Search for Movies or TV Shows ... ">
                <span class="input-group-btn">
                <button name="submit_search" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                 </button>
                </span>
                <span>
                    <select class="form-control" name="searchby" id="">
                        <option value="">Search BY</option>
                    <option value="keyword">Keyword</option>
                    <option value="genre">Genre</option>
                    <option value="year">Year</option>
                     </select>
                </span>

            </div>
        </form>
        <!-- /.input-group -->
    </div>

</div>