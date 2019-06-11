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

class Delete extends \Thunderlabid\Libraries\Pattern\Job\DeleteHasMany
{
	public function __construct(Int $id, String $feature_id)
	{
		parent::__construct(
			$id,
			'features',
			$feature_id
		);
	}
}
