<?php

namespace Thunderlabid\Subscription\BLL\Subscription\Listener\Validator;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;
use Hash;
use Validator;

/*==============================
=            DOMAIN            =
==============================*/
// Event
use Thunderlabid\Subscription\BLL\Subscription\Event\CreatingOrUpdating;
/*=====  End of DOMAIN  ======*/

class ValidateCreateOrUpdate extends \Thunderlabid\Libraries\Pattern\Listener\ValidateCreateOrUpdateWithHasRelation
{
    public function handle(CreatingOrUpdating $event)
    {
        return parent::handle($event);
    }
}
