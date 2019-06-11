<?php

namespace Thunderlabid\Subscription\BLL\Subscription\Job;

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
use Arr;
/*=====  End of FRAMEWORK  ======*/

/*============================
=            DATA            =
============================*/
use Thunderlabid\Subscription\DAL\Model\Subscription;
/*=====  End of DATA  ======*/


/*==============================
=            DOMAIN            =
==============================*/
/*=====  End of DOMAIN  ======*/


class Unsubscribe extends \Thunderlabid\Libraries\Pattern\Job\CreateOrUpdate
{
	public function __construct(Int $id, Array $attr)
	{
		parent::__construct(
			$id,
			Arr::only($attr, ['ended_at'])
		);
	}
}
