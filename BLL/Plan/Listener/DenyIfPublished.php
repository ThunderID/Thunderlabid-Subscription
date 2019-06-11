<?php

namespace Thunderlabid\Subscription\BLL\Plan\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Validation\ValidationException;
use Hash;
use Log;

use Thunderlabid\Libraries\Pattern\Event\CreatingOrUpdating;

class DenyIfPublished
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
        if (!is_null($event->data->published_at))
        {
            throw ValidationException::withMessages(['published_at' => 'invalid']);
        }
    }
}
