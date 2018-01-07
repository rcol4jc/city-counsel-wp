<?php
/**
  * Template Name: All Events
  */
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2>All Events</h2>
            </div>
            <?php
            $args=array(
                'post_type'=>'events',
                'posts_per_page'=>-1,
                'meta_key'=>'Start_Date',
                'orderby'=>'meta_value',
                'order'=>'DESC'
            );
            $events_query=new WP_Query($args);
            if ($events_query->have_posts()){
                while ($events_query->have_posts()){
                    $events_query->the_post();
                    ?>
                    <div style="border-radius:0;border-color:#257300" class="panel panel-default">
                        <div style="background-color:#DDD;" class="panel-heading">
                            <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                        </div>
                        <div class="panel-body">
                            <h3>Event Date: <?php echo get_post_meta(get_the_ID(),'Start_Date',true);?></h3>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </div>
                    <?php
                }
            }


            ?>
        </div>
    </div>
</div>
<?php
get_footer();