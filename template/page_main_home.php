<?php
/**
 * Template Name: Main Home Page
 */
get_header();
$slide_show=array();
$temp_event=array();
$temp_game=array();
$counter=0;
?>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <?php
                if (have_posts()){
                    while (have_posts()){
                        the_post();
                        $slide_show[$counter]['the_ID']=get_the_ID();
                        $slide_show[$counter]['the_title']=get_the_title();
                        $slide_show[$counter]['the_excerpt']=get_the_excerpt();
                        $slide_show[$counter]['the_content']=get_the_content();
                        $slide_show[$counter]['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(),'showcase',array('class'=>'img-responsive'));
                        $slide_show[$counter]['the_permalink']=get_the_permalink();
                        $counter++;
                    }
                }
                $event_query=new WP_Query('post_type=events');
                if ($event_query->have_posts()){
                    //$temp_event=array();
                    while ($event_query->have_posts()){
                        $event_query->the_post();
                        $now=new DateTime();
                        $test_date=new DateTime(get_post_meta(get_the_ID(),'Start_Date',true));
                        if ($test_date>$now){
                            if (count($temp_event)==0){
                                $temp_event['the_ID']=get_the_ID();
                                $temp_event['the_title']=get_the_title();
                                $temp_event['the_content']=get_the_content();
                                $temp_event['the_excerpt']=get_the_excerpt();
                                If (!has_post_thumbnail()){

                                    $temp_event['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-Events-Logo.gif" class="img-responsive" alt="Hamlin Event Default Image" />';
                                } else {
                                    $temp_event['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(),'showcase',array('class'=>'img-responsive'));
                                }
                                $temp_event['the_permalink']=get_the_permalink();
                                $temp_event['Start_Date']=get_post_meta(get_the_ID(),'Start_Date',true);
                            } else {
                                $last_stored=new DateTime($temp_event['Start_Date']);
                                if ($test_date<$last_stored){
                                    $temp_event['the_ID']=get_the_ID();
                                    $temp_event['the_title']=get_the_title();
                                    $temp_event['the_content']=get_the_content();
                                    $temp_event['the_excerpt']=get_the_excerpt();
                                    If (!has_post_thumbnail()){
                                        $temp_event['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-Events-Logo.gif" class="img-responsive" alt="Hamlin Event Default Image" />';
                                    } else {
                                        $temp_event['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(),'showcase',array('class'=>'img-responsive'));
                                    }
                                    $temp_event['the_permalink']=get_the_permalink();
                                    $temp_event['Start_Date']=get_post_meta(get_the_ID(),'Start_Date',true);
                                }
                            }
                        }
                    }
                    if (count($temp_event)>0){
                        $slide_show[$counter]['the_ID']=$temp_event['the_ID'];
                        $slide_show[$counter]['the_title']=$temp_event['the_title'];
                        $slide_show[$counter]['the_content']=$temp_event['the_content'];
                        $slide_show[$counter]['the_excerpt']=$temp_event['the_excerpt'];
                        $slide_show[$counter]['the_post_thumbnail']=$temp_event['the_post_thumbnail'];
                        $slide_show[$counter]['the_permalink']=$temp_event['the_permalink'];
                        $counter++;
                    }

                }
                $game_query=new WP_query('post_type=games');
                if ($game_query->have_posts()){
                    while ($game_query->have_posts()) {
                        $game_query->the_post();
                        //$temp_game = array();
                        $now = new DateTime();
                        $test_date = new DateTime(get_post_meta(get_the_ID(), 'Game_Date', true));
                        if ($test_date > $now) {
                            if (count($temp_game) == 0) {
                                $temp_game['the_ID'] = get_the_ID();
                                $temp_game['the_title'] = get_the_title();
                                $temp_game['the_content'] = get_the_content();
                                $temp_game['the_excerpt'] = get_the_excerpt();
                                if (!has_post_thumbnail()){
                                    $temp_game['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-Sports-Logo.gif" class="img-responsive" alt="Hamlin Event Default Image" />';
                                } else {
                                    $temp_game['the_post_thumbnail'] = get_the_post_thumbnail(get_the_ID(), 'showcase', array('class' => 'img-responsive'));
                                }
                                $temp_game['the_permalink'] = get_the_permalink();
                                $temp_game['Game_Date'] = get_post_meta(get_the_ID(), 'Game_Date', true);
                            } else {
                                $last_stored = new DateTime($temp_game['Game_Date']);
                                if ($test_date < $last_stored) {
                                    $temp_game['the_ID'] = get_the_ID();
                                    $temp_game['the_title'] = get_the_title();
                                    $temp_game['the_content'] = get_the_content();
                                    $temp_game['the_excerpt'] = get_the_excerpt();
                                    if (!has_post_thumbnail()){
                                        $temp_game['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-Sports-Logo.gif" class="img-responsive" alt="Hamlin Game Default Image" />';
                                    } else {
                                        $temp_game['the_post_thumbnail'] = get_the_post_thumbnail(get_the_ID(), 'showcase', array('class' => 'img-responsive'));
                                    }
                                    $temp_game['the_permalink'] = get_the_permalink();
                                    $temp_game['Game_Date'] = get_post_meta(get_the_ID(), 'Game_Date', true);
                                }
                            }
                        }

                    }
                    if (count($temp_game)>0){
                        $slide_show[$counter]['the_ID']=$temp_game['the_ID'];
                        $slide_show[$counter]['the_title']=$temp_game['the_title'];
                        $slide_show[$counter]['the_content']=$temp_game['the_content'];
                        $slide_show[$counter]['the_excerpt']=$temp_game['the_excerpt'];
                        $slide_show[$counter]['the_post_thumbnail']=$temp_game['the_post_thumbnail'];
                        $slide_show[$counter]['the_permalink']=$temp_game['the_permalink'];
                        $counter++;
                    }

                }
                $news_query=new WP_query(array(
                    'post_type'=>'news',
                    'post_per_page'=>1
                ));
                if ($news_query->have_posts()){
                    while ($news_query->have_posts()){
                        $news_query->the_post();
                        $slide_show[$counter]['the_ID']=get_the_ID();
                        $slide_show[$counter]['the_title']=get_the_title();
                        $slide_show[$counter]['the_content']=get_the_content();
                        $slide_show[$counter]['the_excerpt']=get_the_excerpt();
                        if (!has_post_thumbnail()){
                            $slide_show[$counter]['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-News-Logo.gif" class="img-responsive" alt="Hamlin News Default Image" />';
                        } else {
                            $slide_show[$counter]['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(), 'showcase', array('class' => 'img-responsive'));
                        }
                        $slide_show[$counter]['the_permalink']=get_the_permalink();
                    }
                }
                ?>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <ol class="carousel-indicators">
                        <?php
                            for ($i=0; $i<count($slide_show);$i++){
                                echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
                            }
                        ?>

                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <?php
                        for ($i=0;$i<count($slide_show);$i++){
                            if ($i==0){
                                echo '<div class="item active">';
                            } else {
                                echo '<div class="item">';
                            }
                            echo '<a href="'.$slide_show[$i]['the_permalink'].'">'.$slide_show[$i]['the_post_thumbnail'].'</a>';
                            echo '<div class="carousel-caption">';
                            echo '<h2>'.$slide_show[$i]['the_title'].'</h2>';
                            echo '<p>'.$slide_show[$i]['the_excerpt'].'</p>';
                            echo '<a href="'.$slide_show[$i]['the_permalink'].'">More...</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                        </div>

                    </div>
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="page-header">
                    <h3>Hamlin Sports</h3>
                </div>
                <div class="attn">
                    <?php
                    $five_games=new WP_query(array(
                        'post_type'=>'games',
                        'posts_per_page'=>5
                    ));
                    if ($five_games->have_posts()){
                        while ($five_games->have_posts()){
                            $five_games->the_post();
                            echo '<a href="'.get_the_permalink().'"><h3>'.get_the_title().'<span class="small">>></span></h3></a>';
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header">
                    <h3> Hamlin News</h3>
                </div>
                <div class="attn">
                    <?php
                    $five_news=new WP_query(array(
                        'post_type'=>'news',
                        'posts_per_page'=>5
                    ));
                    if ($five_news->have_posts()){
                        while ($five_news->have_posts()){
                            $five_news->the_post();
                            echo '<a href="'.get_the_permalink().'"><h3>'.get_the_title().'<span class="small">>></span></h3></a>';
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header">
                    <h3> Hamlin Events</h3>
                </div>
                <div class="attn">
                    <?php
                    $five_events=new WP_query(array(
                        'post_type'=>'events',
                        'posts_per_page'=>5
                    ));
                    if ($five_events->have_posts()){
                        while ($five_events->have_posts()){
                            $five_events->the_post();
                            echo '<a href="'.get_the_permalink().'"><h3>'.get_the_title().'<span class="small">>></span></h3></a>';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
