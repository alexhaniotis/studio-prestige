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
activate :i18n, :mount_at_root => false
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
  activate :imageoptim
end

# Methods defined in the helpers block are available in templates
helpers do
  # Returns the current section (dance or groups)
  def section
    @page_id.split("/")[1]
  end

  def tlink(href)
    "/#{I18n.locale}/#{href}".gsub('index', '')
  end

  # Returns the current page's absolute path for the specified locale
  def translated_url(locale)
    "/" + @page_id
            .gsub('.html', '')
            .gsub(I18n.locale.to_s, other_lang)
            .gsub('index', '')
  end

  # Return the other language, assuming there is only en and fr
  def other_lang
    if I18n.locale == :en then
      "fr"
    else
      "en"
    end
  end
end

page '/en/index.html', :layout => false
page '/fr/index.html', :layout => false