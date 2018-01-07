<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 10/29/2016
 * Time: 12:00 PM
 */
get_header();
?>
    <div class="container">
        <?php
        if (have_posts()){
            while (have_posts()){
                the_post();
                the_title();
            }
        }
        ?>
    </div>
<?php
get_footer();
?>