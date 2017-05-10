<?php
/**
 * Plugin Name: Cafe Vagrant Admin Customization
 * Plugin URI: http://www.cafevagrant.com/
 * Description: This plugin customizes the admin panel to assist the client
 * Version: 1.0.0
 * Author: Tanner Chung
 * Author URI: http://www.cafevagrant.com
 * License: GPL2
 */

    function remove_help_tabs( $old_help, $screen_id, $screen ){
        
        if(!current_user_can('be_system_admin')) {
            $screen->remove_help_tabs();
            return $old_help;
        }
    }
    add_filter( 'contextual_help', 'remove_help_tabs', 999, 3 );
    add_filter( 'screen_options_show_screen', '__return_false' );


    function enqueue_admin_style($hook) {
        if($hook == 'index.php') {
                wp_enqueue_style( 'custom_wp_admin_css', plugins_url('dashboard-style.css', __FILE__), $in_footer = true );
        }
        if($hook == 'post.php' && !current_user_can('be_system_admin')) {
                wp_enqueue_style( 'custom_wp_admin_css', plugins_url('post-style.css', __FILE__), $in_footer = true );
        }
        if($hook == 'widgets.php' && !current_user_can('be_system_admin')) {
                wp_enqueue_style( 'custom_wp_admin_css', plugins_url('widgets-style.css', __FILE__), $in_footer = true );
        }
        if($hook == 'nav-menus.php' && !current_user_can('be_system_admin')) {
                wp_enqueue_style( 'custom_wp_admin_css', plugins_url('menus-style.css', __FILE__), $in_footer = true );
        }
            
    }
    add_action( 'admin_enqueue_scripts', 'enqueue_admin_style' );

    function enqueue_admin_js($hook) {
        if($hook == 'index.php') {
            wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/ed613b336c.js', $in_footer = true );
            wp_enqueue_script( 'dashboard-custom-script', plugins_url('dashboard-scripts.js',__FILE__ ), $in_footer = true );
        }
        if($hook == 'widgets.php' && !current_user_can('be_system_admin')) {
            wp_enqueue_script( 'dashboard-custom-script', plugins_url('widgets-scripts.js',__FILE__ ), $in_footer = true );
        }
    }
    add_action( 'admin_enqueue_scripts', 'enqueue_admin_js');


    // Custom Admin footer
    function wpexplorer_remove_footer_admin () {
        
        if(!current_user_can('be_system_admin')) {
            echo '<span id="footer-thankyou">This site is built by <a href="http://www.cafevagrant.com/" target="_blank">Cafe Vagrant</a>. For help contact <a href="mailto:info@cafevagrant.com</span>" target="_blank">info@cafevagrant.com</span>';
        
        }
    }
    add_filter( 'admin_footer_text', 'wpexplorer_remove_footer_admin' );

    function st_welcome_panel() {
?>

        <div class="custom-welcome-panel-content">
            <div class="welcome-panel-column-container">
                <div class="welcome-top">
                      <div class="welcome-logo">
                           <div class="welcome-panel-logo">
                              <!-- Adds a logo top left-->
                              <a href="<?php echo site_url(); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() . "/images/PSECA6.1-blue.png"; ?>"/></a>
                          </div>  
                      </div>
                </div>
                <div class="welcome-panel-column">
                      <div class="welcome-title">
                          <h1>Welcome to Your Website!</h1>
                      </div>
                    <div class="top-left-welcome-panel-content">
                        <div class="title-welcome-panel">

                            <p class="welcome-description">This page is designed to give you some important infomration about your website. You can use the links below to quickly navigate to the most important areas of your website. Use the contact form to quickly reach out for support if you have any trouble!</p>
                            <p class="welcome-description">
                        </div>
                    </div>

                    <h4><?php _e( "Let's Get Started" ); ?></h4>
                    <ul>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Read the tutorials' ) . '</a>', __( 'http://bit.ly/psec-wp-tutorial' ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', admin_url( 'widgets.php' ) ); ?></li>
                    </ul>
                    <ul>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-widgets-menus">' . __( 'Customize menus' ) . '</a>', admin_url( 'nav-menus.php' ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon dashicons-chart-area">' . __( 'View Google Analytics' ) . '</a>', __( 'https://analytics.google.com' ) ); ?></li>
                    </ul>
                </div>
                <div class="welcome-panel-column welcome-panel-last">
                    <h3><i class="fa fa-medkit" aria-hidden="true"></i> Need Website Assistance?</h3>
                    <form method="post" name="contact_form" class="contact-form" action="<?php echo plugins_url('contact-form-handler.php', __FILE__)?>" />
                        <input type="text" name="name" placeholder="Name" required />
                        <input type="text" name="email" placeholder="Email" required />
                        <input type="text" name="subject" class="subject" placeholder="Subject" required />
                        <textarea name="message" cols="40" rows="8" placeholder="Write a detailed description of your issue and I'll get back to you within a day. Write URGENT in the subject line if it is mission critical." required></textarea>
                        <div id="form-message"></div>
                        <button type="submit" class="submit-button button button-primary">Submit</button>
                    </form>   
                </div>
            </div>
            <div class="break">
                <svg height="1" width="90%">
                        <line x1="0" y1="0" x2="5000" y2="0" style="stroke:rgb(190, 204, 226);stroke-width:2" />
                </svg>
            </div>
            <div class="welcome-bottom">
                <div class="additional-services">
                    <h2>Additional Services</h2>
                </div>
                <div class="service-icons">
                    <div class="service-row">
                        <div class="service">
                            <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20Maintenance%20Package&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20the%20Maintenance%20Package%2E" target="_blank">
                                <div class="service-icon">
                                    <i class="fa fa-life-ring fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    Maintenance Package
                                </div>
                            </a>
                        </div>
                        <div class="service">
                            <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20SEO%2FAnalytics&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20your%20SEO%26Analytics%20Services%2E" target="_blank">                            
                                <div class="service-icon">
                                    <i class="fa fa-bar-chart fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    SEO/Analytics
                                </div>
                            </a>
                        </div>
                        <div class="service">
                             <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20Web%20Hosting&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20your%20Web%20Hosting%20Services%2E" target="_blank">
                                <div class="service-icon">
                                    <i class="fa fa-cloud fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    Website Hosting
                                </div>
                            </a>
                        </div>
                        <div class="service">
                             <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20Google%2FFacebook%20Ads&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20your%20Google%2FFaceboook%20Ad%20Services%2E" target="_blank">
                                <div class="service-icon">
                                    <i class="fa fa-buysellads fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    Google/Facebook Ads
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="service-row">
                        <div class="service">
                            <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20Newsletters&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20your%20Newsletter%20Services%2E" target="_blank">                        
                                <div class="service-icon">
                                    <i class="fa fa-envelope-o fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    Newsletters
                                </div>
                            </a>
                        </div>
                        <div class="service">
                            <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20Graphics%2FPrint&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20your%20Graphics%20%26%20Printing%20Services%2E" target="_blank">                            
                                <div class="service-icon">
                                    <i class="fa fa-photo fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    Graphics/Print
                                </div>
                            </a>
                        </div>
                        <div class="service">
                            <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20Photography%2FVideo&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20your%20Photography%26Video%20Services%2E" target="_blank">
                                <div class="service-icon">
                                    <i class="fa fa-camera fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    Photography/Video
                                </div>
                            </a>
                        </div>
                        <div class="service">
                            <a href="mailto:info@cafevagrant.com?subject=Services%20Inquiry%2C%20Web%20Applications&body=Hi%2C%20I%27d%20like%20to%20inquire%20about%20building%20a%20Web%20Application%2E" target="_blank">
                                <div class="service-icon">
                                    <i class="fa fa-cogs fa-4x" aria-hidden="true"></i>
                                </div>
                                <div class="service-label">
                                    Web Applications
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
<?php
}


    remove_action('welcome_panel','wp_welcome_panel');
    add_action('welcome_panel','st_welcome_panel');