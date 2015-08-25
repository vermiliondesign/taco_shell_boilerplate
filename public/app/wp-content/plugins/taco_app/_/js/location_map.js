jQuery(function(){
  var $ = jQuery;

  // Make sure this is a location edit screen
  var $x = $('input#map_x_percent');
  var $y = $('input#map_y_percent');
  if($x.length === 0 || $y.length === 0) {
    return;
  }

  // map container
  var $map_container = $('<div id="map-container" style="position:relative;margin-bottom:50px;"></div>');
  $x.closest('table').before($map_container);
  $map_container.before('<h2>Click a point on the map to place the marker</h2>');

  // map
  var map_image_path = '/wp-content/themes/app/_/img/map-usa.png';
  var $img = $('<img style="width:929px;height:582px;position:absolute;top:0;left:0;cursor:crosshair;">');
  $img.attr('src', map_image_path);
  $map_container.append($img);
  $map_container.css({
    width: $img.width(),
    height: $img.height()
  });

  // marker
  var marker_image_path = '/wp-content/themes/app/_/img/sprites/map-marker.png';
  var $marker = $('<img style="position:absolute;top:0;left:0;">');
  $marker.attr('src', marker_image_path);
  $map_container.append($marker);

  // position marker to start
  if($x.val() && $y.val()) {
    $marker.css({
      left: $x.val()+'%',
      top: $y.val()+'%'
    });
  }


  $img.click(function(e) {
    var marker_x_offset = -11;
    var marker_y_offset = -32;
    var map_x = e.pageX - $(this).offset().left + marker_x_offset;
    var map_y = e.pageY - $(this).offset().top + marker_y_offset;
    var map_x_percent = (Math.round(1000 * 100 * (map_x / $img.width())) / 1000).toString();
    var map_y_percent = (Math.round(1000 * 100 * (map_y / $img.height())) / 1000).toString();
    $x.val(map_x_percent);
    $y.val(map_y_percent);
    $marker.css({
      left: $x.val()+'%',
      top: $y.val()+'%'
    });
  });
});
