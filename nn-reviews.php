<?php
/* Plugin Name: Nearby Now Reviews
Plugin URI: http://leadsnearby.com/
Description: The Nearby Now Reviews Plugin is the easiest way to include both your Nearby Now Reviews and Tech Profiles on your website.
Version: 5.2
Author: Leads Nearby
Author URI: http://leadsnearby.com/
License: GPLv2 or later
*/

	function nn_scripts_init()
	{
		/* Register our script. */
	   if (!is_admin()) {
			wp_register_script('nn-reviews-code', plugins_url('js/nn-reviews-code.js',__FILE__), '', '1.0', TRUE);
			wp_enqueue_script( 'nn-reviews-code' );
	   }
	}
 
	add_action('wp_enqueue_scripts', 'nn_scripts_init');	
	
	function nn_css_styles()  
	{ 
		if (!is_admin()) {
			wp_register_style('nn-reviews-code', plugins_url('css/nn-reviews-code.css',__FILE__));
			wp_enqueue_style( 'nn-reviews-code' );
		}		
	}
	add_action('wp_enqueue_scripts', 'nn_css_styles');


	//Creates Admin Page	
	add_action('admin_menu', 'nn_tech_profile');
	function nn_tech_profile ()
	{
		if ( count($_POST) > 0 && isset($_POST['nn_tech_settings']) )
		{
			$options = array (
				'data_key',
				'review_page'
			);
			
			foreach ( $options as $opt )
			{
				delete_option ( 'jpg_'.$opt, $_POST[$opt] );
				add_option ( 'jpg_'.$opt, $_POST[$opt] );	
			}			
			 
		}
		
		add_options_page(__('Nearby Now Reviews'), __('Nearby Now Reviews'), 'edit_themes', basename(__FILE__), 'nn_tech_settings');
	}


function nn_tech_settings()
{?>

<style>
#directions {background-color: #FFFFFF; border-left: 4px solid #FFBA00; box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1); float: left; margin: 20px 0; padding: 2%; width: 35%;}
#data .form-table input, #data .form-table select {border-left: 4px solid #FFBA00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);float:left; margin-left: 20px;}
#data .full, #data .form-table select {width:300px;}
#data .head {float:left; width: 225px;}
#data .form-table {clear:none; float: left; margin-top: 0.5em; width: 50%;}
.admin-page-title {font-size: 18px; margin: 10px 0 5px;}
.clear {clear:both;}
</style>

<div id="data">
	<form method="post" action="">
		<fieldset>
		<div class="admin-page-title">Nearby Now Tech Profiles</div>
		<div>The Reviews Javascript Widget (BETA) is the easiest way to include your Nearby Now Tech Profiles on your website.</div>
		<em style="font-size:11px;">Note: Unlike the Nearby Now server-side API and WordPress/Joomla plugins, the Javascript API offers no SEO value for your website. The widget HTML is loaded asynchronously it will not be discovered by search engines.</em>
			<hr>
			<table class="form-table">
				<tr valign="top">
					<td>
						<div class="head">
						<label for="api_key">Nearby Now API Key</label><br />
						<em>Your Nearby Now API Token</em><br />
						</div>
						<input name="data_key" type="text" id="data_key" class="full" value="<?php echo get_option('jpg_data_key'); ?>" class="regular-text" />
					</td>
				</tr>	
				<tr valign="top">
					<td>
						<div class="head">
						<label for="review_page">Reviews Page Select</label><br />
						<em>Select a page to point your reviews shortcode to.</em><br />
						</div>
						<div><?php wp_dropdown_pages("name=review_page&show_option_none=".__('- Select -')."&selected=" .get_option('jpg_review_page')); ?></div>
					</td>
				</tr>				
			</table>
			<div id="directions">
				<div class="admin-page-title">How to include Nearby Now Reviews on your website</div>
				<p>Simply paste the shortcode below on the page you want to display the widget.</p>
				<em>To change the amount of reviews appearing, just change the data_count in the shortcode.</em>
				<p>[nn-reviews data_count="1" auto_scroll="yes"]</p>
				<p>You can also include the shortcode into your PHP by pasting the code below:</p>
				<p> &lt;?php echo do_shortcode('[nn-reviews data_count="1" auto_scroll="yes"]') ?&gt; </p>
				<p><strong>Definitions</strong></p>
				<ul>
				    <li><strong>data_count</strong> - The number of reviews to display (sidebar and full widgets only)</li>
				    <li><strong>auto_scroll (yes or no)</strong> - This will enable reviews to auto scroll and display only 1 review at a time with fade in/out effects.</li>
				</ul>
				<hr />
				<div class="admin-page-title">How to include Nearby Now Tech Reviews on your website</div>
				<p>Simply paste the shortcode below on the page you want to display the widget.</p>
				<em>To change the amount of reviews appearing, just change the data_count in the shortcode.</em>
				<p>[nn-tech data_count="1" data_tech="email@email.com" data_type="full"]</p>
				<p>You can also include the shortcode into your PHP by pasting the code below:</p>
				<p> &lt;?php echo do_shortcode('[nn-tech data_count="1" data_tech="email@email.com" data_type="full"]') ?&gt; </p>
				<p><strong>Definitions</strong></p>
				<ul>
         			<li><strong>data_type</strong> - The type of widget you want to display (defaults to mini)</li>	
				    <li><strong>data_count</strong> - The number of reviews to display (sidebar and full widgets only)</li>
				    <li><strong>data_tech</strong> - The email address of the user who's reviews you want to display</li>
				</ul>
				<br />
				<strong>Widget Types</strong><br />
				<p>There are three types of widgets available. The default type is "mini". You can supply a type data tag to change the default widget type.</p>
				
				<strong>Mini</strong> - data_type="mini"<br />
				<p>The mini widget displays your accounts aggregate review rating, number of stars, and a count of total reviews. Example</p>
				
				<strong>Sidebar</strong> - data_type="sidebar"<br />
				<p>The sidebar widget displays the mini-widget, plus a lite version of your three most recent reviews. You can change the widget to display more reviews by supplying a count data tag: data-count="5". This widget is great for displaying reviews on your website sidebar.</p>
				
				<strong>Full</strong> - data_type="full"<br />
				<p>The full widget displays the mini-widget, plus your three most recent reviews including the sub-ratings. You can change the widget to display more reviews by supplying a count data tag: data-count="5". Use this widget if you want to display your reviews as the primary content of a page. For example, this widget fits nicely on a home page below your existing home page content.</p>				
			</div>
			<div class="clear"></div>			
		</fieldset>	
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
			<input type="hidden" name="nn_tech_settings" value="save" style="display:none;" />
		</p>
	</form>
</div>


<?php }

	/**
	 * Shortcode for NN Tech Reviews
	*/ 
	// [nn-tech]
	function nn_tech_profiles_func( $atts ) {
		extract(shortcode_atts(array(
			"data_key" => '',
			"data_count" => '10',
			"data_type" => '',
			"data_tech" => '',
            "data_type" => 'mini',
			"data_container" => 'tech-reviews'
		), $atts));
		
		return 
			'<div id="tech-reviews"></div>
			 <script src="https://s3.amazonaws.com/reviewcloud/widget/v1/reviews.min.js"
				data-key="' . get_option('jpg_data_key') . '"
				data-tech="' .$data_tech. '"
				data-container="' .$data_container. '"
				data-type="' .$data_type. '"
				data-count="' .$data_count. '">
			 </script>';				
	}
	add_shortcode( 'nn-tech', 'nn_tech_profiles_func' );
	
	/**
	 * Shortcode for NN Reviews
	*/ 
	// [nn-reviews]
	function nnreviews_func( $atts ) {
		extract(shortcode_atts(array(
			"data_count" => '',
			"auto_scroll" => 'no',
			"widget" => 'no',
		), $atts));

		if ($atts['widget'] == 'yes') {

			wp_register_script('nn-sentence-killer', plugins_url('js/nn-sentence-killer.js',__FILE__), '', '1.0', TRUE);
			wp_enqueue_script( 'nn-sentence-killer' );

			wp_register_script('nn-reviews-autoscroll', plugins_url('js/nn-reviews-autoscroll.js',__FILE__), '', '1.0', TRUE);
			wp_enqueue_script( 'nn-reviews-autoscroll' );
			
			wp_register_style('nn-reviews-code-widget', plugins_url('css/nn-reviews-code-widget.css',__FILE__));
			wp_enqueue_style( 'nn-reviews-code-widget' );
			
			return '<style>.auto-scroll .nn-review-item{display:none;}</style><a href="' . get_permalink(get_option('jpg_review_page')) . '"><div id="nn-reviews" class="jpg auto-scroll widget"></div></a><script src="https://s3.amazonaws.com/reviewcloud/widget/v1/reviews.min.js" data-key="' . get_option('jpg_data_key') . '"data-type="full" data-count="'.$data_count.'"></script>';			
		
		}

		if($atts['auto_scroll'] == 'yes') {
		
			wp_register_script('nn-sentence-killer', plugins_url('js/nn-sentence-killer.js',__FILE__), '', '1.0', TRUE);
			wp_enqueue_script( 'nn-sentence-killer' );

			wp_register_script('nn-reviews-autoscroll', plugins_url('js/nn-reviews-autoscroll.js',__FILE__), '', '1.0', TRUE);
			wp_enqueue_script( 'nn-reviews-autoscroll' );
			
			return '<style>.auto-scroll .nn-review-item{display:none;}</style><a href="' . get_permalink(get_option('jpg_review_page')) . '"><div id="nn-reviews" class="jpg auto-scroll"></div></a><script src="https://s3.amazonaws.com/reviewcloud/widget/v1/reviews.min.js" data-key="' . get_option('jpg_data_key') . '"data-type="full" data-count="'.$data_count.'"></script>';	
			
		} else {
		
			wp_register_script('nn-sentence-killer', plugins_url('js/nn-sentence-killer.js',__FILE__), '', '1.0', TRUE);
			wp_enqueue_script( 'nn-sentence-killer' );
		
			return '<a href="' . get_permalink(get_option('jpg_review_page')) . '"><div id="nn-reviews" class="jpg"></div></a><script src="https://s3.amazonaws.com/reviewcloud/widget/v1/reviews.min.js" data-key="' . get_option('jpg_data_key') . '"data-type="full" data-count="'.$data_count.'"></script>';				
		}
		
	}
	add_shortcode( 'nn-reviews', 'nnreviews_func' );

?>