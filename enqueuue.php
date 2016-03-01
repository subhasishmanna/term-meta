<?php

function subho_enque_script(){
	global $typenow, $pagenow;
	ECHO $pagenow.'TITO'.$typenow;
	If(($pagenow == 'post-new.php' || $pagenow == 'post.php') && $typenow =='metabox'){
	
	
	wp_enqueue_style( 'metaCSS', plugin_dir_url( __FILE__ ) . '/CSS/meta.css', array(), '01032016', 'all' );
	
	wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script ( 'meta-js', plugin_dir_url( __FILE__ ) . '/js/meta.js', array('jquery','jquery-ui-datepicker','quicktags','wp-color-picker'), '01032016', true );
	
	
	
	}
}
add_action( 'admin_enqueue_scripts', 'subho_enque_script');