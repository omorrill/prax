<header>
  <section id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
    <div class="<?php print $container_class; ?>">
      <div class="navbar-header">
        <?php if ($logo): ?>
          <a id="moblogo" class="logo navbar-btn pull-left visible-xs hidden-sm hidden-md hidden-lg" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>

        <?php if (!empty($site_name)): ?>
          <a class="name navbar-brand visible-xs hidden-sm hidden-md hidden-lg" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        <?php endif; ?>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <?php endif; ?>
      </div>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse">
          <nav role="navigation navbar-inner">
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
            <?php endif; ?>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </section>
</header>

<div id="myCarousel" class="carousel slide">
  <div class="col-sm-6 col-sm-offset-3 search">
    <?php if (!empty($page['search'])): ?>
      <?php print render($page['search']); ?>
    <?php endif; ?>
  </div>

  <section class="carousel-inner">
    <div class="active item myCarouselImage"><img src="http://localhost:81/PikesPeakColorado/sites/all/themes/custom/ppc/images/1.jpg" alt="First slideshow item"/></div>
    <div class="item myCarouselImage"><img src="http://localhost:81/PikesPeakColorado/sites/all/themes/custom/ppc/images/2.jpg" alt="Second slideshow item"/></div>
    <div class="item myCarouselImage"><img src="http://localhost:81/PikesPeakColorado/sites/all/themes/custom/ppc/images/3.jpg" alt="Third slideshow item"/></div>
  </section><!-- carousel=inner section -->

  <a href="#myCarousel" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a href="#myCarousel" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- End myCarousel -->


<div class="main-container top-spacer <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>
  </header> <!-- /#page-header -->

  <div class="row">
    <div class="row">
      <article id="highlighted-articles-region" class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
        <section class="col-xs-12 col-sm-4 highlighted-article-1" role="complementary">
          <div class="highlighted-article-title">
            <h3><?php print $node_title_1; ?></h3>
          </div>
          <div class="highlighted-article-body hidden-sm-down">
            <?php print $node_body_1; ?>
          </div>
        </section>
        <section class="col-xs-12 col-sm-4 highlighted-article-2" role="complementary">
          <div class="highlighted-article-title">
            <h3><?php print $node_title_2; ?></h3>
          </div>
          <div class="highlighted-article-body hidden-sm-down">
            <?php print $node_body_2; ?>
          </div>
        </section>
        <section class="col-xs-12 col-sm-4 highlighted-article-3" role="complementary">
          <div class="highlighted-article-title">
            <h3><?php print $node_title_3; ?></h3>
          </div>
          <div class="highlighted-article-body hidden-sm-down">
            <?php print $node_body_3; ?>
          </div>
        </section>
      </article>
    </div>

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-2" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section class="col-sm-8 center <?php if (empty($page['sidebar_first'])): ?><?php echo 'col-sm-offset-2'; ?><?php endif; ?>">
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-2" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<?php if (!empty($page['footer'])): ?>
  <footer class="footer well-lg <?php print $container_class; ?>">
    <?php print render($page['footer']); ?>
  </footer>
<?php endif; ?>
