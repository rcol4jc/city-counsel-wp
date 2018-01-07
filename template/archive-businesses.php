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
    <div class="row">
        <div class="col-lg-12">
            <h4 style="padding:.2em;background-color:#257300;color:#FFF">Chamber Members</h4>
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
                echo '<div class="page-header">';
                echo '<h3>'.$type.'</h3>';
                echo '</div>';
                echo '<div class="panel-group">';

                $bus_query=new WP_Query(
                    array('post_type'=>'businesses',
                        'orderby'=>'title',
                        'order'=>'ASC',
                        'posts_per_page'=>-1
                        ));

                if ($bus_query->have_posts()){
                    while ($bus_query->have_posts()){
                        $bus_query->the_post();
                        if (get_post_meta(get_the_ID(),'business_type',true)==$type){

                            echo '<div style="border-radius:0;border-color:#257300"class="panel panel-default">';
                            echo '    <div style="background-color:#DDD;" class="panel-heading">';
                            if (get_post_meta(get_the_ID(),'IsMember',true)=='true'){
                                echo '<h4><a style="padding:.2em;background-color:#257300;color:#FFF" href="'.get_the_permalink().'">'.get_the_title().'</a>';
                                echo ' <span class="glyphicon glyphicon-circle-arrow-left"></span>';
                                echo ' Click for more info</h4>';

                            } else {
                                echo get_the_title();
                            }

                            echo '    </div>';
                            echo '    <div class="panel-body">';
                            echo '      '.get_post_meta(get_the_ID(),'Street_Address',true).'<br />';
                            echo '      '.get_post_meta(get_the_ID(),'Phone_Number',true).'<br />';
                            echo '      '.get_post_meta(get_the_ID(),'Hours',true);
                            echo '    </div>';
                            echo '</div>';
                        }
                    }
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
<?php


?>

</div>
<?php
get_footer();
?>