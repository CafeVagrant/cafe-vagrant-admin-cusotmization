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
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', admin_url( 'widgets.php' ) ); ?></li>
                    </ul>
                    <ul>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-widgets-menus">' . __( 'Customize menus' ) . '</a>', admin_url( 'nav-menus.php' ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Read the tutorials' ) . '</a>', __( 'http://codex.wordpress.org/First_Steps_With_WordPress' ) ); ?></li>
                    </ul>
                </div>
                <div class="welcome-panel-column welcome-panel-last">
                    <h3><i class="fa fa-medkit" aria-hidden="true"></i> Need Website Assistance?</h3>
                    <form method="post" name="contact_form" class="contact-form" action="<?php echo plugins_url('contact-form-handler.php', __FILE__)?>" />
                        <input type="text" name="name" placeholder="Name" required />
                        <input type="text" name="email" placeholder="Email" required />
                        <input type="text" name="subject" class="subject" placeholder="Subject" required />
                        <textarea name="message" cols="40" rows="8" placeholder="Write a detailed description of your issue and I'll get back to you within a day. Write URGENT in the subject line if it is mission critical." required></textarea>
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
                            <div class="service-icon">
                                <i class="fa fa-life-ring fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                Maintenance Package
                            </div>
                        </div>
                        <div class="service">
                            <div class="service-icon">
                                <i class="fa fa-bar-chart fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                SEO/Analytics
                            </div>
                        </div>
                        <div class="service">
                            <div class="service-icon">
                                <i class="fa fa-cloud fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                Website Hosting
                            </div>
                        </div>
                        <div class="service">
                            <div class="service-icon">
                                <i class="fa fa-buysellads fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                Google/Facebook Ads
                            </div>
                        </div>
                    </div>
                    <div class="service-row">
                        <div class="service">
                            <div class="service-icon">
                                <i class="fa fa-envelope-o fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                Newsletters
                            </div>
                        </div>
                        <div class="service">
                            <div class="service-icon">
                                <i class="fa fa-photo fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                Graphics/Print
                            </div>
                        </div>
                        <div class="service">
                            <div class="service-icon">
                                <i class="fa fa-camera fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                Photography/Video
                            </div>
                        </div>
                        <div class="service">
                            <div class="service-icon">
                                <i class="fa fa-cogs fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="service-label">
                                Web Applications
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     