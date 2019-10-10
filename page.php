<?php get_header(); ?>
<div class="wrapper" id="page-wrapper">
  <section class="page-header text-blue py-3 py-lg-5" style="background:url(<?php echo fw_get_db_settings_option('pages-header-background')[url] ?>) no-repeat center/100% 100%;">
    <div class="container">
      <div class="row no-gutters align-items-center">
        <div class="col-lg-6">
          <div class="page-title">
            <h3><?php the_title(); ?></h3>
            <div class="breadcrumb font-weight-bold px-0 m-0"><?php if(function_exists('yoast_breadcrumb')){yoast_breadcrumb();} ?></div>
          </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block text-left">
          <img class="img-fluid h-300px" src="<?php the_post_thumbnail_url(); ?>">
        </div>
      </div>
    </div>
  </section>
  <div class="page-content">
        <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>
