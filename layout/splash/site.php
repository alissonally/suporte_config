<?php
$title = get_bloginfo( 'name' );
$title .= '<title>' . $title . '</title>';
echo apply_filters( 'wm_title', $title );