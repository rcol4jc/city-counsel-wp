<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 10/22/2016
 * Time: 6:41 PM
 */
get_header();
    ?>
    <div id="maps_page_id" style="display:none;">Event</div>
    <div class="container">
        <?php if (have_posts()){
            $event=array();
            while (have_posts()){
                the_post();
                $event['the_ID']=get_the_ID();
                $event['the_title']=get_the_title();
                $event['the_content']=get_the_content();
                If (!has_post_thumbnail()){
                    $event['the_post_thumbnail']='<img src="'.get_template_directory_uri().'/img/Hamlin-Events-Logo.gif" class="img-responsive" alt="Hamlin Event Default Image" />';
                } else {
                    $event['the_post_thumbnail']=get_the_post_thumbnail(get_the_ID(),'showcase',array('class'=>'img-responsive center'));
                }
                $event['the_excerpt']=get_the_excerpt();
                $event['Start_Date']=get_post_meta(get_the_ID(),'Start_Date',true);
                $event['End_Date']=get_post_meta(get_the_ID(), 'End_Date',true);
                $event['Evt_Street_Address']=get_post_meta(get_the_ID(),'Evt_Street_Address',true);
                $event['Evt_City']=get_post_meta(get_the_ID(), 'Evt_City',true);
                $event['Evt_State']=get_post_meta(get_the_ID(), 'Evt_State',true);
                $event['Evt_Zip']=get_post_meta(get_the_ID(), 'Evt_Zip',true);
            }
        }

        ?>
        <div class="row">
            <div class="col-lg-12" class="main_pic">

                <?php echo $event['the_post_thumbnail']?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2><?php echo $event['the_title'];?></h2>
                </div>
                <p>
                    <?php echo do_shortcode($event['the_content']); ?>
                </p>

                <div class="page-header">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div id="Event_Map"></div>
            </div>
            <div class="col-lg-6">
                <div class="page-header">
                    Date:
                </div>

                <?php
                $Start_Date=new DateTime($event['Start_Date']);
                if ($event['End_Date']!=''){
                    $End_Date=new DateTime($event['End_Date']);
                    echo $Start_Date->format('l F j, Y').' to '.$End_Date->format('l F j, Y');
                } else {
                    echo $Start_Date->format('l F j, Y');
                }
                ?>
                <div class="page-header">
                    <h3>Location:</h3>
                </div>

                <address><span id="Evt_Street_Address"><?php echo $event['Evt_Street_Address']; ?></span><br/>
                    <span id="Evt_City"><?php echo $event['Evt_City']; ?></span>, <span id="Evt_State"><?php echo $event['Evt_State']; ?></span> <span id="Evt_Zip"><?php echo $event['Evt_Zip']; ?></span><br/></address>

            </div>
        </div>
    </div>

<?php get_footer();?>