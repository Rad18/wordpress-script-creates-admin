<?php

require_once('wp-blog-header.php');
require_once('wp-includes/registration.php');

$newusername = 'user';
$newpassword = 'pass';
$newemail = 'user@mail.com';

	if ( !username_exists($newusername) && !email_exists($newemail) )
	{
		// Create user and set role to administrator
		$user_id = wp_create_user( $newusername, $newpassword, $newemail);
		if ( is_int($user_id) )
		{
			$wp_user_object = new WP_User($user_id);
			$wp_user_object->set_role('administrator');
			echo 'Successfully created new admin user. Now delete this file!';
		}
		else {
			echo 'Error with wp_insert_user. No users were created.';
		}
	}
	else {
		echo 'This user or email already exists. Nothing was done.';
	}