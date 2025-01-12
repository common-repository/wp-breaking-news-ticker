<?php
function register_wpbnt_page() {
	add_submenu_page( 
	'options-general.php', 
	'Ticker Settings', 
	'Ticker Settings', 
	'manage_options', 
	'wp-breaking-news-ticker', 
	'wpbnt_admin_settings' ); 
}
add_action('admin_menu', 'register_wpbnt_page');

function wpbnt_admin_settings() {
	
	echo '<div class="wpbnt_warp">';
		echo '<h1>News Ticker Configurations</h1>';
?>

<div id="nhtLeft">
  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
    <h3><?php echo esc_attr(__('Insert your text & background color')); ?></h3>
    <table class="form-table">
      <tr>
        <th><label for="wpbnt_post_category"><?php echo esc_attr(__('Display Post Category')); ?></label></th>
        <td><select name="wpbnt_post_category">
            <option value=""><?php echo esc_attr(__('Select Category')); ?></option>
            <?php 
			$categories = get_categories(); 
			foreach ($categories as $category) { ?>
            <option value="<?php echo $category->slug; ?>" <?php if( get_option('wpbnt_post_category') == $category->slug ){ echo 'selected="selected"'; } ?>><?php echo $category->cat_name; ?> </option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <th><label for="wpbnt_effect"><?php echo esc_attr(__('Effect Type')); ?></label></th>
        <td><select name="wpbnt_effect" id="wpbnt_effect">
            <option value="typing" <?php if( get_option('wpbnt_effect') == 'typing'){ echo 'selected="selected"'; } ?>>Typing</option>
            <option value="fade" <?php if( get_option('wpbnt_effect') == 'fade'){ echo 'selected="selected"'; } ?>>Fade</option>
            <option value="slide" <?php if( get_option('wpbnt_effect') == 'slide'){ echo 'selected="selected"'; } ?>>Slide</option>
          </select></td>
      </tr>
      <tr>
        <th><label for="wpbnt_number_post"><?php echo esc_attr(__('Number of Post')); ?></label></th>
        <td><input type="text" name="wpbnt_number_post" value="<?php $wpbnt_number_post = get_option('wpbnt_number_post'); if(!empty($wpbnt_number_post)) {echo $wpbnt_number_post;} else {echo "10";}?>"></td>
      </tr>
      <tr>
      <tr>
        <th><label for="wpbnt_order"><?php echo esc_attr(__('Display Order')); ?></label></th>
        <td><select name="wpbnt_order" id="wpbnt_order">
            <option value="DESC" <?php if( get_option('wpbnt_order') == 'DESC'){ echo 'selected="selected"'; } ?>>Descending</option>
            <option value="ASC" <?php if( get_option('wpbnt_order') == 'ASC'){ echo 'selected="selected"'; } ?>>Ascending</option>
          </select></td>
      </tr>
      
        <th><label for="wpbnt_border_radius"><?php echo esc_attr(__('Border Radius')); ?></label></th>
        <td><input type="text" name="wpbnt_border_radius" value="<?php $wpbnt_border_radius = get_option('wpbnt_border_radius'); if(!empty($wpbnt_border_radius)) {echo $wpbnt_border_radius;} else {echo "15";}?>">
          px;</td>
      </tr>
      <tr>
        <th><label for="wpbnt_label"><?php echo esc_attr(__('Label Text')); ?></label></th>
        <td><input type="text" name="wpbnt_label" value="<?php $wpbnt_label = get_option('wpbnt_label'); if(!empty($wpbnt_label)) {echo $wpbnt_label;} else {echo "Breaking News:";}?>"></td>
      </tr>
      <tr>
        <th><label for="wpbnt_label_color"><?php echo esc_attr(__('Label Text Color')); ?></label></th>
        <td><input type="text" name="wpbnt_label_color" id="scrollbar_color" value="<?php $wpbnt_label_color = get_option('wpbnt_label_color'); if(!empty($wpbnt_label_color)) {echo $wpbnt_label_color;} else {echo "#FFF";}?>" class="color-picker wpbnt_label_color" /></td>
      </tr>
      <tr>
        <th><label for="wpbnt_bg_color"><?php echo esc_attr(__('Background Color')); ?><span>*</span></label></th>
        <td><input type="text" name="wpbnt_bg_color" id="scrollbar_color" value="<?php $wpbnt_bg_color = get_option('wpbnt_bg_color'); if(!empty($wpbnt_bg_color)) {echo $wpbnt_bg_color;} else {echo "#2d81c8";}?>" class="color-picker wpbnt_bg_color" /></td>
      </tr>
      <tr>
        <th><label for="wpbnt_text_color"><?php echo esc_attr(__('Text Color')); ?><span>*</span></label></th>
        <td><input type="text" name="wpbnt_text_color" id="scrollbar_color" value="<?php $wpbnt_text_color = get_option('wpbnt_text_color'); if(!empty($wpbnt_text_color)) {echo $wpbnt_text_color;} else {echo "#FFF";}?>" class="color-picker wpbnt_text_color" /></td>
      </tr>
      <tr>
        <th><label for="wpbnt_hover_color"><?php echo esc_attr(__('Text Hover Color')); ?></label></th>
        <td><input type="text" name="wpbnt_hover_color" id="scrollbar_color" value="<?php $wpbnt_hover_color = get_option('wpbnt_hover_color'); if(!empty($wpbnt_hover_color)) {echo $wpbnt_hover_color;} else {echo "#FFF";}?>" class="color-picker wpbnt_hover_color" /></td>
      </tr>
    </table>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="wpbnt_post_category, wpbnt_effect, wpbnt_number_post, wpbnt_order, wpbnt_border_radius, wpbnt_label,  wpbnt_label_color, wpbnt_bg_color, wpbnt_text_color, wpbnt_hover_color" />
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" />
    </p>
  </div>
  </form>

</div>
<div id="nhtRight">
<div class="nhtWidget">
    <h3><?php _e('Donate and support the development.','nht') ?></h3>
    <p><?php _e('With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)','nht') ?></p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
      <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <div class="nhtWidget">
    <h3><?php echo esc_attr(__('About the Plugin')); ?></h3>
    <p>You can make my day by submitting a positive review on <a href="https://wordpress.org/support/view/plugin-reviews/wp-breaking-news-ticker" target="_blank"><strong>WordPress.org!</strong> <img src="<?php bloginfo('url' ); echo"/wp-content/plugins/wp-breaking-news-ticker/img/review.png"; ?>" alt="review" class="review"/></a></p>
    <p><strong>View live demo & support of <a href="http://www.e2soft.com/blog/wp-breaking-news-ticker/" target="_blank">WP Breaking News Ticker</a> and <a href="#" target="_blank">video tutorial.</a></strong></p>
    <div class="clrFix"></div>
  </div>
  <div class="nhtWidget">
    <div class="clrFix"></div>
    <h3>About the Author</h3>
    <p>My name is <strong><a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">S M Hasibul Islam</a></strong> and I am a <strong><a href="http://www.e2soft.com/" target="_blank">Web Developer, Expert WordPress Developer</a></strong>. I am regularly available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch <a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">me</a>.<br />
      <strong>Skype:</strong> cse.hasib<br />
      <strong>Email:</strong> info@e2soft.com<br />
      <strong>Web:</strong> <a href="http://www.e2soft.com/">www.e2soft.com</a><br />
    <div class="clrFix"></div>
    <h3><a href="https://www.paypal.me/csehasib/10" target="_blank">Contribute to development</a></h3>
  </div>
  <div class="nhtWidget">
    <hr />
    <h3>Our Services</h3>
    <?php
	//bdonlinebazar.com
	$bdo_url = array("http://www.bdonlinebazar.com/","http://www.bdonlinebazar.com/products/clothing/","http://www.bdonlinebazar.com/products/electronics/","http://www.bdonlinebazar.com/products/watches/","http://www.bdonlinebazar.com/products/home-living");
	$bdo_random_urls = array_rand($bdo_url);
	
	//e2soft.com
	$e2_url = array("http://www.e2soft.com/web-design/","http://www.e2soft.com/web-design/","http://www.e2soft.com/web-design/","http://www.e2soft.com/portfolio","http://www.e2soft.com/");
	$e2_random_urls = array_rand($e2_url);
	
	//bdtrips.com
	$bdtrips_url = array("http://bdtrips.com/","http://bdtrips.com/hotels/","http://bdtrips.com/tour-packages/","http://bdtrips.com/car-rentals/","http://bdtrips.com/tourist-spots/","http://bdtrips.com/contact/");
	$bdtrips_random_urls = array_rand($bdtrips_url);
	?>
    <a href="<?php echo $e2_url["$e2_random_urls"]; ?>" target="_blank">Website Design & Development</a><br />
    <a href="<?php echo $bdtrips_url["$bdtrips_random_urls"]; ?>" target="_blank">Book your Trips Online</a><br />
    <a href="<?php echo $bdo_url["$bdo_random_urls"]; ?>" target="_blank">Online Shopping Bangladesh</a>
    
    <!--<iframe class="border_1" src="<?php echo $bdo_url["$bdo_random_urls"]; ?>" width="320" height="300"> </iframe>-->
    <div class="clrFix"></div>
  </div>
</div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}

