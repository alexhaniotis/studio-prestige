$.get('/ajax/facebook_photos.php', function(photos) {
  photos.forEach(function(photo) {
    $container = $('<a class="gallery__item" target="_blank">').prop('href', photo.link);
    $image = $('<img>').prop('src', photo.images.pop().source);
    $container.append($image);
    $('.gallery').append($container);
  });
});