//console.log('ceva');
jQuery(document).ready(function($){
    $('#wp-content-media-buttons').append('<a class="thickbox shortcode_opener" id="zsvg_shortcode" style="cursor:pointer;"><img src="'+zsvg_settings.thepath+'tinymce/img/shortcodes-small.png"/></a>');
    $('#zsvg_shortcode').bind('click', function(){
    tb_show('ZSVG Shortcodes', zsvg_settings.thepath + 'tinymce/popupiframe.php?width=630&height=800');
    })
})