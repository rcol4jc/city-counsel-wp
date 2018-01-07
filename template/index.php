<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 8/26/2016
 * Time: 9:27 PM
 */
get_header();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>test</h1>
            <?php
            if (have_posts()){
                while (have_posts()){
                    the_post();
                    echo '<h2>'.the_title().'</h2>';
                    echo '<p>'.the_content().'</p>';
                }
            }
            ?>
        </div>
    </div>
</div>
<?php

get_footer();