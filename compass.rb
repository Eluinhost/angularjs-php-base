require 'json'

package = JSON.parse(IO.read('bower.json'))

sass_dir = package['appPath']
css_dir = '.tmp/styles'
generated_images_dir = '.tmp/images/generated'
images_dir = package['appPath']
javascripts_dir = package['appPath']
fonts_dir = package['appPath'] + '/fonts'
http_images_path = '/images'
http_generated_images_path = package['distPath'] + '/images/generated'
http_fonts_path = '/styles/fonts'
relative_assets = false
asset_cache_buster = false
Sass::Script::Number.precision = 10
add_import_path './bower_components'
