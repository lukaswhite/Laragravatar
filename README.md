##Laragravatar

Really simple Gravatar extension for Laravel.

In your Blade templates:

	@gravatar(Auth::user())

Simple.

##Installation

In the `require` section of your `composer.json`:

	"lukaswhite/laragravatar" : "dev-master"

Add the following to the `providers` section of your `app/config/app.php` file:

	'Lukaswhite\Laragravatar\LaragravatarServiceProvider',

And to the `aliases` section of that same file:

	'Laragravatar'		=>	'Lukaswhite\Laragravatar\Facades\Laragravatar',

Finally, publish the config file:

	php artisan config:publish lukaswhite/laragravatar

##Configuration

Once you've published the configuration file, you'll find it in `app/config/packages/lukaswhite/laragravatar/config.php`.

Most of it's pretty self-explanatory; you can set the defalt size (e.g. 128 for 128x128px square Gravatars by default), the maxiumum rating (e.g. "g"), whether to use HTTPS etc.

Should your User class store email addresses in a property *not* named `email` (mail, maybe?) then you can set it appropriately.

##Usage

In a Blade template:

	@gravatar($user)

To override the default size:

	@gravatar($user, 256)

You can also pass an email address, instead of an instance of User:

	@gravatar('joe.bloggs@example.com')

	@gravatar('joe.bloggs@example.com', 256)

If you're not using Blade, you can do this:

	<?php print Laragravatar::image($user) ?>

That's pretty much it.


