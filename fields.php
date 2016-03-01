<?php
/**
 * Register meta box(es).
 */
function subho_register_meta_boxes() {
    add_meta_box( 
		'subho-meta-box-id', 
		__( 'Text Meta Box', 'textdomain' ),
		'subho_my_display_callback',
		'metabox',
		'normal',
		'core'
	);
}
add_action( 'add_meta_boxes', 'subho_register_meta_boxes' );

function subho_my_display_callback($post){
	wp_nonce_field(basename(__FILE__),'metabox_name');
	$subho_stored_meta = get_post_meta($post->ID);
	?>
	<div class="td-row">
		<div class="td-head">
		<label for="name"><?php _e('Name:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<input type="text" name="name" id="name" value="<?php

				if(!empty($subho_stored_meta['name'])){
					echo esc_attr($subho_stored_meta['name'][0]);
				}
				
				

		?>" />
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="hobby"><?php _e('Hobby:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<input type="text" name="hobby" id="hobby" value="<?php

				if(!empty($subho_stored_meta['hobby'])){
					echo esc_attr($subho_stored_meta['hobby'][0]);
				}
				
				

		?>" />
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="fav_food"><?php _e('Favourit Food:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<input type="text" name="fav_food" id="fav_food" value="<?php

				if(!empty($subho_stored_meta['fav_food'])){
					echo esc_attr($subho_stored_meta['fav_food'][0]);
				}
				
				

		?>" />
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="startdate"><?php _e('Start Date:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<input type="text" name="startdate" id="startdate" value="<?php

				if(!empty($subho_stored_meta['startdate'])){
					echo esc_attr($subho_stored_meta['startdate'][0]);
				}
				
				

		?>" />
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="enddate"><?php _e('End Date:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<input type="text" name="enddate" id="enddate" value="<?php

				if(!empty($subho_stored_meta['enddate'])){
					echo esc_attr($subho_stored_meta['enddate'][0]);
				}
				
				

		?>" />
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="yourmessage"><?php _e('your message:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<?php
				$content = get_post_meta( $post->ID, '_yourmessage', true );
				$editor = '_yourmessage';
				$settings = array(
					'textarea_rows' => 10,
					'media_buttons' => true,
				);
			wp_editor( $content, $editor, $settings);
			?>
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="yourpost"><?php _e('your post:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<textarea name="yourpost" id="yourpost" cols="30" rows="10">
		<?php

				if(!empty($subho_stored_meta['yourpost'])){
					echo esc_attr($subho_stored_meta['yourpost'][0]);
				}
				
				

		?>
		</textarea>
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="etc"><?php _e('ETC:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<textarea name="etc" id="etc" cols="30" rows="10">
		<?php

				if(!empty($subho_stored_meta['etc'])){
					echo esc_attr($subho_stored_meta['etc'][0]);
				}
				
				

		?>
		</textarea>
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="color"><?php _e('Color:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<select name="color" id="color">
		  <option value="yes" <?php if ( ! empty ( $subho_stored_meta['color'] ) ) selected( $subho_stored_meta['color'][0], 'yes' ); ?>><?php _e('Yes','textdomain'); ?></option>
		  <option value="no" <?php if ( ! empty ( $subho_stored_meta['color'] ) ) selected( $subho_stored_meta['color'][0], 'no' ); ?>><?php _e('No','textdomain'); ?></option>
		  
		</select>
		</div>
	</div>
	<div class="td-row">
		<div class="td-head">
		<label for="colorpicker"><?php _e('Color Picker:','textdomain'); ?></label>
		</div>
		<div class="meta-td">
		<input type="text" id="colorpicker" name="colorpicker"  value="<?php

				if(!empty($subho_stored_meta['colorpicker'])){
					echo esc_attr($subho_stored_meta['colorpicker'][0]);
				}
				
				

		?>"/>
		</div>
	</div>
	
	<?php
}
function metabox_action( $post_id ){
$is_valid_nonce = ( isset( $_POST[ 'metabox_name' ] ) && wp_verify_nonce( $_POST[ 'metabox_name' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
$autosave =  wp_is_post_autosave( $post_id );
$post_rivision = wp_is_post_revision( $post_id );
	if(!$is_valid_nonce || $autosave || $post_rivision){
	return;
	}
	if(isset($_POST['name'])){
	update_post_meta($post_id, 'name', sanitize_text_field($_POST['name']));

	}
	if(isset($_POST['hobby'])){
	update_post_meta($post_id, 'hobby', sanitize_text_field($_POST['hobby']));

	}
	if(isset($_POST['fav_food'])){
	update_post_meta($post_id, 'fav_food', sanitize_text_field($_POST['fav_food']));

	}
	if(isset($_POST['startdate'])){
	update_post_meta($post_id, 'startdate', sanitize_text_field($_POST['startdate']));

	}
	if(isset($_POST['enddate'])){
	update_post_meta($post_id, 'enddate', sanitize_text_field($_POST['enddate']));

	}
	if(isset($_POST['_yourmessage'])){
	update_post_meta($post_id, '_yourmessage', sanitize_text_field($_POST['_yourmessage']));

	}
	if(isset($_POST['yourpost'])){
	update_post_meta($post_id, 'yourpost', sanitize_text_field($_POST['yourpost']));

	}if(isset($_POST['color'])){
	update_post_meta($post_id, 'color', sanitize_text_field($_POST['color']));

	}
	if(isset($_POST['etc'])){
	update_post_meta($post_id, 'etc', sanitize_text_field($_POST['etc']));

	}
	
	if(isset($_POST['colorpicker'])){
	update_post_meta($post_id, 'colorpicker', sanitize_text_field($_POST['colorpicker']));

	}
	
	
	
}
add_action('save_post','metabox_action');
