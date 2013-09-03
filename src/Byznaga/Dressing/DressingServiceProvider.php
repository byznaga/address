<?php namespace Byznaga\Dressing;

use Illuminate\Support\ServiceProvider;

class DressingServiceProvider extends ServiceProvider {

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
		$this->package('byznaga/dressing');

		include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['dressing'] = $this->app->share(function($app)
		{
			return new Dressing;
		});

		$this->app->booting(function()
		{
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		  $loader->alias('Dressing', 'Byznaga\Dressing\Facades\Dressing');
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