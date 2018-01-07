/**
 * Created by rcol4 on 8/30/2016.
 */

jQuery(document).ready(

    function () {
        if (jQuery('#CPT_info_validation').length){

            var cpttype=jQuery("#CPT_info_validation").val();
            switch (cpttype){
                case 'event':
                    jQuery('input[type=radio][name=Duration]').change(function () {
                        if (jQuery(this).val()=='one_day'){

                            if (jQuery('#End_Date').prop('disabled')==false){
                                jQuery('#End_Date').prop('disabled', true);
                                jQuery('#End_Date').val('');
                            }

                        } else {
                            if (jQuery('#End_Date').prop('disabled')==true){
                                jQuery('#End_Date').prop('disabled', false);
                            }
                        }
                    });

                    jQuery('#Start_Date').datepicker();
                    jQuery('#End_Date').datepicker();
                    break;
                case 'game':
                    jQuery('#Location_TBA').change(function () {
                        if (jQuery(this).is(':checked')){
                            jQuery('#Game_Loc_Name').val("");
                            jQuery('#Game_Loc_Name').prop('disabled',true);
                            jQuery('#Game_Loc_Address').val("");
                            jQuery('#Game_Loc_Address').prop('disabled',true);
                            jQuery('#Game_Loc_State').val("");
                            jQuery('#Game_Loc_State').prop('disabled',true);
                            jQuery('#Game_Loc_City').val("");
                            jQuery('#Game_Loc_City').prop('disabled',true);
                            jQuery('#Game_Loc_Zip').val("");
                            jQuery('#Game_Loc_Zip').prop('disabled',true);

                        } else {

                            jQuery('#Game_Loc_Name').prop('disabled',false);
                            jQuery('#Game_Loc_Address').prop('disabled',false);
                            jQuery('#Game_Loc_State').prop('disabled',false);
                            jQuery('#Game_Loc_City').prop('disabled',false);
                            jQuery('#Game_Loc_Zip').prop('disabled',false);
                        }
                    });
                    jQuery('#Game_Date').datepicker();
                    break;
            }
        }


        jQuery('#post').submit(
            function (event) {
                if (jQuery('#CPT_info_validation').length) {
                    var cpttype=jQuery("#CPT_info_validation").val();
                    var errors="";
                    switch (cpttype) {
                        case 'business':
                            if (jQuery("#Street_Address").val()==''){
                                errors += "Street Address cannot be blank\n";
                            }
                            if (jQuery("#City").val()==''){
                                errors += "City cannot be blank\n";
                            }
                            if (jQuery("#Phone_Number").val()==''){
                                errors += "Phone Number cannot be blank\n";
                            }
                            var regExp=/\d{3}-\d{3}-\d{4}/;
                            var phone=jQuery("#Phone_Number").val();
                            var phone_correct=phone.match(regExp);
                            if (!phone_correct){
                                errors="Phone number is in wrong format. Please used 555-555-5555";
                            }
                            if (jQuery('#business_type').val()=='--Choose Business Type--'){
                                errors+="You must choose a business type\n";
                            }
                            if (!errors==""){
                                alert(errors);
                                event.preventDefault();
                            }
                            break;
                        case 'event':
                            var dateRegex=/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
                            var todayDate=new Date();
                            var startDate;

                            if (jQuery('#Start_Date').val()==''){
                                errors+='Start Date cannot be blank\n';
                            } else {
                                if (!dateRegex.test(jQuery('#Start_Date').val())){
                                    alert(jQuery('#Start_Date').val());
                                    errors+='Start Date is in the wrong format! Please use mm/dd/yyyy\n';

                                } else {
                                    startDate=new Date(jQuery('#Start_Date').val());
                                }

                            }
                            if (jQuery('input[type=radio][name=Duration]:checked').val()=='multi_days') {
                                if (jQuery('#End_Date').val()==''){
                                    errors+='End Date cannot be blank\n';
                                } else {
                                    if (!dateRegex.test(jQuery('#End_Date').val())){
                                        errors+='End Date is in the wrong format! Please use mm/dd/yyyy\n';
                                    } else {
                                        var endDate=new Date(jQuery('#End_Date').val());
                                        if (endDate<=startDate){
                                            errors+='End Date must be at least a day after the start date!';
                                        }
                                    }

                                }
                            }


                            if (jQuery('#Evt_Street_Address').val()==''){
                                errors+='Street Address cannot be blank\n';
                            }
                            if (jQuery('#Evt_City').val()==''){
                                errors+='City cannot be blank\n'
                            }
                            if (jQuery('#Evt_State').val()==''){
                                errors+='State cannot be blank\n'
                            } else {
                                var state=jQuery('#Evt_State').val();
                                if (state.length != 2){
                                    errors+="State must be 2 characters";
                                }
                            }
                            if (jQuery('#Evt_Zip').val()==''){
                                errors+='Zipcode cannot be blank\n';
                            } else {
                                var zipRegEx=/^\d{5}$|^\d{5}-\d{4}$/;
                                if (!zipRegEx.test(jQuery('#Evt_Zip').val())){
                                    errors+='Zipcode is in the wrong format\n';
                                }
                            }
                            if (!errors==""){
                                alert(errors);
                                event.preventDefault();
                            }
                            break;
                        case 'game':
                            if (jQuery('#Game_Date').val()==''){
                                errors+='Game Date cannot be blank\n';
                            } else {
                                var dateRegex=/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
                                if (!dateRegex.test(jQuery('#Game_Date').val())){
                                    errors+="Game Date is in the wrong format! Please use mm/dd/yyyy\n";
                                }
                            }
                            if (!jQuery('#Location_TBA').is(':checked')){

                                if (jQuery('#Game_Loc_Name').val()==''){
                                    errors+="Location name cannot be blank\n";
                                }
                                if (jQuery('#Game_Loc_Address').val()==''){
                                    errors+="Address cannot be blank\n";
                                }
                                if (jQuery('#Game_Loc_City').val()==''){
                                    errors+="City cannot be blank\n";
                                }
                                if (jQuery('#Game_Loc_State').val()==''){
                                    errors+="State cannot be blank\n";
                                } else {
                                    var state=jQuery('#Game_Loc_State').val();
                                    if (state.length != 2){
                                        errors+="State must be 2 characters\n";
                                    }
                                }
                                if (jQuery('#Game_Loc_Zip').val()==''){
                                    errors+="Zip code cannot be blank\n";
                                } else {
                                    var zipRegEx=/^\d{5}$|^\d{5}-\d{4}$/;
                                    if (!zipRegEx.test(jQuery('#Game_Loc_Zip').val())){
                                        errors+='Zipcode is in the wrong format\n';
                                    }
                                }
                            }

                            if (!errors==""){
                                alert(errors);
                                event.preventDefault();
                            }
                            break;
                    }
                }
            }
        );
    }
);