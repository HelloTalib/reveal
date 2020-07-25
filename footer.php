<?php
    $footer_text_main  = redux_value( 'footer_text_main' );
    $footer_text_sub   = redux_value( 'footer_text_sub' );
    $bdwebninja_footer = <<<FOOTER
      <footer id="footer">
        <div class="container">
          <div class="copyright">
            $footer_text_main
          </div>
          <div class="credits">
            $footer_text_sub
          </div>
        </div>
      </footer>
      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  FOOTER;
    echo $bdwebninja_footer;
    wp_footer();
?>
  </body>
  </html>