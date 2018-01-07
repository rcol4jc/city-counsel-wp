<?php
/**
 * Template Name: All News
 */
get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>All News</h2>
                </div>
                <?php
                $args=array(
                    'post_type'=>'news',
                    'posts_per_page'=>-1
                );
                $news_query=new WP_Query($args);
                if ($news_query->have_posts()){
                    while ($news_query->have_posts()){
                        $news_query->the_post();
                        ?>
                        <div style="border-radius:0;border-color:#257300" class="panel panel-default">
                            <div style="background-color:#DDD;" class="panel-heading">
                                <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                            </div>
                            <div class="panel-body">
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