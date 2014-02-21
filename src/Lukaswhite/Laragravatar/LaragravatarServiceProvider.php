<?php namespace Lukaswhite\Laragravatar;

use Illuminate\Support\ServiceProvider;

class LaragravatarServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
   * Bootstrap the application events.
   *
   * @return void
   */
	public function boot()
	{
		$this->package('lukaswhite/laragravatar');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app['laragravatar'] = $this->app->share(function($app) {
			return new Laragravatar;
		});

		$blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();

		// @gravatar('joe@bloggs.com')
		$blade->extend(function($value, $compiler)
		{
		    $matcher = $compiler->createMatcher('gravatar');

		    return preg_replace($matcher, '$1<?php echo Laragravatar::image$2 ?> ', $value);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}