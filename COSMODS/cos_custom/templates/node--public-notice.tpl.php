<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <div class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </div>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <div class="content">
    <!-- We're hiding the whole content HTML to individually print out fields for this content type. -->
    <?php
      // We hide the comments to render below.
      hide($content['comments']);
      hide($content['links']);
      /* print render($content); */
    ?>
    <h3><?php print render($content['field_select_ccb']); ?></h3>
    <p><?php print render($content['field_event_date']); ?></p>
    <p><?php print render($content['field_address_list']); ?></p>
    <?php print render($content['body']); ?>
    
    <p><a href="/sites/default/files/public-notices/<?php print $node->field_notice_pdf['und'][0]['filename'] ?>">Public Notice PDF direct link</a></p>
    <iframe frameborder="1" height="670" name="Notice PDF" scrolling="yes" src="/sites/default/files/public-notices/<?php print $node->field_notice_pdf['und'][0]['filename'] ?>" width="100%"></iframe>
    
  </div> <!-- /content -->

  <?php if (!empty($content['links']['terms'])): ?>
    <div class="terms">
      <?php print render($content['links']['terms']); ?>
    </div> <!-- /terms -->
  <?php endif;?>

  <?php if (!empty($content['links'])): ?>
    <div class="links">
      <?php print render($content['links']); ?>
      <a class="print_page" onclick="printPage()">Print this page</a>
    </div> <!-- /links -->

  <?php endif;?>


  <?php print render($content['comments']); ?>
</article> <!-- /article #node -->
