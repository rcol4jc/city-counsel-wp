<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 10/22/2016
 * Time: 6:41 PM
 */
get_header();
?>
<div id="maps_page_id" style="display:none;">Business</div>
<div class="container">
    <?php if (have_posts()){
        $business=array();
        while (have_posts()){
            the_post();
            $business['the_ID']=get_the_ID();
            $business['the_title']=get_the_title();
            $business['the_content']=get_the_content();
            $business['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(),'Full',array('class'=>'img-responsive center'));
            $business['the_excerpt']=get_the_excerpt();
            $business['Street_Address']=get_post_meta(get_the_ID(),'Street_Address',true);
            $business['City']=get_post_meta(get_the_ID(), 'City',true);
            $business['Phone_Number']=get_post_meta(get_the_ID(), 'Phone_Number',true);
            $business['Hours']=get_post_meta(get_the_ID(), 'Hours', true);


        }
    }

        ?>
    <div class="row">
        <div class="col-lg-12" class="main_pic">

            <?php echo $business['the_post_thumbnail']?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2><?php echo $business['the_title'];?></h2>
            </div>
            <p>
                <?php echo do_shortcode($business['the_content']); ?>
            </p>
            <div class="page-header">
                &nbsp;
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div id="Business_Map"></div>
        </div>
        <div class="col-lg-6">
            <div class="page-header">
                <h3>Info:</h3>
            </div>
            <address><span id="Street_Address"><?php echo $business['Street_Address']; ?></span><br/>
            <span id="City"><?php echo $business['City']; ?></span>, <span id="State">TX</span> <span id="Zip">79520</span><br/></address>
            <span id="Phone_Number"><?php echo $business['Phone_Number']; ?></span>
            <h6><strong>Hours:</strong></h6>
            <?php echo $business['Hours']; ?>
        </div>
    </div>
</div>

<?php get_footer();?>