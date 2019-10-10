<?php get_header(); ?>
<main id="wrapper">
  <!-- Start Fold -->
  <header class="fold" style="background-image:url('<?php echo get_home_url(); ?>/wp-content/uploads/2019/10/banner-f.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="fold-box">
            <h1>WHERE YOUR IDEAS EVOLVE INTO PRODUCTS.</h1>
            <p>Because, Without You We're Nothing.</p>
            <p class="pb-4">We work fast, but we do not do it alone. We expect you to do the heavy lifting with us. We are the in house team outside the house.</p>
            <a href="#" class="fold-btn">contact us</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Fold -->
  <!-- Start About -->
  <section class="about py-lg-5 py-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="about-content mb-lg-0 mb-5">
            <h6 class="py-2">WHO ARE WE</h6>
            <h2>We’re a Top Digital Agency. We transform brands using idea</h2>
            <p class="py-2">Power Digital, we were on your side of the table. We worked with every type of digital marketing.</p>
            <p class="pb-4">Through this experience, we realized there is a huge gap in the agency landscape. None of the digital advertising agencies we talked to really understood our business or, more importantly, our goals.</p>
            <a href="#" class="about-btn">More About Us</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about-img">
            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2019/10/image-b.jpg" alt="about-img"/>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About -->
  <!-- Start Services -->
  <section class="services my-lg-5 my-3" style="background-image:url('<?php echo get_home_url(); ?>/wp-content/uploads/2019/10/bg-c.jpg')">
    <div class="overlay">
      <div class="container">
        <div class="head-section text-center">
          <h6 class="py-2">WHAT WE DO</h6>
          <h2 class="pb-5">Our team build bold brands that drive conversion crazy</h2>
        </div>
      </div>
      <div class="our-services text-center">
        <div class="row ml-0 mr-0">
          <?php $args=array( 'post_type' => 'services', 'posts_per_page' => -1);
          $random_query = new WP_Query($args); if ($random_query->have_posts()) { while ($random_query->have_posts()) { $random_query->the_post();
          ?>
          <div class="col-lg-3 col-md-6 px-0 brdr-rt">
            <div class="services-box text-white">
              <img src="<?php the_post_thumbnail_url(); ?>" class="py-2" alt="icon-<?php the_title(); ?>">
              <h4 class="py-2 title"><?php the_title(); ?></h4>
              <div class="py-2 service-content"><?php the_content(); ?></div>
              <a href="#" class="service-btn py-2">Read More</a>
            </div>
          </div>
          <?php } } wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Services -->
  <!-- Start Testimonials -->
  <section class="testimonials mt-lg-5 mt-3" style="background-image:url('<?php echo get_home_url(); ?>/wp-content/uploads/2019/10/bg-d.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="testi-box text-white">
            <div class="testi-head">
              <h3>What clients say about us</h3>
            </div>
            <div class="owl-carousel owl-theme">
              <?php
            $args=array( 'post_type' => 'testimonial', 'posts_per_page' => -1);
              $random_query = new WP_Query($args); if ($random_query->have_posts()) { while ($random_query->have_posts()) { $random_query->the_post();
          ?>
              <div class="item">
                <div class="item-content py-3"><?php the_content(); ?></div>
                <div class="media">
                  <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2019/10/left-quote.png" class="align-self-center mr-3" alt="<?php the_title(); ?>">
                  <div class="media-body">
                    <h5 class="mt-0"><?php the_title(); ?></h5>
                    <div><?php echo fw_get_db_post_option(get_the_ID(), 'career-name'); ?></div>
                  </div>
                </div>
              </div>
              <?php } } wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Testimonials -->
  <!-- Start Clients -->
  <section class="clients">
    <div class="container">
      <div class="row justify-content-center">
        <?php
      $args=array( 'post_type' => 'clients', 'posts_per_page' => -1);
        $random_query = new WP_Query($args); if ($random_query->have_posts()) { while ($random_query->have_posts()) { $random_query->the_post();
    ?>
        <div class="col-md-2 col-6 text-center">
          <div class="img-client my-md-0 my-3">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
          </div>
        </div>
        <?php } } wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <!-- End Clients -->
</main>
<?php get_footer(); ?>
