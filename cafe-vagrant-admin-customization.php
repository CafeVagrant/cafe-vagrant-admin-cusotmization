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

    /*function oz_remove_help_tabs( $old_help, $screen_id, $screen ){
        $screen->remove_help_tabs();
        return $old_help;
    }
    add_filter( 'contextual_help', 'oz_remove_help_tabs', 999, 3 );
    add_filter( 'screen_options_show_screen', '__return_false' );*/

    function enqueue_admin_style($hook) {
        if($hook == 'index.php') {
                wp_enqueue_style( 'custom_wp_admin_css', plugins_url('dashboard-style.css', __FILE__) );
        }
        if($hook == 'post.php') {
                wp_enqueue_style( 'custom_wp_admin_css', plugins_url('post-style.css', __FILE__) );
        }
        if($hook == 'widgets.php') {
                wp_enqueue_style( 'custom_wp_admin_css', plugins_url('widgets-style.css', __FILE__) );
        }
            
    }
    add_action( 'admin_enqueue_scripts', 'enqueue_admin_style' );

    function enqueue_admin_js($hook) {
        if($hook == 'index.php') {
            wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/ed613b336c.js' );
        }            
    }
    add_action( 'admin_enqueue_scripts', 'enqueue_admin_js');


    // Custom Admin footer
    function wpexplorer_remove_footer_admin () {
        
        //echo '<pre>' . print_r(get_current_screen()->id, true) . '</pre>';
        echo '<span id="footer-thankyou">This site is built by <a href="http://www.cafevagrant.com/" target="_blank">Cafe Vagrant</a>. For help contact <a href="mailto:info@cafevagrant.com</span>" target="_blank">info@cafevagrant.com</span>';
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
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', admin_url( 'widgets.php' ) ); ?></li>
                    </ul>
                    <ul>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-widgets-menus">' . __( 'Customize menus' ) . '</a>', admin_url( 'nav-menus.php' ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Read the tutorials' ) . '</a>', __( 'http://codex.wordpress.org/First_Steps_With_WordPress' ) ); ?></li>
                    </ul>
                </div>
                <div class="welcome-panel-column welcome-panel-last">
                    <h3><i class="fa fa-medkit" aria-hidden="true"></i> Need Website Assistance?</h3>
                    <form method="post" name="contact_form" class="contact-form" action="contact-form-handler.php" />
                        <input type="text" name="name" placeholder="Name" required />
                        <input type="text" name="email" placeholder="Email" required />
                        <input type="text" name="subject" class="subject" placeholder="Subject" required />
                        <textarea name="message" cols="40" rows="8" placeholder="Write a detailed description of your issue and I'll get back to you within a day. Write URGENT in the subject line if it is mission critical." required></textarea>
                        <button type="submit" class="submit-button button button-primary">Submit</button>
                    </form>   
                </div>
            </div>
            <div class="welcome-bottom">
                <div class="additional-services">
                    <h2>Additional Services</h2>
                </div>
                <div class="service-icons">
                    <div>
                        Maintenance Package
                    </div>
                    <div>
                        SEO
                    </div>
                    <div>
                        Website Hosting
                    </div>
                    <div>
                        Advertising
                    </div>
                    <div>
                        Graphics, Print
                    </div>
                    <div>
                        Photography, Video
                    </div>
                </div>
            </div>
        </div>
     
<?php
}

    remove_action('welcome_panel','wp_welcome_panel');
    add_action('welcome_panel','st_welcome_panel');