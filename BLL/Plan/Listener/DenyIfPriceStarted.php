<?php

namespace Thunderlabid\Subscription\BLL\Plan\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Validation\ValidationException;
use Hash;
use Log;
use Carbon\Carbon;

use Thunderlabid\Libraries\Pattern\Event\CreatingOrUpdating;

class DenyIfPriceStarted
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
        if (isset($event->relation_data->started_at) && $event->relation_data->started_at->lte(Carbon::now()))
        {
            throw ValidationException::withMessages(['started_at' => 'invalid']);
        }
    }
}
