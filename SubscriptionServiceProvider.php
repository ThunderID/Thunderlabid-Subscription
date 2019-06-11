<?php

namespace Thunderlabid\Subscription;

/*===============================
=            Laravel            =
===============================*/
use Illuminate\Support\ServiceProvider;
use Exception;
use Event;
use Validator;

/*=====  End of Laravel  ======*/

/*----------  USE_MODEL  ----------*/
use Thunderlabid\Subscription\DAL\Model\Plan;
use Thunderlabid\Subscription\DAL\Model\Price;
use Thunderlabid\Subscription\DAL\Model\Feature;
use Thunderlabid\Subscription\DAL\Model\Subscription;

/*----------  EVENTS  ----------*/
use Thunderlabid\Subscription\BLL\Plan\Event\Querying, Thunderlabid\Subscription\BLL\Plan\Event\Queried;
use Thunderlabid\Subscription\BLL\Plan\Event\CreatingOrUpdating, Thunderlabid\Subscription\BLL\Plan\Event\CreatedOrUpdated;
use Thunderlabid\Subscription\BLL\Plan\Event\Deleting, Thunderlabid\Subscription\BLL\Plan\Event\Deleted;

use Thunderlabid\Subscription\BLL\Plan\Event\SavingPrice, Thunderlabid\Subscription\BLL\Plan\Event\SavedPrice;
use Thunderlabid\Subscription\BLL\Plan\Event\DeletingPrice, Thunderlabid\Subscription\BLL\Plan\Event\DeletedPrice;

use Thunderlabid\Subscription\BLL\Plan\Event\SavingFeature, Thunderlabid\Subscription\BLL\Plan\Event\SavedFeature;
use Thunderlabid\Subscription\BLL\Plan\Event\DeletingFeature, Thunderlabid\Subscription\BLL\Plan\Event\DeletedFeature;

use Thunderlabid\Subscription\BLL\Subscription\Event\Subscribing, Thunderlabid\Subscription\BLL\Subscription\Event\Subscribed;
use Thunderlabid\Subscription\BLL\Subscription\Event\Extending, Thunderlabid\Subscription\BLL\Subscription\Event\Extended;
use Thunderlabid\Subscription\BLL\Subscription\Event\Unsubscribing, Thunderlabid\Subscription\BLL\Subscription\Event\Unsubscribed;

class SubscriptionServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
		/*----------  MIGRATION  ----------*/
		$this->loadMigrationsFrom(__DIR__.'/DAL/Migration');
	}

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		$this->app->register(EventServiceProvider::class);
		$this->bind();
	}

	protected function bind()
	{
		/*----------------------------*/
		/*----------  PLAN  ----------*/
		/*----------------------------*/

		/*----------  Query  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Query@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new Querying(new Plan), new Queried(new Plan));
		});
		
		/*----------  Created  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Create@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new CreatingOrUpdating(new Plan), new CreatedOrUpdated(new Plan));
		});

		/*----------  Updated  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Update@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new CreatingOrUpdating(new Plan), new CreatedOrUpdated(new Plan));
		});

		/*----------  Deleted  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Delete@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new Deleting(new Plan), new Deleted(new Plan));
		});


		/*----------  Save Price  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Price\Save@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new SavingPrice(new Plan, new Price), new SavedPrice(new Plan, new Price));
		});

		/*----------  Delete Price  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Price\Delete@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new DeletingPrice(new Plan, new Price), new DeletedPrice(new Plan, new Price));
		});


		/*----------  Save Feature  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Feature\Save@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new SavingFeature(new Plan, new Feature), new SavedFeature(new Plan, new Feature));
		});

		/*----------  Delete Feature  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Plan\Job\Feature\Delete@handle', function ($job, $app) {
			return $job->handle($this->app->make(Plan::class), new DeletingFeature(new Plan, new Feature), new DeletedFeature(new Plan, new Feature));
		});

		/*---------------------------------*/
		/*----------  SUBSCRIBE  ----------*/
		/*---------------------------------*/

		/*----------  Subscribe  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Subscription\Job\Subscribe@handle', function ($job, $app) {
			return $job->handle($this->app->make(Subscription::class), new Subscribing(new Subscription), new Subscribed(new Subscription));
		});

		/*----------  Extend  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Subscription\Job\Extend@handle', function ($job, $app) {
			return $job->handle($this->app->make(Subscription::class), new Extending(new Subscription), new Extended(new Subscription));
		});

		/*----------  Unsubscribe  ----------*/
		$this->app->bindMethod('Thunderlabid\Subscription\BLL\Subscription\Job\Unsubscribe@handle', function ($job, $app) {
			return $job->handle($this->app->make(Subscription::class), new Unsubscribing(new Subscription), new Unsubscribed(new Subscription));
		});

	}
}
