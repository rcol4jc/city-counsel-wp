/**
 * Created by rcol4 on 10/23/2016.
 */
jQuery(document).ready(function () {
    var map;
    var marker;
    var geocoder=new google.maps.Geocoder();

    var maps_page_id=jQuery('#maps_page_id').html();
    var map_center="";
    switch (maps_page_id){
        case 'Business':
            var address=jQuery('#Street_Address').html()+", "+jQuery('#City').html()+", "+jQuery('#State').html()+" "+jQuery('#Zip').html();
            jQuery('#Business_Map').gmap3({
                address: address,
                zoom:15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            })
                .marker({address:address});
            break;
        case 'Event':
            var address=jQuery('#Evt_Street_Address').html()+", "+jQuery('#Evt_City').html()+", "+jQuery('#Evt_State').html()+" "+jQuery('#Evt_Zip').html();
            jQuery('#Event_Map').gmap3({
                address: address,
                zoom:15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            })
                .marker({address:address});
            break;
            break;
        case 'Game':
            var address=jQuery('#Game_Loc_Address').html()+", "+jQuery('#Game_Loc_City').html()+", "+jQuery('#Game_Loc_State').html()+" "+jQuery('#Game_Loc_Zip').html();
            jQuery('#Game_Map').gmap3({
                address: address,
                zoom:15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            })
                .marker({address:address});
            break;
            break;
            break;
    }
});