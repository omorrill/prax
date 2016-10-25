# This configuration file works with both the Compass command line tool and within Rails.
# Require any additional compass plugins here.
project_type = :stand_alone

### Change to production when going live.
environment = :development

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "images"
javascripts_dir = "js"

### Change to compressed when going live.
# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :expanded

sourcemap = false

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true

# Crossbrowser rgba support. (Requires rgbapng to be installed on developer system.)
require "rgbapng"

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = false

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass scss scss && rm -rf sass && mv scss sass
