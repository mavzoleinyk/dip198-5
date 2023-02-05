<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
    <!-- Footer -->
    <div class="bottom__page">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="bottom__page-text">
              Работаем практически во всех регионах РФ<br>Полная оплата только при получении документа на руки
            </div>
          </div>
          <div class="col-md-4">
            <div class="bottom__page-text">
              <a href="/kontakty/" class="btn-solid">Заказать документ</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer footer--dark">
    <div class="container">
        <div class="footer__widgets">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
              <aside class="widget widget_custom footer__widget-cust">
                <?php
                  if ( is_active_sidebar('footer_one') ){
                    dynamic_sidebar('footer_one');
                  }
                ?>
              </aside>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <aside class="widget widget_map footer__map">
                <?php
                  if( is_active_sidebar('footer_three')){
                    dynamic_sidebar('footer_three');
                  }
                ?>               
              </aside>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <aside class="widget widget_map footer__map">
                <?php
                  if( is_active_sidebar('footer_four')){
                    dynamic_sidebar('footer_four');
                  }
                ?>                  
              </aside>
            </div>
          </div>
        </div>    
      </div> <!-- end container -->
      <div class="footer__bottom">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="footer__copyright">
                <?php
                  if( is_active_sidebar('cust_footer_1') ){
                    dynamic_sidebar('cust_footer_1');
                  }
                ?>
              </div>
              <aside class="widget widget_nav_menu footer__nav_menu">
                <?php
                    wp_nav_menu(
                        array(
                            'menu'  => '28556',
                            'menu_class'=> 'nav__menu',
                        )
                    );
                ?>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </footer> <!-- end footer -->

    <div id="back-to-top">
      <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>
</main> <!-- end main-wrapper -->

<!-- jQuery Scripts -->

<?php wp_footer();?>
<script src="https://use.fontawesome.com/72aa657e98.js"></script>
<script src="//code.jivosite.com/widget/EFamSl5OnM" async></script>
</body>
</html>