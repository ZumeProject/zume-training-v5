jQuery(document).ready(function(){

  jQuery('.hide-extra').show();
  jQuery('#extra_button').removeClass('hollow')

  if ( getCookie( 'extra' ) === "on") {
    jQuery('#extra_button').removeClass('hollow')
    jQuery('.hide-extra').show();
  } else if ( getCookie( 'extra' ) === "off" ){
    jQuery('#extra_button').addClass('hollow')
    jQuery('.hide-extra').hide();
  }
  if ( getCookie( 'columns' ) === "single") {
    jQuery('#column_button').removeClass('hollow')
    jQuery('.session').removeClass('medium-6')
  }
})
