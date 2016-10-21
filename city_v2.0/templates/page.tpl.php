<!-- Modal -->
<div class="modal fade" id="customer-service-modal" tabindex="-1" role="dialog" aria-labelledby="customerServiceModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Customer Service</h4>
      </div>
      <div class="modal-body">
        <p>Insert the stuff here and things.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="departments-modal" tabindex="-1" role="dialog" aria-labelledby="departmentsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">City Departments</h4>
      </div>
      <div class="modal-body">
				<?php print render($page['departments']); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="bodywrapper" class="container-fluid">
	<header class="row">
		<div id="navbar" class="col-xs-12">

		<!-- TOGGLE SEARCH AND MENU -->
		<div id="mobile-toggles" class="row col-xs-12">
			<?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
				<button type="button" id="main-menu-toggle" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#main-menu" value="Main Menu">
					<span class="sr-only"><?php print t('Toggle navigation'); ?></span>
					<span class="glyphicon glyphicon-menu-hamburger"></span>
				</button>
			<?php endif; ?>
			<?php if (!empty($page['search'])): ?>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"><?php print t('Toggle search'); ?></span>
					<span class="glyphicon glyphicon-search"></span>
				</button>
			<?php endif; ?>
			<?php if (!empty($page['topbar'])): ?>
				<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#topbar">
					<span class="sr-only"><?php print t('Toggle toplinks'); ?></span>
					<span class="glyphicon glyphicon-plus"></span>
				</button>
			<?php endif; ?>
		</div>
		<!-- END TOGGLE SEARCH AND MENU -->
      <?php if ($logo): ?>
        <div id="logo" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-2 col-md-offset-0 col-lg-2">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        </div>
      <?php endif; ?>

			<?php if (!empty($page['topbar'])) : ?>
				<div id="topbar" class="navbar-collapse collapse col-xs-12 col-md-5">
						<?php print render($page['topbar']); ?>
				</div>
			<?php endif; ?>
			<?php if (!empty($page['search'])) : ?>
				<div id="search" class="navbar-collapse collapse col-xs-12 col-md-5">
						<?php print render($page['search']); ?>
	      </div>
			<?php endif; ?>
				<?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
					<div id="main-menu" class="navbar-collapse collapse">
						<nav role="navigation">
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
		</header>
		<?php if (!empty($page['hero'])) : ?>
			<div id="hero" class="col-xs-12">
				<?php print render($page['hero']); ?>
			</div>
		<?php endif; ?>
		<div id="bodyContent" class="row">
			<?php if (!empty($page['featured'])) : ?>
				<div id="featured" class="col-xs-12 col-sm-7 col-md-8">
					<?php print render($page['featured']); ?>
	      </div>
			<?php endif; ?>
			<?php if (!empty($page['featured_sidebar'])) : ?>
				<div id="featured-sidebar" class="col-xs-12 col-sm-5 col-md-4">
					<?php print render($page['featured_sidebar']); ?>
	      </div>
			<?php endif; ?>
			<?php if (!empty($page['carousel'])) : ?>
				<section id="carousel" class="col-xs-12 col-sm-6 col-md-7">
					<?php print render($page['carousel']); ?>
	      </section>
			<?php endif; ?>
			<?php if (!empty($page['carousel_sidebar'])) : ?>
				<aside id="carousel-sidebar" class="col-xs-12 col-sm-6 col-md-5">
					<?php print render($page['carousel_sidebar']); ?>
	      </aside>
			<?php endif; ?>
			<?php if (!empty($page['carousel_pager'])) : ?>
				<aside id="carousel-pager" class="col-xs-12">
					<?php print render($page['carousel_pager']); ?>
	      </aside>
			<?php endif; ?>
			<?php if (!empty($page['calendar'])) : ?>
				<section id="calendar" class="col-xs-12 col-sm-6 col-md-4">
					<?php print render($page['calendar']); ?>
	      </section>
			<?php endif; ?>
			<?php if (!empty($page['calendar_sidebar'])) : ?>
				<aside id="calendar-sidebar" class="col-xs-12 col-sm-6 col-md-4">
					<?php print render($page['calendar_sidebar']); ?>
	      </aside>
			<?php endif; ?>
			<?php if (!empty($page['press_releases'])) : ?>
				<div id="press-eleases" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-0">
					<?php print render($page['press_releases']); ?>
	      </div>
			<?php endif; ?>
	        <hr>
					  <article id="content" class="clearfix col-xs-12">
							<?php if (!empty($page['jumbotron'])): ?>
				        <div class="jumbotron"><?php print render($page['jumbotron']); ?></div>
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
	    			</article>
					<hr>
			<?php if (!empty($page['left_column'])) : ?>
				<aside id="lft-clmn" class="col-xs-12 col-sm-6">
					<?php print render($page['left_column']); ?>
	      </aside>
			<?php endif; ?>
			<?php if (!empty($page['right_column'])) : ?>
				<aside id="rght-clmn" class="col-xs-12 col-sm-6">
					<?php print render($page['right_column']); ?>
	      </aside>
			<?php endif; ?>
			<?php if (!empty($page['first_column'])) : ?>
				<aside id="collab-1" class="col-xs-12 col-sm-4">
					<?php print render($page['first_column']); ?>
	      </aside>
			<?php endif; ?>
			<?php if (!empty($page['middle_column'])) : ?>
				<aside id="collab-2" class="col-xs-12 col-sm-4">
					<?php print render($page['middle_column']); ?>
	      </aside>
			<?php endif; ?>
			<?php if (!empty($page['last_column'])) : ?>
				<aside id="collab-3" class="col-xs-12 col-sm-4">
					<?php print render($page['last_column']); ?>
	      </aside>
			<?php endif; ?>
		</div> <!-- bodyContent -->
		<footer id="footer" class="row">
			<hr>
			<?php if (!empty($page['footer_first_column'])) : ?>
			<div id="footer-first-column" class="col-xs-12 col-sm-4 col-md-3">
				<?php print render($page['footer_first_column']); ?>
      </div>
			<?php endif; ?>
			<?php if (!empty($page['footer_second_column'])) : ?>
				<div id="footer-second-column" class="col-xs-12 col-sm-4 col-md-3">
					<?php print render($page['footer_second_column']); ?>
	      </div>
			<?php endif; ?>
			<?php if (!empty($page['footer_third_column'])) : ?>
				<div id="footer-third-column" class="col-xs-12 col-sm-4 col-md-3">
					<?php print render($page['footer_third_column']); ?>
	      </div>
			<?php endif; ?>
			<?php if (!empty($page['footer_fourth_column'])) : ?>
				<div id="footer-fourth-column" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0">
					<?php print render($page['footer_fourth_column']); ?>
	      </div>
			<?php endif; ?>
				<hr>
				<?php if (!empty($page['footer'])) : ?>
				<div id="final-footer" class="col-xs-12">
					<?php print render($page['footer']); ?>
				</div>
			<?php endif; ?>
		</footer>
	</div><!-- END OF BODYWRAPPER -->
