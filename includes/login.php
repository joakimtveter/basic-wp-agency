<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//Change the Login logo URL
function frontwp_login_headerurl( $url ) {
    $url = "https://frontsoftware.no";
    return $url;
}
add_filter( 'login_headerurl', 'frontwp_login_headerurl' );


// Add the custom login logo
function frontwp_custom_login_logo() {
    $logo_url=get_option('frontwp_logo_url');
    $frontwp_logo_height=get_option('frontwp_logo_height');
    $frontwp_logo_width=get_option('frontwp_logo_width');
	if(empty($frontwp_logo_height))
	{
		$frontwp_logo_height='150px';
	}
	else
	{
		$frontwp_logo_height.='px';
	}
    
    if(empty($frontwp_logo_width))
	{
		$frontwp_logo_width='100%';
	}	
	else
	{
		$frontwp_logo_width.='px';
	}
	if(!empty($logo_url))
	{
		echo '<style type="text/css">'.
             'h1 a { 
				background-image:url('.$logo_url.') !important;
				height:'.$frontwp_logo_height.' !important;
				width:'.$frontwp_logo_width.' !important;
				background-size:100% !important;
				line-height:inherit !important;
				}'.
         '</style>';
    }
    else
    {
        // Fallback logo if logo is not set
        // TODO: fix URL SO IT WORKS ON SUB SITES
        echo '<style type="text/css">'.
        'h1 a { 
            background-image:url("/wp-content/plugins/frontwp-plugin/assets/images/frontsoftware-logo.png") !important;
            height: 100px !important;
            width: 207px !important;
            background-size:100% !important;
            line-height:inherit !important;
            }'.
     '</style>';  
    }
}
add_action( 'login_head', 'frontwp_custom_login_logo' );