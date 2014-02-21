<?php namespace Lukaswhite\Laragravatar;

use Config,
		HTML,
		User;

class Laragravatar extends \emberlabs\gravatarlib\Gravatar {

	/**
	 * Get a Gravatar URL for the specified user.
	 *
	 * @param User|string $user The user in question - either an instance of User or an email address
	 * @param int $size The size in pixels, or null to use the configured deafult
	 * @return string
	 */
	public function url($user, $size = null) 
	{				
		// Setup Gravatar according to the config
		$this->setDefaultImage(Config::get('laragravatar::default_image'));
		
		$this->setMaxRating(Config::get('laragravatar::max_rating', 'g'));
    
    if (Config::get('laragravatar::use_secure_url', FALSE)) {
    	$this->enableSecureImages();	
    }

    // Set the size, from the parameters if provided, or else the config.
    if ($size) {
			$this->setAvatarSize($size);	
		} else {
			$this->setAvatarSize(Config::get('laragravatar::default_size'));
		}

		// Return the Gravatar URL; check first whether $user is a User object or the email address
    if ((is_object($user)) && ($user instanceof User)) {
			
			// Find out how to get the email, by determining the name of the field in the User class which holds it
			$email_field = Config::get('laragravatar::email_field', 'email');

			return $this->buildGravatarURL($user->$email_field);

		} else {

			return $this->buildGravatarURL($user);
			
		}

	}

	/**
	 * Get a Gravatar image for the specified user.
	 *
	 * @param User|string $user The user in question - either an instance of User or an email address
	 * @param int $size The size in pixels, or null to use the configured deafult
	 * @return string
	 */
	public function image($user, $size = null) 
	{		
		return HTML::image($this->url($user, $size));		
	}

}