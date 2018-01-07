<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 10/30/2016
 * Time: 5:50 PM
 */
get_header();
if (have_posts()){
    while (have_posts()){
        the_post();

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php echo get_the_post_thumbnail(get_the_ID(),'Full',array('class'=>'img-responsive center'));?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2><?php echo get_the_title();?></h2>
            </div>
            <p>
                <?php echo do_shortcode(get_the_content()); ?>
            </p>
        </div>
    </div>
</div>
<?php
    }
}
get_footer();