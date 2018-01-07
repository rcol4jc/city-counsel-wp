/**
 * Created by rcol4 on 11/17/2016.
 */

jQuery(document).ready(function () {
    jQuery('.DaysOfWeek input[type=checkbox]').change(function () {
        calcCost();
    })
    function calcCost(){
        var daysChecked=0;
        var amount=0.00;
        jQuery('.DaysOfWeek input[type=checkbox]').each(function () {
            if (jQuery(this).prop('checked')==true){
                daysChecked++;
            }
            //calculate amount
            //if only one day is checked, the amount is $10.00. All additional days are five dollars;
            if (daysChecked>0){
                if (daysChecked==1){
                    amount=10.00;
                    jQuery('#wdform_9_element12').val(amount+".00");
                } else if (daysChecked>1){
                    var extraDays=daysChecked-1;
                    amount=10.00+extraDays*5.00;
                    jQuery('#wdform_9_element12').val(amount+".00");
                }
            }
        });
    }

});
