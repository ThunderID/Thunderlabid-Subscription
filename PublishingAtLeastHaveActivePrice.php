<?php

namespace Thunderlabid\Subscription\BLL\Plan\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Validation\ValidationException;
use Hash;
use Log;

use Thunderlabid\Subscription\BLL\Plan\Event\CreatingOrUpdating;

class PublishingAtLeastHaveActivePrice
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CreatingOrUpdating $event)
    {
        if (isset($event->attr->published_at) && $event->data->price($event->attr->published_at)->count() < 1)
        {
            throw ValidationException::withMessages(['prices' => 'min:1']);
        }
    }
}
