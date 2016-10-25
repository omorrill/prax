<?php
/**
 * @file
 * Default theme implementation for displaying a single search result.
 */
?>
<li class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <h3 class="title"<?php print $title_attributes; ?>>
    <a href="<?php print $url; ?>"><?php print $title; ?></a>
  </h3>
  <?php print render($title_suffix); ?>
  <?php if ($info): ?>
    <p class="search-info"><?php print $info; ?></p>
  <?php endif; ?>
  <?php if ($image): ?>
    <div class="search-result-image">
      <?php print $image; ?>
    </div>
  <?php endif; ?>
  <div class="search-snippet-info">
    <?php if ($snippet): ?>
      <p class="search-snippet"<?php print $content_attributes; ?>><?php print $snippet; ?></p>
    <?php endif; ?>
  </div>
</li>
