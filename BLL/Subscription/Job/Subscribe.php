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
/*=====  End of FRAMEWORK  ======*/

/*============================
=            DATA            =
============================*/
/*=====  End of DATA  ======*/


/*==============================
=            DOMAIN            =
==============================*/
/*=====  End of DOMAIN  ======*/


class Subscribe extends \Thunderlabid\Libraries\Pattern\Job\CreateOrUpdate
{
	public function __construct(Array $attr = [])
	{
		parent::__construct(
			null,
			$attr
		);
	}
}
