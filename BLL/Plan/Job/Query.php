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
/*=====  End of FRAMEWORK  ======*/

/*============================
=            DATA            =
============================*/
/*=====  End of DATA  ======*/
/*==============================
=            Domain            =
==============================*/
// Event
use Thunderlabid\Subscription\BLL\Plan\Event\Querying;
use Thunderlabid\Subscription\BLL\Plan\Event\Queried;

/*=====  End of Domain  ======*/


class Query extends \Thunderlabid\Libraries\Pattern\Job\Query
{
	public function __construct(Array $queries = [], Int $mode = SELF::MODE_PAGINATE)
	{
		parent::__construct(
			Querying::class,
			Queried::class,
			Plan::class,
			['name', 'period', 'published_at', 'created_at', 'updated_at'],
			$queries,
			$mode
		);

		$this->queries = $queries;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function buildQuery()
	{
		$q = parent::buildQuery();

		foreach ($this->queries as $field => $v)
		{
			if (isset($v) && !is_null($v))
			{
				switch (strtolower($field)) {
					case 'name':			$q = $q->name($v); break;
					case 'period':			$q = $q->period($v); break;
					case 'published_at':	$q = $q->publishedat($v); break;
				}
			}
		}
		
		return $q;
	}
}
