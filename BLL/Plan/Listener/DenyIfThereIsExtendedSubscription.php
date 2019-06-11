<?php

namespace Thunderlabid\Subscription\BLL\Plan\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Validation\ValidationException;
use Hash;
use Log;

use Thunderlabid\Libraries\Pattern\Event\Delete;
use Thunderlabid\Subscription\DAL\Model\Subscription;

class DenyIfThereIsExtendedSubscription
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
    public function handle(Delete $event)
    {
        $subs   = Subscription::where('plan_id', $event->data->id)->where('is_auto_extend', true)->count();
        if ($subs)
        {
            throw ValidationException::withMessages(['subscriptions' => 'exists']);
        }
    }
}
