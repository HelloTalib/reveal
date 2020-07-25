<?php get_header();?>
  <!-- ======= Intro Section ======= -->
  <section id="intro">
      <?php
          $hero_text_prev = redux_value( 'hero_text_prev', 'Making' );
          $hero_text_main = redux_value( 'hero_text_main', 'your ideas' );
          $hero_text_next = redux_value( 'hero_text_next', 'happen!' );
          $hero_btn_1     = redux_value( 'hero_btn_1', 'Get Started' );
          $hero_btn_2     = redux_value( 'hero_btn_2', 'Our Projects' );
          $hero_slider    = redux_value( 'hero_slider' );
          echo sprintf( '<div class="intro-content"><h2>%s<span>%s</span><br>%s</h2><div><a href="#about" class="btn-get-started scrollto">%s</a><a href="#portfolio" class="btn-projects scrollto">%s</a></div></div><div id="intro-carousel" class="owl-carousel">',
              $hero_text_prev,
              $hero_text_main,
              $hero_text_next,
              $hero_btn_1,
              $hero_btn_2
          );
 
          if ( !empty( $hero_slider ) ) {
              foreach ( $hero_slider as $slider ) {
                  echo sprintf( '<div class="item" style="background-image: url(%s);"></div>', $slider['image'] );
              }
          }
      ?>

  </section><!-- End Intro Section -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
      <?php
          $about_image      = redux_value( 'about_image' )['url'];
          $about_title      = redux_value( 'about_title' );
          $about_desc       = redux_value( 'about_desc' );
          $about_items_list = redux_value( 'about_items_list' );
          echo sprintf( '<img src="%s" alt=""></div><div class="col-lg-6 content"><h2>%s</h2><h3>%s</h3><ul>', $about_image, $about_title, $about_desc );
          if ( !empty( $about_items_list ) ) {
              foreach ( $about_items_list as $items_list ) {
                  echo sprintf( '<li><i class="ion-android-checkmark-circle"></i>%s</li>', $items_list );
              }
          } else {
              $bdwebninja_about_items_demo = <<<NINJA
                    <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              NINJA;
              echo $bdwebninja_about_items_demo;
          }
      ?>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">

      <?php
          $clients_title  = redux_value( 'clients_title' );
          $clients_desc   = redux_value( 'clients_desc' );
          $clients_slider = redux_value( 'clients_slider' );
          echo sprintf( '<h2>%s</h2><p>%s</p><div class="owl-carousel clients-carousel">', $clients_title, $clients_desc );
          if ( !empty( $clients_slider ) ) {
              foreach ( $clients_slider as $clients_slide ) {
                  echo sprintf( '<img src="%s" alt="">', $clients_slide['image'] );
              }} else {
              echo sprintf( '
              <img src="%1$s/assets/img/clients/client-1.png" alt="">
              <img src="%1$s/assets/img/clients/client-2.png" alt="">
              <img src="%1$s/assets/img/clients/client-3.png" alt="">
              <img src="%1$s/assets/img/clients/client-4.png" alt="">
              <img src="%1$s/assets/img/clients/client-5.png" alt="">
              <img src="%1$s/assets/img/clients/client-6.png" alt="">
              <img src="%1$s/assets/img/clients/client-7.png" alt="">
              <img src="%1$s/assets/img/clients/client-8.png" alt="">
            </div>
          ', get_template_directory_uri() );
          }
      ?>

        </div>

      </div>
    </section><!-- End Clients Section -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio wow fadeInUp">
      <?php
          $portfolio_title = redux_value( 'portfolio_title' );
          $portfolio_desc  = redux_value( 'portfolio_desc' );
          $tags            = get_terms( [
              'hide_empty' => true,
              'taxonomy'   => 'portfolio_tag'
          ] );
      ?>
      <div class="container">
        <div class="section-header">
          <?php
              $portfolio = new WP_Query(
                  [
                      'post_type'      => 'portfolio',
                      'posts_per_page' => -1,
                      'post_status'    => 'publish'
                  ]
              );
              echo sprintf( '<h2>%s</h2><p>%s</p>', $portfolio_title, $portfolio_desc );
          ?>
        </div>
            <?php
                if ( $portfolio->have_posts() ) {
                ?>
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php
                  foreach ( $tags as $tag ) {
                          $data_slug = $tag->slug;
                          $data_name = $tag->name;
                          echo sprintf( '<li data-filter=".%s" class="filter-active">%s</li>', $data_slug, $data_name );
                      }
                  ?>
            </ul>
          </div>
        </div>

        <?php
            echo '<div class="row portfolio-container">';
                while ( $portfolio->have_posts() ) {
                    $portfolio->the_post();
                    $portfolio_tags = portfolio_tags( get_the_ID() );
                    $portfolio_img  = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                echo sprintf( '<div class="col-lg-4 col-md-6 portfolio-item %s"><img src="%s" class="img-fluid" alt="">', $portfolio_tags, $portfolio_img ); ?>
                          <div class="portfolio-info">
                            <h4><?php the_title();?></h4>
                            <p><?php the_excerpt();?></p>
                            <a href="<?php echo esc_url( $portfolio_img ); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="https://bdwebninja.com" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    <?php
                        }
                            wp_reset_query();
                        } else {
                            echo sprintf( '
                              <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <ul id="portfolio-flters">
                                      <li data-filter="*" class="filter-active">All</li>
                                      <li data-filter=".filter-app">App</li>
                                      <li data-filter=".filter-card">Card</li>
                                      <li data-filter=".filter-web">Web</li>
                                    </ul>
                                  </div>
                              </div>
                              <div class="row portfolio-container" style="position: relative; height: 877.5px;">

                              <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 0px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>App 1</h4>
                                  <p>App</p>
                                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="App 1"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="position: absolute; left: 380px; top: 0px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>Web 3</h4>
                                  <p>Web</p>
                                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="Web 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 760px; top: 0px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>App 2</h4>
                                  <p>App</p>
                                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="App 2"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 292.5px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>Card 2</h4>
                                  <p>Card</p>
                                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="Card 2"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="position: absolute; left: 380px; top: 292.5px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>Web 2</h4>
                                  <p>Web</p>
                                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="Web 2"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 760px; top: 292.5px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>App 3</h4>
                                  <p>App</p>
                                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="App 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 585px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>Card 1</h4>
                                  <p>Card</p>
                                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="Card 1"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="position: absolute; left: 380px; top: 585px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>Card 3</h4>
                                  <p>Card</p>
                                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="Card 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="position: absolute; left: 760px; top: 585px;">
                                <img src="%1$s/assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                  <h4>Web 3</h4>
                                  <p>Web</p>
                                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="Web 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>

                            </div>

                      ', get_template_directory_uri() );
                        }
                    ?>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials">
          <section id="team" class="wow fadeInUp">
      <?php
          $testmonial_title  = redux_value( 'testmonial_title' );
          $testmonial_desc   = redux_value( 'testmonial_desc' );
          $testmonial_slider = redux_value( 'testmonial_slider' );
      ?>
      <div class="container">
        <div class="section-header">
          <h2><?php echo esc_html__( $testmonial_title ); ?></h2>
          <p><?php echo esc_html__( $testmonial_desc ); ?></p>
        </div>
        <div class="owl-carousel testimonials-carousel">
         <?php
             if ( !empty( $testmonial_slider ) ) {
                 foreach ( $testmonial_slider as $slide ) {
                 ?>
            <div class="testimonial-item">
            <p>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
              <?php echo esc_html__( $slide['description'], 'reveal' ); ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
            <img src="<?php echo esc_url( $slide['image'] ); ?>" class="testimonial-img" alt="">
            <h3><?php echo esc_html__( $slide['title'], 'reveal' ); ?></h3>
            <h4><?php echo esc_html__( $slide['url'], 'reveal' ); ?></h4>
          </div>
 <?php
     }
     } else {
         echo sprintf( '
          <div class="testimonial-item">
            <p>
              <img src="%1$s/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <img src="%1$s/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
            <img src="%1$s/assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <img src="%1$s/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <img src="%1$s/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
            <img src="%1$s/assets/img/testimonial-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <img src="%1$s/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <img src="%1$s/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
            <img src="%1$s/assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <img src="%1$s/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <img src="%1$s/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
            <img src="%1$s/assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <img src="%1$s/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <img src="%1$s/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
            <img src="%1$s/assets/img/testimonial-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
          </div>
      ', get_template_directory_uri() );
     }
 ?>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
      <?php
          $cta_title    = redux_value( 'cta_title' );
          $cta_desc     = redux_value( 'cta_desc' );
          $cta_btn_text = redux_value( 'cta_btn_text' );
          echo sprintf( '
         <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">%s</h3>
            <p class="cta-text">%s</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">%s</a>
          </div>
        </div>
        ', $cta_title, $cta_desc, $cta_btn_text );
      ?>
      </div>
    </section><!-- End Call To Action Section -->
    <!-- ======= Team Section ======= -->
<section id="team" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
<?php
    $team_member = new WP_Query(
        [
            'post_type'      => 'team_member',
            'post_stauts'    => 'publish',
            'posts_per_page' => -1
        ]
    );
    echo wp_reset_query();

?>
      <div class="container">
        <div class="section-header">
          <h2><?php echo esc_html( redux_value( 'team_title' ) ); ?></h2>
        </div>
        <div class="row">
<?php
    if ( !empty( $team_member ) ) {
        while ( $team_member->have_posts() ) {
            $team_member->the_post();
            $member_name         = 'team_member_name';
            $member_occupation   = 'team_member_occupation';
            $member_image        = get_the_post_thumbnail_url();
            $member_social_links = [
                'facebook' => 'team_member_facebook_url',
                'twitter'  => 'team_member_twitter_url',
                'linkedin' => 'team_member_linkedin_url',
                'github'   => 'team_member_github_url'
            ];
        ?>
         <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo esc_url( $member_image ); ?>" alt=""></div>
              <div class="details">
                <h4><?php echo the_field( $member_name ); ?></h4>
                <span><?php echo the_field( $member_occupation ); ?></span>
                <div class="social">
                  <a href="<?php echo esc_url( the_field( $member_social_links['facebook'] ) ); ?>"><i class="fa fa-facebook"></i></a>
                  <a href="<?php echo esc_url( the_field( $member_social_links['twitter'] ) ); ?>"><i class="fa fa-twitter"></i></a>
                  <a href="<?php echo esc_url( the_field( $member_social_links['linkedin'] ) ); ?>"><i class="fa fa-linkedin"></i></a>
                  <a href="<?php echo esc_url( the_field( $member_social_links['github'] ) ); ?>"><i class="fa fa-github"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php
            }} else {
                echo sprintf( '

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="%s/assets/img/team-1.jpg" alt=""></div>
              <div class="details">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="%s/assets/img/team-2.jpg" alt=""></div>
              <div class="details">
                <h4>Sarah Jhinson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="%s/assets/img/team-3.jpg" alt=""></div>
              <div class="details">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="%s/assets/img/team-4.jpg" alt=""></div>
              <div class="details">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

', get_template_directory_uri() );
            }
        ?>
        </div>
      </div>
    </section>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="wow fadeInUp">
      <?php
          $contact_title      = redux_value( 'contact_title' );
          $contact_desc       = redux_value( 'contact_desc' );
          $contact_address    = redux_value( 'contact_address' );
          $contact_phone      = redux_value( 'contact_phone' );
          $contact_email      = redux_value( 'contact_email' );
          $bdwebninja_contact = <<<NINJA
            <div class="container">
            <div class="section-header">
              <h2>$contact_title</h2>
              <p>$contact_desc</p>
            </div>
            <div class="row contact-info">
              <div class="col-md-4">
                <div class="contact-address">
                  <i class="ion-ios-location-outline"></i>
                  <h3>Address</h3>
                  <address>$contact_address</address>
                </div>
              </div>
              <div class="col-md-4">
                <div class="contact-phone">
                  <i class="ion-ios-telephone-outline"></i>
                  <h3>Phone Number</h3>
                  <p><a href="tel:$contact_phone">$contact_phone</a></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="contact-email">
                  <i class="ion-ios-email-outline"></i>
                  <h3>Email</h3>
                  <p><a href="mailto:$contact_email">$contact_email</a></p>
                </div>
              </div>
            </div>
          </div>
      NINJA;
      ?>
      <div class="container mb-4">
        <?php
            $location       = redux_value( 'contact_location' );
            $zoom           = redux_value( 'contact_zoom' );
            $bdwebninja_map = <<<NINJA
                <iframe width="100%>" height="500px"
                    src="https://maps.google.com/maps?q=$location&z=$zoom&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
            NINJA;
            echo $bdwebninja_map;
        ?>
      </div>
      <div class="container">
        <div class="form php-email-form">
          <?php
          if(!empty($contact_form_shortcode)){
            $contact_form_shortcode = redux_value( 'contact_form_shortcode' );
            echo do_shortcode( $contact_form_shortcode);
          }else{
           $bdwebnina_demo_content_contact_form =<<<NINJA
            <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>

            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>

            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
        NINJA;
        echo $bdwebnina_demo_content_contact_form;
          }
          
          ?>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php get_footer();?>

