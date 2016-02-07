
function kopa_theme_option_reset_CLICK(){
    jQuery('input:radio[name="kopa-select-layout-choice"][value="wide"]').prop('checked', true);  
    
    kopa_layout_CHANGE('wide');
    
    return false;
}

jQuery(document).ready(function($) {     
    kopa_style_switch_INIT();
 
    jQuery('input:radio[name="kopa-select-layout-choice"][value="wide"]').prop('checked', true);                    
});

function kopa_style_switch_INIT(){   
	
    // Switcher Layout
    $('#theme-option').animate({
        left: '-161px'
    });
		
    $('.open-close-button').click(function(e){
        e.preventDefault();
        var div = $('#theme-option');
        if (div.css('left') === '-161px') {
            $('#theme-option').animate({
                left: '0px'
            }); 
        } else {
            $('#theme-option').animate({
                left: '-161px'
            });
        }
    });

		
    // Reset
    $('a.reset').click(function(e){

        jQuery('.theme-opt-wrapper select[name=layout]').val('wide');	
        layout_CHANGE();
    });				    
}

function kopa_layout_CHANGE(val){
    if('wide' == val){
        jQuery('body').removeClass('kopa-boxed');

    }else{
        jQuery('body').addClass('kopa-boxed');
    }
}

