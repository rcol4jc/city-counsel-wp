<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 10/30/2016
 * Time: 12:33 PM
 */
get_header();
?>
    <div id="maps_page_id" style="display:none;">Game</div>
    <div class="container">
        <?php if (have_posts()){
            $game=array();
            while (have_posts()){
                the_post();
                $game['the_ID']=get_the_ID();
                $game['the_title']=get_the_title();
                $game['the_content']=get_the_content();
                if (!has_post_thumbnail()){
                    $game['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-Sports-Logo.gif" class="img-responsive" alt="Hamlin Event Default Image" />';
                } else {
                    $game['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(),'showcase',array('class'=>'img-responsive center'));
                }
                $game['the_excerpt']=get_the_excerpt();
                $game['Game_Date']=get_post_meta(get_the_ID(),'Game_Date',true);
                $game['Game_Loc_Name']=get_post_meta(get_the_ID(),'Game_Loc_Name',true);
                $game['Game_Loc_Address']=get_post_meta(get_the_ID(),'Game_Loc_Address',true);
                $game['Game_Loc_City']=get_post_meta(get_the_ID(), 'Game_Loc_City',true);
                $game['Game_Loc_State']=get_post_meta(get_the_ID(), 'Game_Loc_State',true);
                $game['Game_Loc_Zip']=get_post_meta(get_the_ID(), 'Game_Loc_Zip',true);
                $game['Location_TBA']=get_post_meta(get_the_ID(), 'Location_TBA',true);
            }
        }

        ?>
        <div class="row">
            <div class="col-lg-12" class="main_pic">

                <?php echo $game['the_post_thumbnail']?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2><?php echo $game['the_title'];?></h2>
                </div>
                <p>
                    <?php echo do_shortcode($game['the_content']); ?>
                </p>

                <div class="page-header">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?php
                if ($game['Location_TBA']=='false'){
                    echo '<div id="Game_Map"></div>';
                }

                ?>
            </div>
            <div class="col-lg-6">
                <div class="page-header">
                    Date:
                </div>

                <?php
                $Game_Date=new DateTime($game['Game_Date']);
                echo $Game_Date->format('l F j, Y');
                ?>
                <div class="page-header">

                    <h3>Location:</h3>
                </div>
                    <?php
                    if ($game['Location_TBA']=='true'){
                        echo 'Location has not been announced yet';
                    } else {
                        ?>
                        <address>
                            <span id="Game_Loc_Name"><?php echo $game['Game_Loc_Name'];?></span><br/>
                            <span id="Game_Loc_Address"><?php echo $game['Game_Loc_Address']; ?></span><br/>
                            <span id="Game_Loc_City"><?php echo $game['Game_Loc_City']; ?></span>, <span id="Game_Loc_State"><?php echo $game['Game_Loc_State']; ?></span> <span id="Game_Loc_Zip"><?php echo $game['Game_Loc_Zip']; ?></span><br/>
                        </address>
                        <?php
                    }

                    ?>

            </div>
        </div>
    </div>

<?php get_footer();?>