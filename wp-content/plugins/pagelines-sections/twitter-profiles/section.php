<?php
/*
Section: Twitter Profile
Author: MrFent
Author URI: http://www.MrFent.com/twitter-profile
Demo: http://www.MrFent.com/twitter-profile
External: http://www.MrFent.com/twitter-profile
Version: 1.0.0
Description: Display your three most recent Twitter updates
Class Name: TwitterProfile
Workswith: templates, main, sidebar1, sidebar2, sidebar_wrap, header, footer, morefoot
Cloning: true
*/

class TwitterProfile extends PageLinesSection {

	function section_optionator( $settings ){
		
		$settings = wp_parse_args($settings, $this->optionator_default);
	
		$tab = array(
			
			'twpurl' => array(
				'type' 			=> 'text',				
				'title' 		=> 'Setings',
				'shortexp' 		=> 'Enter Your Twitter Username',
				'inputlabel'	=> 'Username'
			)
		);
		$metatab_settings = array(
				'id' 		=> 'twitter_profile_meta',
				'name'	 	=> 'Twitter Profile',
				'icon' 		=> $this->icon,
				'clone_id'	=> $settings['clone_id'], 
				'active'	=> $settings['active']
			);
		register_metatab($metatab_settings, $tab, $this->class_name);
			
	}
	function section_template(){

	?> 
<?php 
	$twitterpurl = (ploption('twpurl', $this->oset)) ? ploption('twpurl', $this->oset) : '';
?> 	

<?php
if(!ploption('twpurl', $this->oset)){  
  echo setup_section_notify($this, __('Set your Twitter Username in the PageLines Meta Settings to activate.', 'pagelines'), null, null, 'twitter_profile_meta' ); 
return;
  }	
?>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 3,
  interval: 30000,
  width: 'auto',
  height: 'auto',
  theme: {
    shell: {
      background: '#333333',
      color: '#ffffff'
    },
    tweets: {
      background: '#000000',
      color: '#ffffff',
      links: '#4aed05'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('<?php echo $twitterpurl ?>').start();
</script>
<?php
}} 
	