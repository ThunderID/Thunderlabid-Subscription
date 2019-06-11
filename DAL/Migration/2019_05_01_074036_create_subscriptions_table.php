<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SUBSC_subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->index();
            $table->char('user_id', 60)->index();
            $table->char('uuid', 60)->index();
            $table->boolean('is_auto_extend')->default(1);
            $table->datetime('ended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SUBSC_subscriptions');
    }
}
