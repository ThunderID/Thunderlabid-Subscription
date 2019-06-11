<?php

namespace Thunderlabid\Subscription\BLL\Plan\Job\Feature;

/*=================================
=            FRAMEWORK            =
=================================*/
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Validation\ValidationException;
use Validation;
use DB;
/*=====  End of FRAMEWORK  ======*/

class Save extends \Thunderlabid\Libraries\Pattern\Job\CreateOrUpdateHasMany
{
	public function __construct(Int $id, Int $plan_id = null, Array $attr = [])
	{
		parent::__construct(
			$id,
			'features',
			$plan_id,
			$attr
		);
	}
}
