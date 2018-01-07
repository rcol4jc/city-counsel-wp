<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 8/26/2016
 * Time: 9:26 PM
 */


if (!session_id())
    session_start();
function add_theme_scripts() {

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('main', get_stylesheet_uri() );
    wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css');


    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.12.0');
    wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 3.7, false);
    wp_enqueue_script('maps-api','https://maps.googleapis.com/maps/api/js?key=AIzaSyBASWrCr8kimxY9Uc9vJBfGgb_DgrVc0wY');
    wp_enqueue_script('gmap3', 'https://cdn.jsdelivr.net/gmap3/7.0.0/gmap3.min.js');
    wp_enqueue_script('maps', get_template_directory_uri() . '/js/maps.js');
    if (is_page('hamlin-marquis')){
        wp_enqueue_script('marqui', get_template_directory_uri() . '/js/marqui.js');
    }



}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

function add_admin_scripts($hook) {

    //wp_enqueue_style('jquery-ui-theme', get_template_directory_uri() . '/css/jquery-ui.theme.min.css', array('jquery'), '1.12.0');
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.12.0');
    wp_enqueue_script('cpt_validation_script', get_template_directory_uri() . '/js/CPT_Validation.js', array('jquery','jquery-ui'),1.0, false);
    wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css');

}
add_action('admin_enqueue_scripts', 'add_admin_scripts');

function register_menu(){
    register_nav_menu('header-menu', 'Header Menu');
}
add_action('init', 'register_menu');

add_theme_support( 'post-thumbnails' );

function setup_hamlin_post_types() {
    $args=array (
        'label'=>'events',
        'labels'=>array (
            'name'=>'Events',
            'singular_name'=>'Event',
            'add_new'=>'Add New',
            'add_new_item'=>'Add New Event',
            'edit_item'=>'Edit Event',
            'new_item'=>'New Event',
            'view_item'=>'View Event',
            'search_item'=>'Search Events',
            'not_found'=>'No Events Found',
            'not_found_in_trash'=>'No Events Found In Trash',
            'all_items'=>'All Events',
            'archives'=>'Event Archive',
            'featured_image'=>'Main Event Picture',
            'set_featured_image'=>'Choose Event Picture',
            'remove_featured_image'=>'Remove Event Picture',
            'use_featured_image'=>'Use as Event Picture'
        ),
        'public'=>true,
        'supports'=>array (
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ),
        'has_archive'=>true,
        'menu_icon'=>'dashicons-calendar',
        'capability_type'=> array ('event','events'),
        'map_meta_cap'=>true
    );
    $args2=array (
        'label'=>'news',
        'labels'=>array (
            'name'=>'News',
            'singular_name'=>'News Item',
            'add_new'=>'Add New',
            'add_new_item'=>'Add New News Item',
            'edit_item'=>'Edit News Item',
            'new_item'=>'New News Item',
            'view_item'=>'View News Item',
            'search_item'=>'Search News Items',
            'not_found'=>'No News Items Found',
            'not_found_in_trash'=>'No News Items Found In Trash',
            'all_items'=>'All News Items',
            'archives'=>'News Item Archive',
            'featured_image'=>'Main News Item Picture',
            'set_featured_image'=>'Choose News Item Picture',
            'remove_featured_image'=>'Remove News Item Picture',
            'use_featured_image'=>'Use as News Item Picture'
        ),
        'public'=>true,
        'supports'=>array (
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ),
        'has_archive'=>true,
        'menu_icon'=>'dashicons-megaphone',
        'capability_type'=> array ('news_item','news_items'),
        'map_meta_cap'=>true

    );
    $args3=array (
        'label'=>'businesses',
        'labels'=>array (
            'name'=>'Businesses',
            'singular_name'=>'New Business',
            'add_new'=>'Add New',
            'add_new_item'=>'Add New Business',
            'edit_item'=>'Edit Business',
            'new_item'=>'New Business',
            'view_item'=>'View Business',
            'search_item'=>'Search Businesss',
            'not_found'=>'No Business Found',
            'not_found_in_trash'=>'No Businesss Found In Trash',
            'all_items'=>'All Businesss',
            'archives'=>'Business Archives',
            'featured_image'=>'Main Business Picture',
            'set_featured_image'=>'Choose Business Picture',
            'remove_featured_image'=>'Remove Business Picture',
            'use_featured_image'=>'Use as Business Picture'
        ),
        'public'=>true,
        'supports'=>array (
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ),
        'has_archive'=>true,
        'menu_icon'=>'dashicons-store',
        'capability_type'=> array ('business','businesses'),
        'map_meta_cap'=>true
    );

    $args5=array (
        'label'=>'business-types',
        'labels'=>array (
            'name'=>'Business Types',
            'singular_name'=>'New Business Type',
            'add_new'=>'Add New',
            'add_new_item'=>'Add New Business Type',
            'edit_item'=>'Edit Business Type',
            'new_item'=>'New Business Type',
            'view_item'=>'View Business Type',
            'search_item'=>'Search Business Types',
            'not_found'=>'No Business Type Found',
            'not_found_in_trash'=>'No Businesss Type Found In Trash',
            'all_items'=>'All Business Types',
            'archives'=>'Business Type Archives'
        ),
        'has_archive'=>true,
        'public'=>true,
        'supports'=>array (
            'title'
        ),
        'menu_icon'=>'dashicons-store',
        'capability_type'=> array ('business-type','business-types'),
        'map_meta_cap'=>true
    );

    $argss=array (
        'label'=>'games',
        'labels'=>array (
            'name'=>'Games',
            'singular_name'=>'Game',
            'add_new'=>'Add New',
            'add_new_item'=>'Add New Game',
            'edit_item'=>'Edit Game',
            'new_item'=>'New Game',
            'view_item'=>'View Game',
            'search_item'=>'Search Games',
            'not_found'=>'No Games Found',
            'not_found_in_trash'=>'No Games Found In Trash',
            'all_items'=>'All Games',
            'archives'=>'Game Archive',
            'featured_image'=>'Main Game Picture',
            'set_featured_image'=>'Choose Game Picture',
            'remove_featured_image'=>'Remove Game Picture',
            'use_featured_image'=>'Use as Game Picture'
        ),
        'public'=>true,
        'supports'=>array (
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ),
        'has_archive'=>true,
        'menu_icon'=>'dashicons-flag',
        'capability_type'=> array ('game','games'),
        'map_meta_cap'=>true
    );

    register_post_type('events',$args);
    register_post_type('news',$args2);
    register_post_type('businesses',$args3);
    register_post_type('games',$argss);
    register_post_type('business-types',$args5);

}


add_action('init', 'setup_hamlin_post_types');


/*****************************************Business Info Post Meta Boxes********************************************/
function create_bus_info_meta_box(){
    add_meta_box('bus-info-box', 'Business Info', 'create_bus_info_html','businesses','normal','high');
}
function create_bus_info_html($post){
    $values=get_post_custom($post->ID);
    ?>
    <?php wp_nonce_field('bus_info_nonce', 'business_info_nonce' ); ?>
    <input type="hidden" name="CPT_info_validation" id="CPT_info_validation" value="business">
    <table>
        <tr>
            <td style="width:50%"><label for="Street_Address">Street Address</label></td>
            <td style="width:50%"><input type="text" name="Street_Address" id="Street_Address" value="<?php echo $values['Street_Address'][0]; ?>" > * </td>
        </tr>
        <tr>
            <td style="width:50%"><label for="City">City</label></td>
            <td style="width:50%"><input type="text" name="City" id="City" value="<?php if (isset($values['City'])) { echo $values['City'][0];} else { echo 'Hamlin';} ?>"> * </td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Phone_Number">Phone Number</label></td>
            <td style="width:50%"><input type="tel" name="Phone_Number" id="Phone_Number" placeholder="555-555-5555" value="<?php echo $values['Phone_Number'][0]; ?>" > *  (Ex: 555-555-5555)</td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Hours">Hours of Business</label></td>
            <td style="width:50%"><input type="text" name="Hours" id="Hours" placeholder="Ex: Mon-Sun 6AM-5PM" value="<?php echo $values['Hours'][0]; ?>" > (Optional)</td>
        </tr>
        <tr>
            <td style="width:50%"><label for="IsMember">Is Chamber Member</label></td>
            <td style="width:50%"> <input type="checkbox" name="IsMember" id="IsMember" <?php if ($values['IsMember'][0]=='true') echo 'checked' ?>></td>
        </tr>
        <tr>
           <td style="width:50%">
               <label for="business_type">Business Type</label>
           </td>
            <td style="width:50%"><select name="business_type" id="business_type">
                    <option value="--Choose Business Type--">--Choose Business Type--</option>
                <?php
                $type_query=new WP_Query('post_type=business-types');
                if ($type_query->have_posts()){
                    while ($type_query->have_posts()){
                        $type_query->the_post();
                        $option_string='';
                        $business_type=get_the_title();
                        $option_string .='<option value="'.$business_type.'" ';
                        if (isset($values['business_type'][0]) && $values['business_type'][0]==$business_type){
                            $option_string .='selected ';
                        }
                        $option_string .='>'.$business_type.'</option>';
                        echo $option_string;
                    }
                }
                ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}
add_action('add_meta_boxes','create_bus_info_meta_box');
function save_bus_info($post_id){
    $errors=array();
    if ( defined ( 'DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

    if (!isset ($_POST['business_info_nonce'] ) || !wp_verify_nonce( $_POST['business_info_nonce'],'bus_info_nonce')) return $post_id;

    if (!isset($_POST['Street_Address']) || empty($_POST['Street_Address'])){
        $errors[]='Street Address Cannot Be Blank';
    }
    if (!isset($_POST['City'])){
        $errors[]='City cannot be blank';
    }
    if (!isset($_POST['Phone_Number'])) {
        $errors[]='Phone Number cannot be blank!';
    }
    if (!preg_match('/\d{3}-\d{3}-\d{4}/',$_POST['Phone_Number'])){
        $errors[]='Phone number is invalid. Use 555-555-5555';
    }
    if ($_POST['business_type']=='--Choose Business Type--'){
        $errors[]='You must choose a business type';
    }

    if (count($errors)==0){
        update_post_meta($post_id, 'Street_Address',sanitize_text_field($_POST['Street_Address']));
        update_post_meta($post_id, 'City',sanitize_text_field($_POST['City']));
        update_post_meta($post_id, 'Phone_Number',sanitize_text_field($_POST['Phone_Number']));
        update_post_meta($post_id, 'State',sanitize_text_field('TX'));
        if (!isset($_POST['Hours']) || empty($_POST['Hours']) || $_POST['Hours']==''){
            delete_post_meta($post_id, 'Hours');
        } else {
            update_post_meta($post_id, 'Hours', sanitize_text_field($_POST['Hours']));
        }
        if (isset($_POST['IsMember'])){
            update_post_meta($post_id, 'IsMember', 'true');
        } else {
            update_post_meta($post_id, 'IsMember', 'false');
        }
        update_post_meta($post_id, 'business_type', sanitize_text_field($_POST['business_type']));


    } else {
        $_SESSION['bus_save_errors']=$errors;
    }


}
add_action('save_post','save_bus_info');

function my_bus_error_notices(){
    if (isset($_SESSION['bus_save_errors'])){
        echo '<div class="notice notice-error is-dismissable">';
        echo '<p> The Business was saved, but the Business Info was not due to the following errors: </p>';
        echo '<ul>';
        foreach ($_SESSION['bus_save_errors'] as $value){
            echo '<li>'.$value.'</li>';
        }
        echo '</ul>';
        echo '</div>';

    }
    unset($_SESSION['bus_save_errors']);


}
add_action ('admin_notices', 'my_bus_error_notices');

function change_bus_placeholder_text($title){
    $screen=get_current_screen();
    if (isset($screen->post_type)){
        if ($screen->post_type=='businesses'){
            $title="New Business Name Here";
        }
    }
    return $title;
}
add_filter('enter_title_here', 'change_bus_placeholder_text');
/***********************************************************End Business Post Meta Boxes*******************************/



/**********************************************************Event Post Meta Boxes***************************************/
function create_event_post_meta_box(){
    add_meta_box('evt-info-box', 'Event Info', 'create_evt_info_html','events','normal','high');
}
function create_evt_info_html($post){
    $values=get_post_custom($post->ID);

    $mode='';
    if (isset($values['Duration'][0])){
        $mode=$values['Duration'][0];
    } else {
        $mode='one_day';
    }

    ?>
    <?php wp_nonce_field('evt_info_nonce', 'event_info_nonce' ); ?>
    <input type="hidden" name="CPT_info_validation" id="CPT_info_validation" value="event">
    <table>
        <tr>
            <td style="width:50%"><label for"Duration">How Long? </label></td>
            <td style="width:50%">
                <input type="radio" name="Duration"  value="one_day" <?php if ($mode=='one_day') echo 'checked'; ?>>One Day</input><br>
                <input type="radio" name="Duration"  value="multi_days" <?php if ($mode=='multi_days') echo 'checked'; ?>>Multiple Days</input>
            </td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Start_Date">Start Date</label></td>
            <td style="width:50%">
                <input type="text" name="Start_Date" id="Start_Date" <?php if (isset($values['Start_Date'][0])) echo 'value="'.$values['Start_Date'][0].'"'?> >
            </td>
        </tr>
        <tr>
         <td style="width:50%"><label for="End_Date">End Date</label></td>
            <td style="width:50%">
            <input type="text" name="End_Date" id="End_Date" <?php if ($mode=='one_day') echo 'disabled'; ?> <?php if (isset($values['End_Date'][0])) echo 'value="'.$values['End_Date'][0].'"'?>>
            <!--<input type="checkbox" name="all_day" id="all_day" checked> All Day?</input>-->
            </td>
        </tr>

        <tr>
            <td colspan="2" style="background-color:#9d9d9d;color:#ffffff;text-align:center">Location Info</td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Evt_Street_Address">Street Address</label></td>
            <td style="width:50%"><input type="text" name="Evt_Street_Address" id="Evt_Street_Address"
                    <?php if (isset($values['Evt_Street_Address'][0])) echo 'value="'.$values['Evt_Street_Address'][0].'"'?>> </td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Evt_City">City</label></td>
            <td style="width:50%"><input type="text" name="Evt_City" id="Evt_City"
                    <?php if (isset($values['Evt_City'][0])) echo 'value="'.$values['Evt_City'][0].'"'?>> </td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Evt_State">State</label></td>
            <td style="width:50%"><input type="text" name="Evt_State" id="Evt_State" maxlength="2" style="width: 2em;"
                    <?php if (isset($values['Evt_State'][0])) echo 'value="'.$values['Evt_State'][0].'"'?>></td>
        </tr> <tr>
            <td style="width:50%"><label for="Evt_Zip">Zipcode</label></td>
            <td style="width:50%"><input type="number" maxlength="7" name="Evt_Zip" id="Evt_Zip" style="width:7em;"
                    <?php if (isset($values['Evt_Zip'][0])) echo 'value="'.$values['Evt_Zip'][0].'"'?>> </td>
        </tr>
    </table>

    <?php

}
add_action('add_meta_boxes','create_event_post_meta_box');

function save_evt_info($post_id){

    $errors=array();
    if ( defined ( 'DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

    if (!isset ($_POST['event_info_nonce'] ) || !wp_verify_nonce( $_POST['event_info_nonce'],'evt_info_nonce')) return $post_id;

    $now=new DateTime();
    $start_date=new DateTime();

    if (!isset($_POST['Start_Date']) || $_POST['Start_Date']==''){
        $errors[]='Start Date cannot be blank';
    } else {
        if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/', $_POST['Start_Date'])==0){
            $errors[]='Start Date is in the wrong format. Please use mm/dd/yyyy';
        } else {
            $start_date=new DateTime($_POST['Start_Date']);
        }
    }

    if ($_POST['Duration']=='multi_days'){

        if (!isset($_POST['End_Date']) || $_POST['End_Date']==''){
            $errors[]='End Date cannot be blank';
        } else {
            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/', $_POST['End_Date'])==0){
                $errors[]="End Date is in the wrong format. Please use mm/dd/yyyy";
            } else {
                $enddate=new DateTime($_POST['End_Date']);
                if ($enddate<=$start_date) {
                    $errors[] = 'End Date must be at least one day later than the start date Start Date';
                }
            }
        }
    }

    if (!isset($_POST['Evt_Street_Address']) || $_POST['Evt_Street_Address']==''){
        $errors[]='Street Address cannot be blank';
    }
    if (!isset($_POST['Evt_City']) || $_POST['Evt_City']==''){
        $errors[]='City cannot be blank';
    }
    if (!isset($_POST['Evt_State']) || $_POST['Evt_State']==''){
        $errors[]='State cannot be blank';
    }
    if (!isset($_POST['Evt_Zip']) || $_POST['Evt_Zip']==''){
        $errors[]='City cannot be blank';
    } else {
        if (preg_match('/^\d{5}$|^\d{5}-\d{4}$/',$_POST['Evt_Zip'])==0){
            $errors[]='Zipcode is in the wrong format. Please double check it';
        }
    }

    if (count($errors)==0){
        update_post_meta($post_id,'Duration',$_POST['Duration']);
        update_post_meta($post_id,'Start_Date',sanitize_text_field($_POST['Start_Date']));
        if ($_POST['Duration']=='multi_days'){
            update_post_meta($post_id, 'End_Date',sanitize_text_field($_POST['End_Date']));
        } else {
            delete_post_meta($post_id, 'End_Date');
        }

        update_post_meta($post_id, 'Evt_Street_Address', sanitize_text_field($_POST['Evt_Street_Address']));
        update_post_meta($post_id, 'Evt_City', sanitize_text_field($_POST['Evt_City']));
        update_post_meta($post_id, 'Evt_State', sanitize_text_field($_POST['Evt_State']));
        update_post_meta($post_id, 'Evt_Zip', sanitize_text_field($_POST['Evt_Zip']));
    } else {
        $_SESSION['evt_save_errors']=$errors;
    }


}
add_action('save_post','save_evt_info');

function my_evt_error_notices(){
    if (isset($_SESSION['evt_save_errors'])){
        echo '<div class="notice notice-error is-dismissable">';
        echo '<p> The Event was saved, but the Event Info was not saved because of the following errors: </p>';
        echo '<ul>';
        foreach ($_SESSION['evt_save_errors'] as $value){
            echo '<li>'.$value.'</li>';
        }
        echo '</ul>';
        echo '</div>';

    }
    unset($_SESSION['evt_save_errors']);
}
add_action ('admin_notices', 'my_evt_error_notices');
function change_evt_placeholder_text($title){
    $screen=get_current_screen();
    if (isset($screen->post_type)){
        if ($screen->post_type=='events'){
            $title="New Event Name Here";
        }
    }
    return $title;
}
add_filter('enter_title_here', 'change_evt_placeholder_text');
/****************************************************Event Post Meta Boxes*******************************************/
/****************************************************Game Post Type Meta Boxes***************************************/
function create_game_info_meta_box(){
    add_meta_box('game-info-box', 'Game Info', 'create_game_info_html','games','normal','high');
}
function create_game_info_html($post){
    $values=get_post_custom($post->ID);

    wp_nonce_field('gm_info_nonce', 'game_info_nonce' );
    ?>
    <input type="hidden" name="CPT_info_validation" id="CPT_info_validation" value="game">
    <table>
        <tr>
            <td style="width:50%"><label for="Game_Date">Game Date</label></td>
            <td style="width:50%"><input type="text" name="Game_Date" id="Game_Date" <?php if (isset($values['Game_Date'][0])) echo 'value="'.$values['Game_Date'][0].'"'; ?>></td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Location_TBA">Location is TBA</label></td>
            <td style="width:50%"><input type="checkbox" name="Location_TBA" id="Location_TBA" <?php if (isset($values['Location_TBA'][0])=='true') echo 'checked';?>/></td>
        </tr>
        <tr>
           <td style="width:50%"><label for="Game_Loc_Name">Location Name</label></td>
            <td style="width:50%"><input type="text" name="Game_Loc_Name" id="Game_Loc_Name"  <?php if (isset($values['Game_Loc_Name'][0])) echo 'value="'.$values['Game_Loc_Name'][0].'"'; ?>></td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Game_Loc_Address">Address</label></td>
            <td style="width:50%"><input type="text" name="Game_Loc_Address" id="Game_Loc_Address"  <?php if (isset($values['Game_Loc_Address'][0])) echo 'value="'.$values['Game_Loc_Address'][0].'"'; ?>></td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Game_Loc_City">City</label></td>
            <td style="width:50%"><input type="text" name="Game_Loc_City" id="Game_Loc_City" <?php if (isset($values['Game_Loc_City'][0])) echo 'value="'.$values['Game_Loc_City'][0].'"'; ?> ></td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Game_Loc_State">State</label></td>
            <td style="width:50%"><input type="text" style="width:2em;" name="Game_Loc_State" id="Game_Loc_State" <?php if (isset($values['Game_Loc_State'][0])) echo 'value="'.$values['Game_Loc_State'][0].'"'; ?>></td>
        </tr>
        <tr>
            <td style="width:50%"><label for="Game_Loc_Zip">Zip</label></td>
            <td style="width:50%"><input type="number" style="width:7em;" name="Game_Loc_Zip" id="Game_Loc_Zip" <?php if (isset($values['Game_Loc_Zip'][0])) echo 'value="'.$values['Game_Loc_Zip'][0].'"'; ?>></td>
        </tr>
    </table>
<?php
}
add_action('add_meta_boxes','create_game_info_meta_box');

function save_game_info($post_id){
    $errors=array();

    if ( defined ( 'DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

    if (!isset ($_POST['game_info_nonce'] ) || !wp_verify_nonce( $_POST['game_info_nonce'],'gm_info_nonce')) return $post_id;

    if (!isset($_POST['Game_Date']) || $_POST['Game_Date']==''){
        $errors[]='Game Date cannot be blank';
    } else {
        if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/',$_POST['Game_Date']==0)){
            $errors[]='Game Date is in the wrong format. Please use mm/dd/yyyy';
        }
    }
    if (!isset($_POST['Location_TBA'])){
        if (!isset($_POST['Game_Loc_Name']) || $_POST['Game_Loc_Name']==''){
            $errors[]='Location Name cannot be blank';
        }
        if (!isset($_POST['Game_Loc_Address']) || $_POST['Game_Loc_Address']==''){
            $errors[]='Address cannot be blank';
        }
        if (!isset($_POST['Game_Loc_City']) || $_POST['Game_Loc_City']==''){
            $errors[]='City cannot be blank';
        }
        if (!isset($_POST['Game_Loc_State']) || $_POST['Game_Loc_State']==''){
            $errors[]='State cannot be blank';
        }
        if (!isset($_POST['Game_Loc_Zip']) || $_POST['Game_Loc_Zip']==''){
            $errors[]='City cannot be blank';
        } else {
            if (preg_match('/^\d{5}$|^\d{5}-\d{4}$/',$_POST['Game_Loc_Zip'])==0){
                $errors[]='Zip Code is in the wrong format';
            }
        }
    }

    if (count($errors)==0){
        update_post_meta($post_id, 'Game_Date', sanitize_text_field($_POST['Game_Date']));
        if (isset($_POST['Location_TBA'])){
            update_post_meta($post_id, 'Location_TBA','true');
            update_post_meta($post_id, 'Game_Loc_Name', '');
            update_post_meta($post_id, 'Game_Loc_Address', '');
            update_post_meta($post_id, 'Game_Loc_City', '');
            update_post_meta($post_id, 'Game_Loc_State', '');
            update_post_meta($post_id, 'Game_Loc_Zip', '');
        } else {
            update_post_meta($post_id, 'Location_TBA','false');
            update_post_meta($post_id, 'Game_Loc_Name', sanitize_text_field($_POST['Game_Loc_Name']));
            update_post_meta($post_id, 'Game_Loc_Address', sanitize_text_field($_POST['Game_Loc_Address']));
            update_post_meta($post_id, 'Game_Loc_City', sanitize_text_field($_POST['Game_Loc_City']));
            update_post_meta($post_id, 'Game_Loc_State', sanitize_text_field($_POST['Game_Loc_State']));
            update_post_meta($post_id, 'Game_Loc_Zip', sanitize_text_field($_POST['Game_Loc_Zip']));
        }

    } else {
        $_SESSION['game_save_errors']=$errors;
    }
}
add_action('save_post','save_game_info');
function my_game_error_notices(){
    if (isset($_SESSION['game_save_errors'])){
        echo '<div class="notice notice-error is-dismissable">';
        echo '<p> The Game was saved, but the Game Info was not saved because of the following errors: </p>';
        echo '<ul>';
        foreach ($_SESSION['game_save_errors'] as $value){
            echo '<li>'.$value.'</li>';
        }
        echo '</ul>';
        echo '</div>';

    }
    unset($_SESSION['game_save_errors']);
}
add_action ('admin_notices', 'my_game_error_notices');
function change_game_placeholder_text($title){
    $screen=get_current_screen();
    if (isset($screen->post_type)){
        if ($screen->post_type=='games'){
            $title="New Game Title Here";
        }
    }
    return $title;
}
add_filter('enter_title_here', 'change_game_placeholder_text');
/*****************************************************************End Game Event**********************************/

function register_new_image_sizes() {
    add_image_size('showcase',2000,1500,true);
}
add_action('after_setup_theme','register_new_image_sizes');





function show_all_businesses( $query ) {
    if ( $query->is_main_query() && is_post_type_archive('businesses') ) {
        $query->set('posts_per_page', -1);
    }

}
add_action('pre_get_posts','show_all_businesses');