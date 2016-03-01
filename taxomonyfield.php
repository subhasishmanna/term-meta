<?php 


function supported_social_network(){
	return array(
	'facebook'=>__('Facebook','textdomain'),
	'gplus'=>__('Google Plus','textdomain'),
	'twitter'=>__('Twitter','textdomain'),
	
	);
}

function place_social_metadata(){
	wp_nonce_field(basename(__FILE__), 'placenoncename');
	$social_network = supported_social_network();
	?>
		<div class="form-field">
			<label for="social_network"><h3>Social Network</h3></label>
		</div>
	
	
	<?php
	foreach($social_network as $network=>$value){
		?>
		<div class="row">
		<label for="<?php echo $network; ?>"><?php echo $value; ?></label>
		<input type="text"  name="<?php echo $network; ?>" id="<?php echo $network; ?>" value="<?php ?>"/>
		</div>
		<?php
	}
}
add_action('place_add_form_fields','place_social_metadata');
add_action('place_edit_form_fields','place_edit_metadata');
add_action('create_place','save_social_meta');
function save_social_meta($term_id){
	/**
	 * Check if nonce is set
	 */
	if ( ! isset( $_POST[ 'placenoncename' ] ) ) {
		return;
	}
	/**
	 * Verify Nonce
	 */
	if ( ! wp_verify_nonce( $_POST['placenoncename'], basename( __FILE__ ) ) ) {
		return;
	}
	
	$social_network = supported_social_network();
	
	foreach($social_network as $network=>$value){
		$term_key = '_place_metadata_'.$network;
		if ( $term_key) {
		update_term_meta( $term_id,$term_key, $_POST[ $network] );
		}
	}
	
}
function place_edit_metadata($term){
	wp_nonce_field(basename(__FILE__), 'placenoncename');
	$social_network = supported_social_network();
	?>
		<div class="form-field">
			<label for="social_network"><h3>Social Network</h3></label>
		</div>
	
	
	<?php
	foreach($social_network as $network=>$value){
		$term_key = '_place_metadata_'.$network;
		$metadata = get_term_meta($term->term_id,$term_key,true );
		?>
		<div class="row">
		<label for="<?php echo $network; ?>"><?php echo $value; ?></label>
		<input type="text"  name="<?php echo $network; ?>" id="<?php echo $network; ?>" value="<?php 
		if(!empty($metadata)){ echo $metadata;}
		
		?>"/>
		</div>
		<?php
	}
		
}










