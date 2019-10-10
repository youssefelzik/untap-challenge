<?php get_header(); ?>

<main id="account-wrapper">
  <div class="account-head text-center">
    <h1><?php the_title(); ?></h1>
  </div>
  <div class="container">
    <?php if(have_posts()){
        while(have_posts()){

          the_post();

          the_content();
        }
    } ?>
  </div>
</main>





<?php get_footer(); ?>
