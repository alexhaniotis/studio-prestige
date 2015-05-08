# Automatic image dimensions on image_tag helper
# activate :automatic_image_sizes

activate :autoprefixer

# Add Bower path to Sprockets
after_configuration do
	@bower_config = JSON.parse(IO.read("#{root}/.bowerrc"))
	sprockets.append_path File.join "#{root}", @bower_config["directory"]
end

# Reload the browser automatically whenever files change
activate :livereload

activate :directory_indexes

set :css_dir, 'styles'
set :js_dir, 'scripts'
set :images_dir, 'images'
set :partials_dir, 'partials'

# Build-specific configuration
configure :build do
	activate :minify_css
	activate :minify_javascript
	activate :asset_hash
end

page '/index.html', :layout => false