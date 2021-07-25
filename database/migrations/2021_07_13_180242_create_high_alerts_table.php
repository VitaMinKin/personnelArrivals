<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHighAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_alerts', function (Blueprint $table) {
            $table->id();
            $table->integer("notifying_officer")->references("id")->on("employees")->onUpdate("cascade")->unsigned()->nullable()->onDelete("set null");
            $table->smallInteger("alert_signal")->references("id")->on("current_alerts")->onDelete("cascade")->onUpdate("cascade");
            $table->dateTime("time_alert");
            $table->dateTime("arrivals_time")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('high_alerts');
    }
}
