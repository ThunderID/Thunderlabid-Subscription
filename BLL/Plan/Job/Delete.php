<?php

namespace Thunderlabid\Subscription\BLL\Plan\Job;

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
use Str;
/*=====  End of FRAMEWORK  ======*/

/*============================
=            DATA            =
============================*/
use Thunderlabid\Subscription\DAL\Model\Plan;
/*=====  End of DATA  ======*/


/*==============================
=            DOMAIN            =
==============================*/
/*=====  End of DOMAIN  ======*/


class Delete extends \Thunderlabid\Libraries\Pattern\Job\Delete
{
	public function __construct(Int $id)
	{
		parent::__construct(
			$id
		);
	}
}
