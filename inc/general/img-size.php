<?php

/*************** IMAGE SIZES ***************/
if ( function_exists( 'add_image_size' ) ) {
  add_image_size('banner-image', 1200, 600, true);
  add_image_size('icon', 50, 50, false);
  add_image_size('user-photo', 100, 100, true);
  add_image_size('opinion-user', 80, 80, true);
  add_image_size('standard', 600, 600, true);
  add_image_size('guide-thumb', 600, 600, true);
}

?>