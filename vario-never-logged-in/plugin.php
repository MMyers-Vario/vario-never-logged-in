<?php
/*
Plugin Name: Vario Never Logged In
Plugin URI: https://virtualbyvario.com
Description: Sets a User Role (Never Logged In) for new users, which is removed once the user logs in.
Version: 1.05
Author: Virtual by Vario
Author URI: https://virtualbyvario.com
*/


// Create a new user role
function vario_nli_new_role() {  
 
    //add the new user role
    add_role(
        'never_logged_in',
        'Never Logged In',
        array()
    );
 
}
add_action('admin_init', 'vario_nli_new_role');
 

add_action( 'user_register', function( $user_id ) {
  $user = get_user_by( 'ID', $user_id );
    $user->add_role( 'never_logged_in' );
});

function vario_remove_nli( $user_login, $user ) {
        //remove the Never Logged In user role if they have it
		$user->remove_role( 'never_logged_in' );
}
add_action('wp_login', 'vario_remove_nli', 10, 2);

?>
