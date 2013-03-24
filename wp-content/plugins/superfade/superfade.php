<?php
/*
Plugin Name: Superfade
Author: AdamMunns
Description: Turn your background or any block level div into an image fader.
Version: 1.0
PageLines: true
Plugin URI: http://www.adammunns.com/superfade
*/

add_action('pagelines_setup', 'superfade_check' );
function superfade_check() {	
	
	if( !function_exists('ploption') )
		return;
	
	$landing = new superfade;
}

class superfade {

	const version = '1.0';
	
	var $default_limit = 3;
	var $base_url = '';
	
	function __construct() {

		$this->base_url = sprintf( '%s/%s', WP_PLUGIN_URL,  basename( dirname( __FILE__ ) ) );
		$this->base_dir = sprintf( '%s/%s', WP_PLUGIN_DIR,  basename( dirname( __FILE__ ) ) );
		
		$this->superfade_setup();

		$this->superfade_options();
	}
	
	function superfade_setup() {
		
		add_action('init', array(&$this,'superfade_init'));

	}

	function superfade_init() {
		
		wp_enqueue_script( 'backstretch',  $this->base_url. '/js/jquery.backstretch.min.js', array( 'jquery' ), self::version, false );
		
		add_action('wp_footer',array(&$this,'superfade_script'));
	
	}
	
	function superfade_script() {
		global $pagelines_ID;
		$oset = array('post_id' => $pagelines_ID);
		
		$bs_speed = (ploption('bs_speed',$oset)) ? (ploption('bs_speed',$oset)) : '4000';
		$bs_transition_speed = (ploption('bs_transition_speed',$oset)) ? (ploption('bs_transition_speed',$oset)) : '700';
		$bs_selector = (ploption('bs_selector',$oset)) ? (ploption('bs_selector',$oset)) : '#site';
		$bs_images_num = (ploption('bs_images_num',$oset)) ? (ploption('bs_images_num',$oset)) : $this->default_limit;
		$imageArr = array();
			
			for($i = 1; $i<=$bs_images_num; $i++) {

				if(ploption('bs_image'.$i)) {
					$imageArr[] = ploption('bs_image'.$i);
				}
			}
		$counter = 0;
		$photos_js = '';
		foreach( $imageArr as $image ){
			$photos_js .= '"'.$image.'"';
			$counter++;

    		if ($counter < count($imageArr)) {
    			$photos_js .= ",";
    		}
		}


	?>
		<script type="text/javascript">
	    	jQuery(document).ready(function($){
				var path = '<?php echo $this->base_url ?>'; 
				var sel = '<?php echo $bs_selector ?>';
				var images = [<?php echo $photos_js; ?>];
				$(sel).backstretch(images, {
			        fade: <?php echo $bs_transition_speed;?>,
			        duration: <?php echo $bs_speed;?>
			    });
		
			});
		</script>
		
	<?php
	}
	
	function superfade_options(){
		global $pagelines_ID;
		$oset = array('post_id' => $pagelines_ID);

		$array['bs_speed'] = array(
			'type' 			=> 'text_small',
			'default'       => '4000',
			'title' 		=> __( 'Slide Duration', 'tourstop' ),
			'shortexp' 		=> __( 'How long should each image show?', 'pagelines' ),
			'exp' 			=> __( 'Default is 4 seconds per image', 'pagelines' ),
		);
		$array['bs_transition_speed'] = array(
			'type' 			=> 'text_small',
			'default'       => '700',
			'title' 		=> __( 'Slide Transition Speed', 'tourstop' ),
			'shortexp' 		=> __( 'How long should the transition take?', 'pagelines' ),
			'exp' 			=> __( 'Default is 700 milliseconds', 'pagelines' ),
		);
		$array['bs_selector'] = array(
			'type' 			=> 'text',
			'default'       => '#site',
			'title' 		=> __( 'Alternate Background Selector', 'tourstop' ),
			'shortexp' 		=> __( 'Enter the class or ID of the block level element you want to work with superfade', 'pagelines' ),
			'exp' 			=> __( 'Default is "#site"', 'pagelines' ),
		);
		
		$bs_images_num = (ploption('bs_image_num',$oset)) ? (ploption('bs_image_num',$oset)) : $this->default_limit;

		$array['bs_image_num'] = array(
			'type' 			=> 'count_select',
			'count_start'	=> 1, 
			'count_end'		=> 10,
			'default'       => '3',
			'title' 		=> __( 'Number of Images', 'tourstop' ),
			'shortexp' 		=> __( 'Choose the number of images for your background fader', 'tourstop' ),
			'exp' 			=> __( 'This number will be used to generate the image uploader below. Save Settings to see new fields.', 'tourstop' ),
		);

		for($i = 1; $i <=$bs_images_num; $i++){
		
			$array['bs_image'.$i]	= array(
				'type' 	=> 'image_upload',
				'title' => 'Image '.$i,				
				'shortexp' 			=> 'Image uploader for image '.$i,
			); 
		}

		
		// setup the options panel
		$tab_settings = array(
			'id' 		=> 'superfade_meta',
			'name'	 	=> 'Superfade',
			'array'     => $array,
			'icon' 		=> $this->base_url.'/images/image.png',
		);
	
		pl_add_options_page($tab_settings);
		
		
	}

}