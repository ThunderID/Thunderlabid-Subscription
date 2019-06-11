<?php

namespace Thunderlabid\Subscription\BLL\Subscription\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Unsubscribing extends \Thunderlabid\Libraries\Pattern\Event\CreatingOrUpdating
{
}
