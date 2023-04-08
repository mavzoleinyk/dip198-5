<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <?php wp_head();  ?>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

</head>

<body class="bg-light single-post style-default style-rounded" <?php body_class(); ?>>
  
  <!-- Bg Overlay -->
  <div class="content-overlay"></div>

  <!-- Sidenav -->    
  <header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>
    
    <!-- Nav -->
    <nav class="sidenav__menu-container">
      <?php
          wp_nav_menu(
              array(
                  'menu'  => '28556',
                  'menu_class'=> 'nav__menu',
              )
          );
      ?>
    </nav>
  </header> <!-- end sidenav -->


  <main class="main oh" id="main">

    <!-- Top Bar -->
    <div class="top-bar d-none d-lg-block">
      <div class="container">
        <div class="row">

          <!-- Top menu -->
          <div class="col-lg-6">
            <div class="top-header">
              <div class="logo">
                <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="Заказать подлинный документ с доставкой" title="Заказать подлинный документ с доставкой"></a>
              </div>
              <ul class="top-menu">
                <li><a href="tel:+78127010022">7 (812) 701-00-22</a></li>
                <li><a href="mailto:zakaz@dip-197.com">zakaz@diplomy-78.com</a></li>
              </ul>
            </div>
          </div>

          <!-- Socials -->
          <div class="col-lg-6">
            <div class="socials nav__socials socials--nobase socials--white justify-content-end"> 
              <a href="https://wa.me/79523763899" class="social social-whatsapp" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-whatsapp.png" alt="Заказать диплом в WhatsApp"></a>
              <a href="viber://add?number=79523763899" class="social social-viber" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-viber.png" alt="Заказать диплом в Viber"></a>
              <a href="https://t.me/DocumentovBot" class="social social-telegram" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-telegram.png" alt="Заказать диплом в Telegram"></a>
            </div>
          </div>

        </div>
      </div>
    </div> <!-- end top bar -->

    <!-- Navigation -->
    <header class="nav">
    <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <!-- Side Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> 

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">
                <?php
                    wp_nav_menu(
                        array(
                            'menu'  => '28556',
                            'menu_class'=> 'nav__menu',
                        )
                    );
                ?>
            </nav> <!-- end nav-wrap -->

            <!-- Nav Right -->
            <div class="nav__right">

              <!-- Search -->
              <div class="nav__right-item nav__search">
                <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                  <i class="ui-search nav__search-trigger-icon"></i>
                </a>
                <div class="nav__search-box" id="nav__search-box">
                  <form class="nav__search-form" action="/" method="get">
                    <input type="text" name="s" id="search" class="nav__search-input" alue="<?php the_search_query(); ?>" placeholder="Поиск...">
                    <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                      <i class="ui-search nav__search-icon"></i>
                    </button>
                  </form>
                </div>                
              </div>             

            </div> <!-- end nav right -->            
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
      <div class="nav__herologo">
        <div class="container">
          <div class="row">
            <div class="col-12">
            <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo78_5.png.webp" alt="Этапы оформления заказа оригинального диплома в Москве" title="Этапы оформления заказа оригинального диплома в Москве"></a>
            </div>
          </div>
        </div>
      </div>
    </header> <!-- end navigation -->

    <!-- Breadcrumbs -->
    <div class="container">
    <?php
          if ( !is_page(10) ) :
            do_action('pretty_breadcrumb');
         else :
             echo '<div class="block-serp"></div>';
         endif;
    ?>

    </div>
