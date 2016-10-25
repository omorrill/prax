<div id="page-wrapper">
  <div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <div id="main-menu-mobile-wrapper">
      <h1><?php print t('Navigation'); ?></h1>
    </div>

    <div id="upper-page">
      <div id="page_overlay"></div>

      <?php if ($page['alert_top']): ?>
        <div id="alert-top" class="alert">
          <div id="alert-top-inner" class="clearfix">
            <?php print render($page['alert_top']); ?>
          </div> <!-- /alert-top-inner -->
        </div> <!-- /alert-top -->
      <?php endif; ?>

      <?php if ($page['header_top']): ?>
        <div id="header-top" class="alert">
          <div id="header-top-inner" class="clearfix">
            <?php print render($page['header_top']); ?>
          </div> <!-- /header-top-inner -->
        </div> <!-- /header-top -->
      <?php endif; ?>

      <!-- ______________________ HEADER _______________________ -->

      <header id="header">
        <div id="header-inner" class="clearfix">
          <?php if ($logo): ?>
            <div id="header-left-region">
              <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                  <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                </a>
              <?php endif; ?>
            </div> <!-- /header-left-region -->
          <?php endif; ?>

          <?php if ($secondary_menu || $page['header_right']): ?>
            <div id="header-right-region">
              <div id="search-icon" class="icon-search"></div>
              <?php print theme('links', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary', 'class' => array('links', 'clearfix', 'sub-menu')))); ?>
              <?php print render($page['header_right']); ?>
            </div> <!-- /header-right-region -->
          <?php endif; ?>
        </div> <!-- /header-inner -->
      </header> <!-- /header -->

      <?php if ($main_menu || $page['header_bottom']): ?>
        <div id="header-bottom" class="clearfix">
          <div id="header-bottom-inner">
             <a href="#skip-main-menu" id="skip-main-menu" title="content" class="element-invisible element-focusable">Main Menu</a>
            <?php print render($page['header_bottom']); ?>
          </div> <!-- /header-top-bottom -->
        </div> <!-- /header-bottom -->
      <?php endif; ?>
      <div class="menu-hamburger icon-three-menu"></div>

      <!-- ______________________ MAIN _______________________ -->

      <div id="main" class="clearfix">

        <?php if ($page['highlighted_full']): ?>
          <div id="highlighted-full" class="clearfix clearboth">
            <div id="highlighted-full-inner">
              <?php print render($page['highlighted_full']) ?>
            </div>
          </div>
        <?php endif; ?>

        <div id="main-inner" class="clearfix">

          <?php if ($page['header_under']): ?>
            <div id="header-under" class="clearfix clearboth">
              <?php print render($page['header_under']) ?>
            </div> <!-- /header-under -->
          <?php endif; ?>

          <?php if (!empty($page['highlighted'])): ?>
            <div id="highlighted" class="clearfix clearboth">
              <div id="highlighted-inner">
                <?php print render($page['highlighted']); ?>
              </div>
            </div>
          <?php endif; ?>

          <div id="main-inner-wrapper" class="clearfix">
            <div id="main-inner-inner-wrapper">

              <section id="content" class="column">
                <div id="content-inner">

                  <?php if (!empty($page['content_top'])): ?>
                    <div class="region-content-top">
                      <?php print render($page['content_top']); ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($breadcrumb || $title || $messages || $tabs || $action_links): ?>
                    <div id="content-header">

                      <?php print $breadcrumb; ?>

                      <?php print render($title_prefix); ?>

                      <?php if ($title): ?>
                        <h1 class="title <?php print isset($title_class) ? $title_class : ''; ?>"><?php print $title; ?></h1>
                      <?php endif; ?>

                      <?php print render($title_suffix); ?>
                      <?php print $messages; ?>
                      <?php print render($page['help']); ?>

                      <?php if ($tabs): ?>
                        <div class="tabs"><?php print render($tabs); ?></div>
                      <?php endif; ?>

                      <?php if ($action_links): ?>
                        <ul class="action-links"><?php print render($action_links); ?></ul>
                      <?php endif; ?>

                    </div> <!-- /#content-header -->
                  <?php endif; ?>

                  <div id="content-area" class="clearfix">
                    <div id="content-area-inner">
                      <div class="region-content">
                        <a href="#skip-content" id="skip-content" title="content" class="element-invisible element-focusable">Content</a>
                        <?php print render($page['content']); ?>
                      </div>

                      <?php if ($page['content_bottom']): ?>
                        <div class="region-content-bottom">
                          <?php print render($page['content_bottom']); ?>
                        </div>
                      <?php endif; ?>

                    </div> <!-- /content-area-inner -->
                  </div> <!-- /content-area -->

                  <?php print $feed_icons; ?>

                </div> <!-- /content-inner -->
              </section> <!-- /content -->

              <?php if ($page['sidebar_first']): ?>
                <aside id="sidebar-first" class="column sidebar first">
                  <div id="sidebar-first-inner">
                    <?php print render($page['sidebar_first']); ?>
                  </div>
                </aside> <!-- /sidebar-first -->
              <?php endif; ?>
            </div> <!-- /main-inner-inner-wrapper -->
          </div> <!-- /main-inner-wrapper -->
        </div> <!-- /main-inner -->
      </div> <!-- /main -->
    </div> <!-- /upper-page -->

    <?php if ($page['footer_right'] || $page['footer_left'] || $page['footer_bottom']): ?>
    <!-- ______________________ FOOTER _______________________ -->

      <footer id="footer-wrapper">

        <?php if ($page['footer_right'] || $page['footer_left']): ?>
          <div id="footer" class="clearfix">
            <div id="footer-inner" class="clearfix">
              <div id="footer-left">
                <?php print render($page['footer_left']); ?>
              </div> <!-- /footer-left -->
              <div id="footer-right">
                <?php print render($page['footer_right']); ?>
              </div> <!-- /footer-right -->
            </div> <!-- /footer-inner -->
          </div> <!-- /footer- -->
        <?php endif; ?>

        <?php if ($page['footer_bottom']): ?>
          <div id="footer-bottom" class="clearfix">
            <div id="footer-bottom-inner">
            <?php print render($page['footer_bottom']); ?>
            </div> <!-- /footer-bottom-inner -->
          </div> <!-- /footer-bottom -->
        <?php endif; ?>

      </footer> <!-- /footer -->
    <?php endif; ?>

    <?php if ($page['alert_bottom']): ?>
      <div id="alert-bottom" class="alert">
        <div id="alert-bottom-inner" class="clearfix">
          <?php print render($page['alert_bottom']); ?>
        </div> <!-- /alert-bottom-inner -->
      </div> <!-- /alert-bottom -->
    <?php endif; ?>

  </div> <!-- /page -->
</div>
