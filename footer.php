<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>
<!-- Start Footer -->
<footer>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="footer-logo pb-3">
            <?php the_custom_logo(); ?>
        </div>
        <div class="copy-right">© 2019. All rights reserved. Designed & Developed by <a href="https://untapcompete.com" class="copy-color">untapcompete</a></div>
      </div>
      <div class="col-md-4 text-center my-md-0 my-5">
        <div class="social">
          <h4 class="social-head pb-3">Lets get Connected</h4>
          <ul class="social-list">
            <li><a href="#" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="footer-menu text-center">
          <h4 class="footer-head pb-3">Company</h4>
          <?php wp_nav_menu(
            array(
              'menu' => 'footer1',
              'menu_class'      => 'nav',
              'fallback_cb'     => '',
              'menu_id'         => 'footer-menu',
              'depth'           => 2,
              'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
            )
          ); ?>
        </div>
      </div>
    </div>
  </div>
</footer>
<script>
  jQuery(function($) {

    $('#navbarNavDropdown').append('<?php if (is_user_logged_in()) { ?><div class="mob_form text-center"><a class="mob_login_button" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></div><?php } else { ?><div class="mob_form text-center"><a class="mob_login_button" href="<?php echo site_url().'/login'; ?>">Login</a><a class="mob_login_button" href="<?php echo site_url().'/sign-up'; ?>">sign up</a></div><?php } ?>');

  });
</script>
<!-- End Footer -->
<?php wp_footer(); ?>

</body>
</html>
