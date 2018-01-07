<?php
/**
  *Template Name: Member Businesses List
 */
get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    If you want your business to have a special info page, then click <a href="<?php echo get_permalink( get_page_by_title( 'Join the Chamber!' ) ) ?>">here</a> to find out about becoming a chamber member!
                </p>
                <?php
                $bus_types=array();
                $bus_type_query=new WP_Query(array ('post_type'=>'business-types','orderby'=>'title','order'=>'ASC'));
                if ($bus_type_query->have_posts()){
                    while ($bus_type_query->have_posts()){
                        $bus_type_query->the_post();
                        $bus_types[]=get_the_title();
                    }
                }

                foreach ($bus_types as $type){
                    ?>
                    <div class="page-header">
                        <h3><?php echo $type;?></h3>
                    </div>
                    <div class="panel-group">
                        <?php
                        $bus_query=new WP_Query(
                            array('post_type'=>'businesses',
                                'orderby'=>'title',
                                'order'=>'ASC',
                                'posts_per_page'=>-1,
                                'meta_query'=>array(
                                    array(
                                        'key'=>'business_type',
                                        'value'=>$type
                                    ),
                                    array(
                                        'key'=>'IsMember',
                                        'value'=>'true'
                                    )
                                )
                            ));
                        if ($bus_query->have_posts()){
                            while ($bus_query->have_posts()){
                                $bus_query->the_post();
                                    ?>
                                    <div style="border-radius:0;border-color:#257300"class="panel panel-default">
                                        <div style="background-color:#DDD;" class="panel-heading">
                                            <h4><a style="padding:.2em;background-color:#257300;color:#FFF" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a><span class="glyphicon glyphicon-circle-arrow-left"></span> Click for more info</h4>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            echo '      '.get_post_meta(get_the_ID(),'Street_Address',true).'<br />';
                                            echo '      '.get_post_meta(get_the_ID(),'Phone_Number',true).'<br />';
                                            echo '      '.get_post_meta(get_the_ID(),'Hours',true);
                                            ?>
                                        </div>
                                    </div>
                                    <?php

                                }
                            }
                        }

                        ?>
                    </div>

            </div>
        </div>
        <?php


        ?>

    </div>
<?php
get_footer();
?>