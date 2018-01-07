
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search" style="padding-top:10px;">
    <div class="form-group">
        <label for="s" class="sr-only">Search For</label>
        <input type="text" name="s" class="form-control" id="search" value="<?php the_search_query(); ?>" placeholder="Search Words Here"/>
    </div>
    <button type="submit" class="btn btn-default">Search</button>

</form>