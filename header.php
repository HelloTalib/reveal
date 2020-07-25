<?php
    /**
     * The header for our theme
     *
     * This is the template that displays all of the <head> section and everything up until <div id="content">
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package reveal
     */

?>
<?php
?>
<!DOCTYPE html>
<html                               <?php language_attributes();?>>

<head>
<meta charset="<?php bloginfo( 'charset' );?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php bloginfo( 'name' );?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <?php wp_head();?>
</head>

<body                               <?php body_class();?>>
<?php wp_body_open();?>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <?php
            $header_mail      = redux_value( 'header_email', 'contact@example.com' );
            $header_phone     = redux_value( 'header_phone', '+1 5589 55488 55' );
            $header_logo_main = redux_value( 'header_logo_main', 'bd' );
            $header_logo_sub  = redux_value( 'header_logo_sub', 'webninja' );
            echo sprintf( '<i class="fa fa-envelope-o"></i> <a href="mailto:%1$s">%1$s</a><i class="fa fa-phone"></i>%2$s</div><div class="social-links float-right">', $header_mail, $header_phone );
            if ( is_active_sidebar( 'header-social-links' ) ) {
                dynamic_sidebar( 'header-social-links' );
            } else {
                $bdwebninja_social_links_demo = <<<NINJA
          <div class="social-links float-right">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
          <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>
        NINJA;
                echo $bdwebninja_social_links_demo;
            }
        ?>
      </div>
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $header_logo_main ); ?><span><?php echo esc_html( $header_logo_sub ); ?></span></a></h1>
      </div>

      <nav id="nav-menu-container">
    <?php
        if ( has_nav_menu( 'top_menu' ) ) {
            wp_nav_menu( [
                'theme_location' => 'top_menu',
                'menu_class'     => 'nav-menu',
                'menu_id'        => 'top_menu'
            ] );
        } else {
            $bdwebninja_top_menu_demo = <<<NINJA
          <nav id="nav-menu-container">
        <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
          <li class="menu-active"><a href="index.html">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="menu-has-children"><a href="" class="sf-with-ul">Drop Down</a>
            <ul style="display: none;">
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
      NINJA;
            echo $bdwebninja_top_menu_demo;
        }
    ?>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->

