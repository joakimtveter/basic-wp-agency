<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Admin footer modification
function frontwp_change_admin_footer () {
    echo '<span id="footer-thankyou">Nettsiden er levert av <a href="http://frontsoftware.no" target="_blank">Front Software AS</a> | For support ring +47 51 52 52 00 eller send en e-post til <a href="mailto:wp@frontsoftware.no">wp@frontsoftware.no</a></span>'; 
}

add_filter('admin_footer_text', 'frontwp_change_admin_footer');