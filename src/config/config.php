<?php
return array(
	
	// What do use if the user has no Gravatar. Possible values indlude 404, identicon, monsterid, wavatar
	'default_image' => 'identicon',

	// The default size to display, in pixels, e.g. 64 means 64px x 64px square
	'default_size' => 64,

	// whether to use HTTPS
	'use_secure_url' 	=> 	TRUE,

	// The string representing the current maximum allowed rating ('g', 'pg', 'r', 'x').
	'max_rating'	=>	'g',

	// The name of the field in the User class which holds the email address.  It's probably "email", but just to be sure...
	'email_field' => 'email',

);