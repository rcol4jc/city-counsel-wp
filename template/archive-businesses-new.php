<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 12/11/2016
 * Time: 5:56 PM
 */
get_header();
echo '<ol>';
if (have_posts()){
    while (have_posts()){
        the_post();

        echo '<li>'.get_the_title().'</li>';
    }
}
echo '</ol>';
get_footer();