<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 10/30/2016
 * Time: 5:27 PM
 */
get_header();
$news=array();
if (have_posts()){
    while (have_posts()){
        the_post();
        $news['the_ID']=get_the_ID();
        $news['the_title']=get_the_title();
        $news['the_content']=get_the_content();
        If (!has_post_thumbnail()){
            $news['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-News-Logo.gif" class="img-responsive" alt="Hamlin Event Default Image" />';
        } else {
            $news['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(),'showcase',array('class'=>'img-responsive center'));
        }


    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12" class="main_pic">

            <?php echo $news['the_post_thumbnail']?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2><?php echo $news['the_title']; ?></h2>
            </div>
            <p>
                <?php echo do_shortcode($news['the_content']); ?>
            </p>
        </div>
    </div>
</div>
<?php
get_footer();