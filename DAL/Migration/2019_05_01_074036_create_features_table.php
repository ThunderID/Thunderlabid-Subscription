<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SUBSC_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->index();
            $table->char('app_id', 20);
            $table->tinyint('max_tenant')->default(1);
            $table->tinyint('max_user')->default(1);
            $table->text('scopes')->nullable();
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
        Schema::dropIfExists('SUBSC_features');
    }
}
