<?php

namespace Thunderlabid\Subscription\BLL\Plan\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SavingPrice extends \Thunderlabid\Libraries\Pattern\Event\CreatingOrUpdatingHasMany
{
}
