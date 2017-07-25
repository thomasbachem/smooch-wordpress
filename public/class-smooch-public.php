<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://twitter.com/smoochlabs
 * @since      1.1.3
 *
 * @package    Smooch
 * @subpackage Smooch/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Smooch
 * @subpackage Smooch/public
 * @author     Smooch <hello@smooch.io>
 */
class Smooch_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Smooch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Smooch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/smooch-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Smooch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Smooch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}

	/**
	 * Initialize SK
	 *
	 * @since    1.0.0
	 */
	public function init_sk() {
		global $current_user;

		/*
		Getting user data logged
		*/

		get_currentuserinfo();

		$givenName = $current_user->user_firstname;
		$surname = $current_user->user_lastname;
		$email = $current_user->user_email;

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Smooch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Smooch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$options = get_option( $this->plugin_name . '-options' );	?>
		<!-- SK Init -->
		<script>
        function loadScript(src, callback) { var s, r, t; r = false; s = document.createElement('script'); s.type = 'text/javascript'; s.src = src; s.onload = s.onreadystatechange = function() { if ( !r && (!this.readyState || this.readyState == 'complete') ) { r = true; callback(); } }; t = document.getElementsByTagName('script')[0]; t.parentNode.insertBefore(s, t); }
        loadScript('https://cdn.smooch.io/smooch.min.js', function() {
    		Smooch.init(
    			{
						appToken: <?php echo(json_encode($options['app-token']));?>,
						givenName: <?php echo(json_encode($givenName));?>,
		    			surname: <?php echo(json_encode($surname));?>,
		    			email: <?php echo(json_encode($email));?>,
		    			emailCaptureEnabled: true,
					    customText: {
		        			headerText: <?php echo(json_encode($options['header-text']));?>,
		        			inputPlaceholder: <?php echo(json_encode($options['input-placeholder']));?>,
		        			sendButtonText: <?php echo(json_encode($options['send-button-text']));?>,
		        			introductionText: <?php echo(json_encode($options['intro-text']));?>,
									introAppText: <?php echo(json_encode($options['intro-app-text']));?>
}
    			});
        });
		</script>

		<?php
	}
}
