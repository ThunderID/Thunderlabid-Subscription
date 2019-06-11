<?php

namespace Thunderlabid\Subscription;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*============================
        =            Plan            =
        ============================*/
        \Thunderlabid\Subscription\BLL\Plan\Event\CreatingOrUpdating::class => [
            \Thunderlabid\Subscription\BLL\Plan\Listener\DenyIfPublished::class,
            \Thunderlabid\Subscription\BLL\Plan\Listener\PublishingAtLeastHaveOneFeature::class,
            \Thunderlabid\Subscription\BLL\Plan\Listener\PublishingAtLeastHaveActivePrice::class,
            \Thunderlabid\Subscription\BLL\Plan\Listener\Validator\ValidateCreateOrUpdate::class,
        ],
        \Thunderlabid\Subscription\BLL\Plan\Event\SavingFeature::class => [
            \Thunderlabid\Subscription\BLL\Plan\Listener\DenyIfPublished::class,
        ],
        \Thunderlabid\Subscription\BLL\Plan\Event\SavingPrice::class => [
            \Thunderlabid\Subscription\BLL\Plan\Listener\DenyIfPriceStarted::class,
        ],
        \Thunderlabid\Subscription\BLL\Plan\Event\DeletingFeature::class => [
            \Thunderlabid\Subscription\BLL\Plan\Listener\DenyIfPublished::class,
        ],
        \Thunderlabid\Subscription\BLL\Plan\Event\DeletingPrice::class => [
            \Thunderlabid\Subscription\BLL\Plan\Listener\DenyIfPriceStarted::class,
        ],
        \Thunderlabid\Subscription\BLL\Plan\Event\Delete::class => [
            \Thunderlabid\Subscription\BLL\Plan\Listener\DenyIfThereIsExtendedSubscription::class,
        ],
        /*=====  End of Plan  ======*/

        /*============================
        =       Subscription        =
        ============================*/
        \Thunderlabid\Subscription\BLL\Subscription\Event\Subscribing::class => [
            \Thunderlabid\Subscription\BLL\Subscription\Listener\Validator\ValidateCreateOrUpdate::class,
        ],
        \Thunderlabid\Subscription\BLL\Subscription\Event\Extending::class => [
        ],
        \Thunderlabid\Subscription\BLL\Subscription\Event\Unsubscribing::class => [
        ],
        /*=====  End of Subscription  ======*/
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
