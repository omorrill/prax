output_style = (environment == :development) ? :expanded : :compressed
sass_dir = 'scss'
css_dir = 'css'
image_dir = 'images'
fonts_dir = 'fonts'
preferred_syntax = :scss
relative_assets = true
extensions_dir = 'sass-extensions'
add_import_path 'overrides'

require "rgbapng"
